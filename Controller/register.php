<?php
/**
 *  Created by Antoine 
 *  Modified by Antoine the 28/02/17 
 */
	$verif = 0;
	
    if (isset($_POST["submit2"])) {
				
		// Check if first name has been entered
		if (!$_POST['firstName']) {
			$errFirstName = 'Please enter your name';
		}
		else{
		    $firstName = $_POST['firstName'];
		}
		
		// Check if last name has been entered
		if (!$_POST['lastName']) {
			$errLastName = 'Please enter your name';
		}
		else{
		    $lastName = $_POST['lastName'];
		}
		
		// Check if email has been entered and is valid
		if (!$_POST['email2'] || !filter_var($_POST['email2'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address';
		}
		else{
		    $email = $_POST['email2'];
		}
		
		//Check if phone number has been entered and is valid
		if (!$_POST['phone']|| !preg_match('/[0-9]{11}/',$_POST['phone'])) {
			$errPhone = 'Please enter a valid phone number';
		}
		else{
		    $phone = $_POST['phone'];
		}
		
		//Check if password has been entered and is valid
		if (!$_POST['password'] || strlen($_POST['password'])>6) {
			$errPassword = 'Please enter a valid password (more than 6 characteres)';
		}
		else{
		    // check if password is equal to confirm
		    if($_POST['password'] != $_POST['confirm']){
		        $errConfirm = 'The password and the confirmation are not the same.';
		    }
		    else{
		        $password = $_POST['password'];
		    }
		}
        
		
        // If there are no errors, send the email
        if (!$errFirstName && !$errLastName && !$errEmail && !$errPhone && !$errPassword && !$errConfirm) {
        	include('connectDB.php');
            global $bdd;
            //INSERT ALBUM
            $query = $bdd -> prepare('INSERT INTO User(firstName,lastName,email,password,phone,hasPaid) 
                                    VALUES (:firstName,:lastName,:email,:password,:phone,:hasPaid)');
            $query -> bindValue(':firstName',$firstName);
            $query -> bindValue(':lastName',$lastName);
            $query -> bindValue(':email',$email);
            $query -> bindValue(':password',md5($password));
            $query -> bindValue(':phone',$phone);
            $query -> bindValue(':hasPaid',0);
            $query -> execute();
            $_SESSION['id']=$bdd -> lastInsertId();
            $_SESSION['typeUser'] = 1;
            $verif = 1;
        }
	}
    include("View/register.php");
?>