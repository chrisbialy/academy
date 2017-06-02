<?php
    $verif = 0;
	
    if (isset($_POST["submit4"])) {
				
		// Check if first name has been entered
		if (!$_POST['nameTraining'] || $_POST['nameTraining'] == "--") {
			$errNameTraining = 'Please select a valid name';
		}
		else{
		    $name = $_POST['nameTraining'];
		}
		
		// Check if last name has been entered
		if (!$_POST['dateTraining'] || $_POST['dateTraining'] <= date('Y-m-d')) {
			$errDateTraining = 'Please enter a valid date';
		}
		else{
		    $date = $_POST['dateTraining'];
		}
		
		// Check if email has been entered and is valid
		if (!$_POST['timeTraining'] ) {
			$errStartTraining = 'Please enter a valid start time';
		}
		else{
		    $start = $_POST['timeTraining'];
		}
		
		//Check if phone number has been entered and is valid
		if (!$_POST['durationTraining']) {
			$errDurationTraining = 'Please enter a valid duration time';
		}
		else{
		    $duration = $_POST['durationTraining'];
		}
		
		//Check if password has been entered and is valid
		if (!$_POST['typeTraining'] || $_POST['typeTraining'] == "--") {
			$errTypeTraining = 'Please select a valid training type';
		}
		else{
		    $type = $_POST['typeTraining'];
		}
        
		
        // If there are no errors, send the email
        if (!$errNameTraining && !$errDateTraining && !$errStartTraining && !$errDurationTraining && !$errTypeTraining) {
        	include('connectDB.php');
            global $bdd;
            //INSERT ALBUM
            $query = $bdd -> prepare('INSERT INTO Training(name,nbPlace,date,duration,type,start) 
                                    VALUES (:name,:nbPlace,:date,:duration,:type,:start)');
            $query -> bindValue(':name',$name);
            $query -> bindValue(':nbPlace',20);
            $query -> bindValue(':date',$date);
            $query -> bindValue(':duration',$duration);
            $query -> bindValue(':type',$type);
            $query -> bindValue(':start',$start);
            $query -> execute();
            $verif = 1;
        }
	}
    include('Model/Training.php');
    include("Form/addTraining.php");
?>