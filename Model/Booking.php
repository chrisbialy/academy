<?php
/**
 * Created by Chris
 * Modified by Chris the 14/03/17
 */
    //include the file with database
    if(file_exists('connectionDB.php'))
        include 'connectionDB.php';
    else if(file_exists('../connectionDB.php'))
    	include '../connectionDB.php';
    	
    //class user
    class Booking{
        
        //attributs
        private $id;
        private $idUser;
        private $idTraining;
  
        
        //constructor
        function __construct($idParam){
			global $bdd;
			$query = $bdd -> prepare('SELECT * FROM Booking WHERE idUser = :idUser');
		    $query -> bindValue(':idUser',$idParam, PDO::PARAM_INT);
		    $query -> execute();
		    $data = $query -> fetch();
		    $this -> id = $data['id'];
		    $this -> idUser = $data['idUser'];
		    $this -> idTraining = $data['idTraining'];
		
		}
		
		//methods
		function getId(){
			return $this -> id;
		}
		function getIdUser(){
			return $this -> idUser;
		}
		function getIdTraining(){
			return $this -> idTraining;
		}
}

?>