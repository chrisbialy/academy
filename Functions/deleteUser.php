<?php
session_start();
include('../connectDB.php');
$result = 0;
ini_set("display_errors", 1);
//var_dump($_POST);
if($_POST['params']['id'] && $_POST['params']['idUser'])
{
   if($_POST['params']['idUser'] == $_SESSION['id']){
      
      $id=$_POST['params']['id'];
      $idUser=$_POST['params']['idUser'];

      
      // Update table User
      $query = $bdd -> prepare("Delete from User where id=:id");
      $query -> bindValue(':id',$id);
      $query -> execute();
      $result = 1;
   }
   else{
    $result = 0;
   }
}
else{
    $result = 0;
}

echo $result;
?>