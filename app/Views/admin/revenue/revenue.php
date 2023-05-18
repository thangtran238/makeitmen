<?php

function getTime()
{
  date_default_timezone_set('Asia/Ho_Chi_Minh');
  $today = date("Y-m-d"); // Today's date

  // Create a DateTime object from today's date
  $date = new DateTime($today);

  // Get the last week's start date
  $lastWeekStart = $date->modify("-1 week")->format("Y-m-d");

  // Reset the DateTime object to today's date
  $date = new DateTime($today);

  // Get the last week's end date
  $lastWeekEnd = $date->modify("+1 week")->format("Y-m-d");

  // Get the first day of the previous month
  $date->modify("first day of previous month");
  $startOfMonth = $date->format("Y-m-d");

  // Get the last day of the previous month
  $date->modify("last day of this month");
  $endOfMonth = $date->format("Y-m-d");

  // Create an array to store today, last week, and last month (from the beginning of the month to the end of the month)
  $dates = array(
    'today' => $today,
    'last_week' => array(
      'start' => $lastWeekStart,
      'end' => $lastWeekEnd
    ),
    'last_month' => array(
      'start' => $startOfMonth,
      'end' => $endOfMonth
    )
  );

  return $dates;
}




function revenueDay()
{
  include("/Schooling/IT/Enviroment/xampp/htdocs/project/makeitman/app/Models/database.php");
  $today = getTime()["today"];
  $rDQuery = "SELECT order_user.orderID, date, SUM(qty*price) as total 
              FROM order_user 
              INNER JOIN order_detail ON order_user.orderID = order_detail.order_userID 
              WHERE date = '$today'
              GROUP BY order_user.orderID";
  $res = $conn->query($rDQuery);
  $total = 0; // Initialize total variable
?>
  <div class="revenue-info">
    <p>Date: <?php echo $today; ?></p>
    <p>Total: <?php 
                if ($res->num_rows > 0) {
                  while ($row = $res->fetch_assoc()) {
                    $total += $row['total'];
                  }
                } else {
                  $total = 0; // Set total to 0 if no results found
                }
                echo $total;
              ?></p>
  </div>
  <a href="/project/makeitman/app/Views/admin/revenue/pages/day.php">More Details</a>
<?php
}





function revenueWeek()
{
  include("/Schooling/IT/Enviroment/xampp/htdocs/project/makeitman/app/Models/database.php");
  $today = getTime()['today'];
  $lastWeekStartDay = getTime()['last_week']['start'];
  $rDQuery = "SELECT order_user.orderID,date,sum(qty*price) as total from order_user,order_detail 
              where order_user.orderID = order_detail.order_userID and date between '$lastWeekStartDay' and '$today'
              group by order_user.orderID";
  $res = $conn->query($rDQuery);
  $row = mysqli_fetch_assoc($res);
  $total = 0; // Initialize total variable
   ?>
  <div class="revenue-info">
    <p>Last Week: <?php echo $lastWeekStartDay ?></p>
    <p>Total: <?php 
                if ($res->num_rows > 0) {
                  while ($row = $res->fetch_assoc()) {
                    $total += $row['total'];
                  }
                } else {
                  $total = 0; // Set total to 0 if no results found
                }
                echo $total;
              ?></p>
  </div>
  <a href="/project/makeitman/app/Views/admin/revenue/pages/week.php">More Details</a>

<?php
}

function revenueMonth()
{
  include("/Schooling/IT/Enviroment/xampp/htdocs/project/makeitman/app/Models/database.php");
  $today = getTime()['today'];
  $lastMonthStartDay = getTime()['last_month']['start'];
  $lastMonthEndDay = getTime()['last_month']['end'];
  $timestamp = strtotime($lastMonthStartDay);
  $month = date("F", $timestamp);
  $rDQuery = "SELECT order_user.orderID,date,sum(qty*price) as total from order_user,order_detail 
              where order_user.orderID = order_detail.order_userID and date between '$lastMonthStartDay' and '$lastMonthEndDay'
              group by order_user.orderID";
  $res = $conn->query($rDQuery);
  $row = mysqli_fetch_assoc($res); 
  $total = 0; // Initialize total variable
  ?>
  <div class="revenue-info">
    <p>Last Month: <?php echo $month; ?></p>
    <p>Total: <?php 
                if ($res->num_rows > 0) {
                  while ($row = $res->fetch_assoc()) {
                    $total += $row['total'];
                  }
                } else {
                  $total = 0; // Set total to 0 if no results found
                }
                echo $total;
              ?></p>
  </div>
  <a href="/project/makeitman/app/Views/admin/revenue/pages/month.php">More Details</a>

<?php
}
?>