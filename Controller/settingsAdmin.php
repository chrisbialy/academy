<?php
/**
 *  Created by Chris 
 *  Modified by Chris the 04/04/17 
 */
 
//user attributes for the field of the form

$email = $admin -> getEmail(); 


$verif = 0;
if(isset($_POST['btnSave'])){
	// Check if email has been entered and is valid
	if (!$_POST['emailSettingsAdmin'] || !filter_var($_POST['emailSettingsAdmin'], FILTER_VALIDATE_EMAIL)) {
		$errEmail = 'Please enter a valid email address';
	}
	else{
	    $emailU = $_POST['emailSettingsAdmin'];
	}
   
    // If there are no errors, send the email
    if (!$errEmail) {
    	//include('connectDB.php');
        global $bdd;
        //UPDATE EMAIL
        $query = $bdd -> prepare('UPDATE Admin 
                                SET email = :email
                                WHERE id = :id');
        $query -> bindValue(':email',$emailU);
        $query -> bindValue(':id',$admin -> getId());
        $query -> execute();
        $verif = 1;
    }
}
include("View/settingsAdmin.php");
?>