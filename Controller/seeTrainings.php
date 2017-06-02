<?php
    global $bdd;
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
      }
      if($where1 && $where2 && !$where3){// name + type
       $where=$where1.' AND '.$where2.' AND date >="'.date('Y-m-d').'"';
      }
      if($where1 && !$where2 && $where3){// name + date
       $where=$where1.' AND '.$where3;
      }
      if($where1 && !$where2 && !$where3){//just the name
       $where=$where1.' AND date >="'.date('Y-m-d').'"';
      }
      if(!$where1 && $where2 && $where3){ // date + type
       $where=$where2.' AND '.$where3;
      }
      if(!$where1 && $where2 && !$where3){ // just the type
       $where=$where2.' AND date >="'.date('Y-m-d').'"';
      }
      if(!$where1 && !$where2 && $where3){ // just the date
       $where=$where3;
      }
     // var_dump($where);
      if(!$err){
        $query = $bdd -> prepare('select id from Training where '.$where);
     	  $query -> execute();
        $data2 = $query -> fetchAll();
      }
      else{// if error we display the initial tab
        $query = $bdd -> prepare('select id from Training where date >= :today order by date ');
        $query -> bindValue(':today',date('Y-m-d'));
     	  $query -> execute();
        $data2 = $query -> fetchAll(); 
      }
     
    }
    else{
      $query = $bdd -> prepare('select id from Training where date >= :today order by date ');
      $query -> bindValue(':today',date('Y-m-d'));
     	$query -> execute();
      $data2 = $query -> fetchAll();
    }
    
   
    include ('Model/User.php');
    include ('Model/Training.php');
    include ('View/seeTrainings.php');

?>