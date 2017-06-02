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
    class User{
        
        //attributs
        private $id;
        private $firstName;
        private $lastName;
        private $email;
        private $password;
        private $cardNumber;
        private $hasPaid;
        private $phone;
        
        //constructor
        function __construct($idParam){
			global $bdd;
			$query = $bdd -> prepare('SELECT * FROM User WHERE id = :id');
		    $query -> bindValue(':id',$idParam, PDO::PARAM_INT);
		    $query -> execute();
		    $data = $query -> fetch();
		    $this -> id = $data['id'];
		    $this -> firstName = $data['firstName'];
		    $this -> lastName = $data['lastName'];
		    $this -> email = $data['email'];
		    $this -> password = $data['password'];
		    $this -> cardNumber = $data['cardNumber'];
		    $this -> hasPaid = $data['hasPaid'];
		    $this -> phone = $data['phone'];
		}
		
		//methods
		function getId(){
			return $this -> id;
		}
		function getLastName(){
			return $this -> lastName;
		}
		function getFirstName(){
			return $this -> firstName;
		}
		function getEmail(){
			return $this -> email;
		}
		function getPassword(){
			return $this -> password;
		}
		function getCardNumber(){
			return $this -> cardNumber;
		}
		function getHasPaid(){
			return $this -> hasPaid;
		}
		function getPhone(){
			return $this -> phone;
		}

}

?>