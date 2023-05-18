    <?php
    if (isset($_POST['sm-su'])) {
        $name = $_POST['fullname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $street = $_POST['st'];
        $dist = $_POST['di'];
        $city = $_POST['ct'];
        $username = $_POST['username'];
        $pass = $_POST['pass'];



        $sql_acc_id = "SELECT CONCAT('AC', CAST(SUBSTR(accountID, 3) AS UNSIGNED)) AS accountID FROM account
        ORDER BY CAST(SUBSTR(accountID, 3) AS UNSIGNED) DESC LIMIT 1;";
        $res_acc_id = $conn->query($sql_acc_id);
        $accountIDString =  mysqli_fetch_array($res_acc_id)['accountID'];
        $accountID = (int)(substr($accountIDString, 2)) + 1;

        $sql_users_id = "SELECT CONCAT('US', CAST(SUBSTR(userID, 3) AS UNSIGNED)) AS userID FROM users
        ORDER BY CAST(SUBSTR(userID, 3) AS UNSIGNED) DESC LIMIT 1;";
        $res_users_id = $conn->query($sql_users_id);
        $userIDString =  mysqli_fetch_array($res_users_id)['userID'];
        $userID = (int)(substr($userIDString, 2)) + 1;



        $sqlInsertUser = "INSERT INTO `users`(`userID`, `fullname`, `phone`, `email`, `address`, `roleID`) 
                        VALUES ('US$userID','$name','$phone','$email','$street, $dist, $city','R1')";
        $sqlInsertAccount = "INSERT INTO `account`(`accountID`, `username`, `password`, `status`, `userID`) 
                            VALUES ('AC$accountID','$username','$pass','0','US$userID')";
        $conn->query($sqlInsertUser);
        $conn->query($sqlInsertAccount);
        header("location: /project/makeitman/app/Views/homepage/homepage.php?accountID=$accountID ");
    }
    ?>   
