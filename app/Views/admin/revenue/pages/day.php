<!DOCTYPE html>
<html>
<head>
  <title>Table Example</title>
  <style>
    body {
      position: relative;
    }

    table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #f2f2f2;
    }

    .table-actions {
      position: absolute;
      top: 10px;
      right: 10px;
      display: flex;
      gap: 10px;
    }

    .table-actions a {
      padding: 5px 10px;
      background-color: #f2f2f2;
      color: #333;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <h1>Order Details</h1>
  <table>
    <tr>
      <th>Account ID</th>
      <th>Full Name</th>
      <th>Phone</th>
      <th>Email</th>
      <th>Address</th>
      <th>Order ID</th>
      <th>Date</th>
      <th>Total</th>
    </tr>
    <?php getOrderInDay(); ?>
  </table>
  <div class="table-actions">
    <a href="/project/makeitman/app/Views/admin/admin.php">Back to Main Page</a>
    <a href="/project/makeitman/app/Views/admin/revenue/pages/week.php">Next Page</a>
  </div>
</body>
</html>



<?php 

function getOrderInDay() {
  include("/Schooling/IT/Enviroment/xampp/htdocs/project/makeitman/app/Views/admin/revenue/revenue.php");
  include("/Schooling/IT/Enviroment/xampp/htdocs/project/makeitman/app/Models/database.php");
  $time = getTime();
  $today = $time['today'];
  $query = "SELECT account.accountID,fullname, phone, email, address, order_user.orderID,date,sum(qty*price) as total 
            from order_user,order_detail,account,users 
            where order_user.accountID = account.accountID 
            and account.userID = users.userID 
            and order_user.orderID = order_detail.order_userID
            and date = '$today' 
            group by order_user.orderID";
  $res = $conn->query($query);
  while($row = mysqli_fetch_assoc($res)) { ?>
  <tr>
      <td><?php echo $row['accountID'] ?></td>
      <td><?php echo $row['fullname'] ?></td>
      <td><?php echo $row['phone'] ?></td>
      <td><?php echo $row['email'] ?></td>
      <td><?php echo $row['address'] ?></td>
      <td><?php echo $row['orderID'] ?></td>
      <td><?php echo $row['date'] ?></td>
      <td><?php echo $row['total'] ?></td>
    </tr>

<?php }
}

?>