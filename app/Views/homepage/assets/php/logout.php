<?php 

if(isset($_POST['logout'])) {
  unset($_SESSION['account']);
  header("Location: /project/makeitman/app/Views/homepage/homepage.php");  
}


?>