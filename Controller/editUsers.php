<?php
	//var_dump($_GET);
	if(isset($_GET['id'])){
		//ini_set('display_errors', 1);
		include('Model/User.php');
		
		$user = new User($_GET['id']);
		//user attributes for the field of the form
		$firstName = $user -> getFirstName();
		$lastName = $user -> getLastName();
		$email = $user -> getEmail(); 
		$password = $user -> getPassword(); 
		$cardNumber = $user -> getCardNumber();
		$hp= $user -> getHasPaid();
		if($hp == 1){
			$hasPaid= "yes";
		}
		else{
			$hasPaid="no";
		}
		$phone = $user -> getPhone();
		
		
		$verif = 0;
		if(isset($_POST['btnSave'])){
		    // Check if first name has been entered
			if (!$_POST['firstNameAdmin']) {
				$errFirstName = 'Please enter your first name';
			}
			else{
			    $firstName = $_POST['firstNameAdmin'];
			}
			
			// Check if last name has been entered
			if (!$_POST['lastNameAdmin']) {
				$errLastName = 'Please enter your last name';
			}
			else{
			    $lastName = $_POST['lastNameAdmin'];
			}
			
			// Check if email has been entered and is valid
			if (!$_POST['emailAdmin'] || !filter_var($_POST['emailAdmin'], FILTER_VALIDATE_EMAIL)) {
				$errEmail = 'Please enter a valid email address';
			}
			else{
			    $email = $_POST['emailAdmin'];
			}
		
				//Check if card number has been entered
			if (!$_POST['cardNumberAdmin']) {
					$errcardNumber = 'Please enter your Card Number';
			}
			else{
				    $cardNumber = $_POST['cardNumberAdmin'];
			}
			
			// Check if first name has been entered
			if (!$_POST['hasPaidAdmin']) {
				$errHasPaid = 'Please check if User has paid';
			}
			else{
				$hp = $_POST['hasPaidAdmin'];
				if ($hp == "no"){
					$hasPaid=0;
				}else if($hp == "yes"){
					$hasPaid=1;
				}else{
					$errHasPaid="Incorrect value";
				}
			}
			
			//Check if phone number has been entered and is valid
			if (!$_POST['phoneAdmin']|| !preg_match('/[0-9]{11}/',$_POST['phoneAdmin'])) {
				$errPhone = 'Please enter a valid phone number';
			}
			else{
			    $phone = $_POST['phoneAdmin'];
			}
		
		    // If there are no errors, send the email
		    if (!$errFirstName && !$errLastName && !$errEmail && !$errPhone && !$errcardNumber && !$errHasPaid) {
		    	include('connectDB.php');
		        global $bdd;
		        //INSERT ALBUM
		        $query = $bdd -> prepare('UPDATE User 
		                                SET firstName = :firstName,
		                                    lastName = :lastName,
		                                    email = :email,
											password = :password,
											cardNumber = :cardNumber,
											hasPaid = :hasPaid,
		                                    phone = :phone
		                                WHERE id = :id');
		        $query -> bindValue(':firstName',$firstName);
		        $query -> bindValue(':lastName',$lastName);
		        $query -> bindValue(':email',$email);
				$query -> bindValue(':password',$password);
				$query -> bindValue(':cardNumber',$cardNumber);
				$query -> bindValue(':hasPaid',$hasPaid);
				$query -> bindValue(':phone',$phone);
		        $query -> bindValue(':id',$user -> getId());
		        $query -> execute();
		        $verif = 1;
		    }
		}
		include("View/editUsers.php");
	}
?>