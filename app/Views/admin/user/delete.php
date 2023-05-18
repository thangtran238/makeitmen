<?php 
ob_start();
$n = "";
if(isset($_GET['id'])) {
  $n = $_GET['id'];
}
delData($n);
ob_clean();
header('Location: /project/makeitman/app/Views/admin/admin.php');

exit;
function delData($id) {
  include('/Schooling/IT/Enviroment/xampp/htdocs/project/makeitman/app/Models/database.php');
  $sql_delete = "UPDATE account SET status = 1 where `userID` = '$id'";
  return $conn->query($sql_delete);
}
?>