 <?php
/**
 * Created by Chris
 * Modified by Chris the 14/03/17
 */
    
    global $bdd;
    $query = $bdd -> prepare('SELECT * from Booking where idUser=:idUser order by idTraining');
    $query -> bindValue(':idUser',$user -> getId());
    $query -> execute();
    $data = $query -> fetchAll();
    //unset($array);
    $arrayUpcoming=array();
    $arrayOld=array();
    //var_dump($_POST);
    if(isset($_POST['nameTraining'])&&isset($_POST['typeTraining'])){
      if($_POST['nameTraining'] != "--"){
        $where1 ="name = '".$_POST['nameTraining']."'";
      }
      if($_POST['typeTraining'] != "--"){
        $where2 ="type = '".$_POST['typeTraining']."'";
      }
      if($_POST['dateTraining'] != ""){
        $where3 ="date = '".$_POST['dateTraining']."'";
      }
      if($_POST['nameTraining'] == "--" && $_POST['typeTraining'] == "--" && $_POST['dateTraining'] == ""){
       $err = "Please input at least one filter";
      }
      
      if($where1 && $where2 && $where3){// all
       $where=$where1.' AND '.$where2.' AND '.$where3;
       $whereOld=$where1.' AND '.$where2.' AND '.$where3;
      }
      if($where1 && $where2 && !$where3){// name + type
       $where=$where1.' AND '.$where2.' AND date >="'.date('Y-m-d').'"';
       $whereOld=$where1.' AND '.$where2.' AND date <"'.date('Y-m-d').'"';
      }
      if($where1 && !$where2 && $where3){// name + date
       $where=$where1.' AND '.$where3;
       $whereOld=$where1.' AND '.$where3;
      }
      if($where1 && !$where2 && !$where3){//just the name
       $where=$where1.' AND date >="'.date('Y-m-d').'"';
       $whereOld=$where1.' AND date <"'.date('Y-m-d').'"';
      }
      if(!$where1 && $where2 && $where3){ // date + type
       $where=$where2.' AND '.$where3;
       $whereOld=$where2.' AND '.$where3;
      }
      if(!$where1 && $where2 && !$where3){ // just the type
       $where=$where2.' AND date >="'.date('Y-m-d').'"';
       $where=$where2.' AND date <"'.date('Y-m-d').'"';
      }
      if(!$where1 && !$where2 && $where3){ // just the date
       $where=$where3;
       $whereOld=$where3;
      }
     // var_dump($where);
      if(!$err){
         
          foreach($data as $booking) {
            $idTraining=$booking['idTraining'];
            $query = $bdd -> prepare('SELECT * from Training where id=:idTraining AND '.$where);
            $query -> bindValue(':idTraining',$idTraining);
            $query -> execute();
            $data2 = $query -> fetch();
            $arrayUpcoming[]=$data2;
        }
        
        foreach($data as $booking) {
            $idTraining=$booking['idTraining'];
            $query = $bdd -> prepare('SELECT * from Training where id=:idTraining AND '.$whereOld);
            $query -> bindValue(':idTraining',$idTraining);
            $query -> execute();
            $data2 = $query -> fetch();
            $arrayOld[]=$data2;
        }
        //var_dump($array);
      }
      else{// if error we display the initial tab
        foreach($data as $booking) {
            $idTraining=$booking['idTraining'];
            $query = $bdd -> prepare('SELECT * from Training where id=:idTraining AND date>= :today');
            $query -> bindValue(':idTraining',$idTraining);
            $query -> bindValue(':today',date('Y-m-d'));
            $query -> execute();
            $data2 = $query -> fetch();
            $arrayUpcoming[]=$data2;
        }
        foreach($data as $booking) {
            $idTraining=$booking['idTraining'];
            $query = $bdd -> prepare('SELECT * from Training where id=:idTraining AND date< :today');
            $query -> bindValue(':idTraining',$idTraining);
            $query -> bindValue(':today',date('Y-m-d'));
            $query -> execute();
            $data2 = $query -> fetch();
            $arrayOld[]=$data2;
        } 
      }
     
    }
    else{
        foreach($data as $booking) {
            $idTraining=$booking['idTraining'];
            $query = $bdd -> prepare('SELECT * from Training where id=:idTraining AND date>= :today');
            $query -> bindValue(':idTraining',$idTraining);
            $query -> bindValue(':today',date('Y-m-d'));
            $query -> execute();
            $data2 = $query -> fetch();
            $arrayUpcoming[]=$data2;
        }
        foreach($data as $booking) {
            $idTraining=$booking['idTraining'];
            $query = $bdd -> prepare('SELECT * from Training where id=:idTraining AND date< :today');
            $query -> bindValue(':idTraining',$idTraining);
            $query -> bindValue(':today',date('Y-m-d'));
            $query -> execute();
            $data2 = $query -> fetch();
            $arrayOld[]=$data2;
        } 
    }


    
     
    // var_dump($array);
    
    include('Model/Training.php');
    include("View/myBooking.php");
?>