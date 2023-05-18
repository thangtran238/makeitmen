<!DOCTYPE html>
<html>
<head>
  <title>Order Details</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    form {
      margin-bottom: 20px;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <h1 class="text-center">Order Details</h1>

    <form method="POST">
      <div class="form-group">
        <label for="start_time">Start Time:</label>
        <input type="date" class="form-control" id="start_time" name="start_time" required>
      </div>

      <div class="form-group">
        <label for="end_time">End Time:</label>
        <input type="date" class="form-control" id="end_time" name="end_time" required>
      </div>

      <button type="submit" class="btn btn-primary">Show Data</button>
    </form>

    <?php
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      // Get the start and end time from the form
      $start_time = $_POST["start_time"];
      $end_time = $_POST["end_time"];

      // Perform database query with the provided time range
      include("/Schooling/IT/Enviroment/xampp/htdocs/project/makeitman/app/Models/database.php");
      $query = "SELECT account.accountID, fullname, phone, email, address, order_user.orderID, date, SUM(qty * price) AS total
                FROM order_user, order_detail, account, users
                WHERE order_user.accountID = account.accountID 
                AND account.userID = users.userID 
                AND order_user.orderID = order_detail.order_userID
                AND date BETWEEN '$start_time' AND '$end_time'
                GROUP BY order_user.orderID";
      $result = $conn->query($query);

      if ($result->num_rows > 0) {
        echo '<div class="table-responsive">
                <table class="table table-striped">
                  <thead>
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
                  </thead>
                  <tbody>';
        while ($row = $result->fetch_assoc()) {
          echo '<tr>
                  <td>' . $row['accountID'] . '</td>
                  <td>' . $row['fullname'] . '</td>
                  <td>' . $row['phone'] . '</td>
                  <td>' . $row['email'] . '</td>
                  <td>' . $row['address'] . '</td>
                  <td>' . $row['orderID'] . '</td>
                  <td>' . $row['date'] . '</td>
                  <td>' . $row['total'] . '</td>
                </tr>';
        }
        echo '</tbody></table></div>';
      } else {
        echo '<p class="text-center">No data available.</p>';
      }
    }
    ?>

    <div class="text-right">
      <a href="/project/makeitman/app/Views/admin/admin.php" class="btn btn-secondary">Return to Admin Page</a>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
