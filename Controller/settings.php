<?php
/**
 *  Created by Antoine 
 *  Modified by Antoine the 14/03/17 
 */
 
//user attributes for the field of the form
$membership = $user -> getCardNumber();
$firstName = $user -> getFirstName();
$lastName = $user -> getLastName();
$phone = $user -> getPhone();
$email = $user -> getEmail(); 
if($user -> getHasPaid() == 0){
    $messageNoPayment = "You need to pay your inscription";
}

$verif = 0;
if(isset($_POST['btnSave'])){
    // Check if first name has been entered
	if (!$_POST['firstNameSettings']) {
		$errFirstName = 'Please enter your name';
	}
	else{
	    $firstName = $_POST['firstNameSettings'];
	}
	
	// Check if last name has been entered
	if (!$_POST['lastNameSettings']) {
		$errLastName = 'Please enter your name';
	}
	else{
	    $lastName = $_POST['lastNameSettings'];
	}
	
	// Check if email has been entered and is valid
	if (!$_POST['emailSettings'] || !filter_var($_POST['emailSettings'], FILTER_VALIDATE_EMAIL)) {
		$errEmail = 'Please enter a valid email address';
	}
	else{
	    $email = $_POST['emailSettings'];
	}
	
	//Check if phone number has been entered and is valid
	if (!$_POST['phoneSettings']|| !preg_match('/[0-9]{11}/',$_POST['phoneSettings'])) {
		$errPhone = 'Please enter a valid phone number';
	}
	else{
	    $phone = $_POST['phoneSettings'];
	}
	

    // If there are no errors, send the email
    if (!$errFirstName && !$errLastName && !$errEmail && !$errPhone && !$errPassword && !$errConfirm) {
    	include('connectDB.php');
        global $bdd;
        //INSERT ALBUM
        $query = $bdd -> prepare('UPDATE User 
                                SET firstName = :firstName,
                                    lastName = :lastName,
                                    email = :email,
                                    phone = :phone
                                WHERE id = :id');
        $query -> bindValue(':firstName',$firstName);
        $query -> bindValue(':lastName',$lastName);
        $query -> bindValue(':email',$email);
        $query -> bindValue(':phone',$phone);
        $query -> bindValue(':id',$user -> getId());
        $query -> execute();
        $verif = 1;
    }
}
include("View/settings.php");
?>