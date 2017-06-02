<?php
	/**
	 * Create by Antoine
	 * modify by Antoine the 19/03/17
	 */
    //include the file with database
    if(file_exists('connectionDB.php'))
        include 'connectionDB.php';
    else if(file_exists('../connectionDB.php'))
    	include '../connectionDB.php';
    	
    //class user
    class Admin{
        
        //attributs
        private $id;
        private $email;
        private $password;
        
        //constructor
        function __construct($idParam){
			global $bdd;
			$query = $bdd -> prepare('SELECT * FROM Admin WHERE id = :id');
		    $query -> bindValue(':id',$idParam, PDO::PARAM_INT);
		    $query -> execute();
		    $data = $query -> fetch();
		    $this -> id = $data['id'];
		    $this -> email = $data['email'];
		    $this -> password = $data['password'];
		}
		
		//methods
		function getId(){
			return $this -> id;
		}
		function getEmail(){
			return $this -> email;
		}
		function getPassword(){
			return $this -> password;
		}

}

?>