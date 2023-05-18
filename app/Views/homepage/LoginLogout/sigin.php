<?php
session_start();
include "/Schooling/IT/Enviroment/xampp/htdocs/project/makeitman/app/Models/database.php";
if (isset($_POST['sm-si'])) {
    $name = $_POST['id'];
    $pass = $_POST['pass'];
    if ($name === "admin" && $pass === "admin") {
        header("Location: /project/makeitman/app/Views/admin/admin.php");
    } else {
        $sql = "SELECT * FROM account where username = '$name' and password = '$pass' and `status`='0'";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($query);
        if ($row) {
            $id = $row['accountID'];
            $sql = "SELECT fullname FROM `account`,`users` WHERE users.userID = account.userID and accountID = '$id'";
            $query = mysqli_query($conn, $sql);
            $qrName = mysqli_fetch_assoc($query);
            $fullName = $qrName['fullname'];
            $acc=[
                "accountID"=>$row['accountID'],
                "username"=>$name,
                "password"=>$pass
                ];
                $_SESSION["account"] = $acc;
                header("location: /project/makeitman/app/Views/homepage/homepage.php");
        } else {
            echo "<script>alert('Fail')</script>";
        }
    }

}
