<?php
/**
 * Created by Chris
 * Modified by Chris the 14/03/17
 */
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
      
      // delete the booking
      $query = $bdd -> prepare("INSERT INTO Booking(idTraining,idUser) VALUES (:id,:idUser) ");
      $query -> bindValue(':id',$id);
      $query -> bindValue(':idUser',$idUser);
      $query -> execute();
      
      // Update table Training
      $query = $bdd -> prepare("UPDATE Training SET nbPlace = nbPlace - 1 where id=:id");
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