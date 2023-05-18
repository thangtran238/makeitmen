<?php

function appendProduct()
{
    // Include the database connection file
    include('/Schooling/IT/Enviroment/xampp/htdocs/project/makeitman/app/Models/database.php');

    if (isset($_POST['submit-product'])) {
        $name = $_POST['name'];
        $qty = $_POST['quantity'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $des = $_POST['description'];
        $file = $_FILES['image'];
        $filename = $file['name'];
        $showIDQuery = "SELECT MAX(CAST(SUBSTR(productID, 3) AS UNSIGNED)) AS maxID FROM product";
        $res = $conn->query($showIDQuery);
        $row = mysqli_fetch_assoc($res);
        $id = $row['maxID'] + 1;
        $newProductID = 'PR' . $id;

        if (!empty($filename)) {
            $path = "/project/makeitman/public/img/" . $filename;
            $targetPath = $_SERVER['DOCUMENT_ROOT'] . $path;
            move_uploaded_file($file['tmp_name'], $targetPath);

            $insertQuery = "INSERT INTO `product`(`productID`, `pro_title`, `qty`, `categoryID`, `promoID`, `price`, `pro_des`, `image`) 
                VALUES ('$newProductID','$name','$qty','$category','PROMO0','$price','$des','$filename')";
            $conn->query($insertQuery);
        }
    }
}

appendProduct();
