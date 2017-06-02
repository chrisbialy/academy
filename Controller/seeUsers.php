<?php
    global $bdd;
    if(isset($_POST['paidUser'])){
      if(isset($_POST['nameUser'])&& $_POST['nameUser']!= ""){
        $where1 ="lastName = '".$_POST['nameUser']."'";
      }
      if(isset($_POST['emailUser']) && $_POST['emailUser'] != ""){
        $where2 ="email = '".$_POST['emailUser']."'";
      }
      if($_POST['paidUser'] != "--"){
        $where3 ="hasPaid = '".$_POST['paidUser']."'";
      }
      if($_POST['nameUser'] == "" && $_POST['emailUser'] == "" && $_POST['paidUser'] == "--"){
       $err = "Please input at least one filter";
      }
      
      if($where1 && $where2 && $where3){// all
       $where=$where1.' AND '.$where2.' AND '.$where3;
      }
      if($where1 && $where2 && !$where3){// name + type
       $where=$where1.' AND '.$where2;
      }
      if($where1 && !$where2 && $where3){// name + date
       $where=$where1.' AND '.$where3;
      }
      if($where1 && !$where2 && !$where3){//just the name
       $where=$where1;
      }
      if(!$where1 && $where2 && $where3){ // date + type
       $where=$where2.' AND '.$where3;
      }
      if(!$where1 && $where2 && !$where3){ // just the type
       $where=$where2;
      }
      if(!$where1 && !$where2 && $where3){ // just the date
       $where=$where3;
      }
     
      if(!$err){
        $query = $bdd -> prepare('select id from User where '.$where);
 	    $query -> execute();
        $data2 = $query -> fetchAll();
      }
      else{// if error we display the initial tab
        $query = $bdd -> prepare('select id from User');
 	    $query -> execute();
        $data2 = $query -> fetchAll(); 
      }
     
    }
    else{
      $query = $bdd -> prepare('select id from User');
      $query -> execute();
      $data2 = $query -> fetchAll();
    }
    
   
    include ('Model/User.php');
    include ('View/seeUsers.php');

?>