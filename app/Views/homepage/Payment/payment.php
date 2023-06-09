<?php
require "/Schooling/IT/Enviroment/xampp/htdocs/project/makeitman/app/Models/database.php";
session_start();
$list_products = $_SESSION['checkout_list'];
foreach ($list_products as $value) :
    $query = "SELECT product.productID, product.pro_title, product.image, product.price, 
        product.pro_des, cart.qty, 
        product.categoryID, product.promoID 
    FROM product
    JOIN cart ON product.productID = cart.productID
    WHERE cart.productID in('$value');";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) :
        $idpro = $row['productID'];
        $item = [
            "pro_title" => $row['pro_title'],
            "qty" => $row['qty'],
            "categoryID" => $row['categoryID'],
            "promoteID" => $row['promoID'],
            "price" => $row['price'],
            "pro_des" => $row['pro_des'],
            "img" => $row['image']
        ];

        $arr_list_checkout[$idpro] = $item;
    endwhile;
endforeach;
$total = 0;
foreach ($arr_list_checkout as $key => $value) :
    $total += intval($value['price']) * intval($value['qty']);
endforeach;

// ________ select name and information of user_____________________


$accountID = $_SESSION['account']['accountID'];
$query = "SELECT * FROM users WHERE userID = (SELECT userID FROM account WHERE accountID ='$accountID');";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
</head>

<body>
    <style>
        <?php include "./payment.css"; ?>
    </style>

    <div class="container">
        <div class="header">
            <h1>MAKEIT<span>MENT</span></h1>
        </div>
        <div class="conten">
            <div class="leftconten">
                <div class="Gross-total">
                    <h3>AMOUT PRODUCT: <?php echo count($list_products); ?></h3>
                    <h3>TOTAL PRICE: <?php echo $total ?> $</h3>
                </div>
                <div class="Gross">
                    <table class="table" border="1">
                        <tr class="thead">
                            <th>IMG</th>
                            <th>NAME</th>
                            <th>PRICE</th>
                            <th>AMOUNT</th>
                            <th>TOTAL PRICE</th>
                        </tr>


                        <?php
                        if ($arr_list_checkout) :
                            // echo "<pre style='color:white;'>";
                            // print_r($data);
                            // echo "</pre>";
                            foreach ($arr_list_checkout as $key => $value) :
                        ?>
                                <tr class="item">
                                    <td class="img"><img src="/project/makeitman/public/img/<?php echo $value['img'] ?>"></td>
                                    <th><?php echo $value['pro_title'] ?></th>
                                    <td><?php echo $value['price'] ?></td>
                                    <td><?php echo $value['qty'] ?></td>
                                    <td><?php echo $value['qty'] * $value['price'] ?></td>
                                </tr>
                        <?php
                            endforeach;
                        endif;
                        ?>
                    </table>
                </div>
            </div>
            <div class="rightconten">
                <h3>SHIPPING ADDRESS</h3>
                <form method="post">
                    <?php
                    if ($row) :
                    ?>
                        <label for="" class="name">Full name</label><br>
                        <input type="text" name="name" value="<?php echo $row['fullname'] ?>"><br>
                        <label for="" class="name">Phone number</label><br>
                        <input type="text" name="phone" value="<?php echo $row['phone'] ?>"><br>
                        <label for="" class="name">Address</label><br>
                        <input type="text" name="address" value="<?php echo $row['address'] ?>"><br>
                    <?php
                    endif;
                    ?>
                    <button type="submit" id="sub" name="buy">Buy</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>


<?php
if (isset($_POST['buy'])) :
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    $dateTime = date('Y-m-d');
    //____get lenght to set oderID_________
    $query = "SELECT orderID FROM order_user;";
    $result = mysqli_query($conn, $query);
    $row = mysqli_num_rows($result);
    $row++;
    $row = "OD" . $row;
    $accountID = $_SESSION['account']['accountID'];
    $query = "INSERT INTO order_user(orderID,date,accountID) VALUES ('$row','$dateTime','$accountID');";
    // ALTER TABLE order_user MODIFY date varchar(50);
    mysqli_query($conn, $query);

    // _________INSERT DATA INTO order_detail________________________
    foreach ($arr_list_checkout as $key => $value) :
        $qtyproduct = $value['qty'];
        $price = $value['price'];
        $query = "SELECT order_detailID FROM order_detail;";
        $result = mysqli_query($conn, $query);
        $countIDOD = mysqli_num_rows($result);
        $IDODD = "ODD" . $countIDOD;
        $query = "INSERT INTO `order_detail`(`order_detailID`, `order_userID`, `productID`, `qty`, `price`, `cardID`) 
                  VALUES ('$IDODD','$row','$key','$qtyproduct','$price','CI00');";
        mysqli_query($conn, $query);
        $updateQuery = "UPDATE product SET qty = product.qty - $qtyproduct where productID = '$key'";
        $resUpdate = $conn->query($updateQuery);
        // ___________________Delete products have bought in cart table_____________________
        $query_del = "DELETE FROM cart WHERE productID = '$key' AND accountID = '$accountID';";
        $res = mysqli_query($conn, $query_del);
        if ($res) :
?>
            <script>
                alert('Thank you');
                window.location.href = "../cart/cart.php";
            </script>";
<?php
        endif;
    endforeach;
endif;

?>