<?php require "/Schooling/IT/Enviroment/xampp/htdocs/project/makeitman/app/Models/database.php";
session_start();
// error_reporting(0);
// if(isset($_SESSION['account'])):
//   print_r($_SESSION['account']);
// else:
//   echo "<h1> session account not set </h1>";
// endif;
if(!empty($_GET["productID"])):
  $idproduct = $_GET["productID"];
  if (isset($_SESSION['account'])){
    $accountID=$_SESSION['account']['accountID'];
    $query = "SELECT productID FROM cart WHERE productID ='$idproduct' AND accountID ='$accountID' ;";
    $result = mysqli_query($conn,$query);
    $rowCount = mysqli_num_rows($result);
    if($rowCount):
      echo $_SESSION['account'];
      header("location: /project/makeitman/app/Views/homepage/homepage.php");
    else:
      $query= "INSERT INTO cart(accountID,productID,qty) VALUES ('$accountID','$idproduct',1);";
      $result = mysqli_query($conn,$query); 
      echo "<script > alert( 'Adding successfull!')</script>";
      header("location: /project/makeitman/app/Views/homepage/homepage.php");
    endif;
  }else{
    header("location: ./requireaccount.php");
  }
endif;
//-------------------------------------------------------------------
?>