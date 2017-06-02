<?php
    $verif = 0;
    include('Model/Training.php');
	if(isset($_GET['id'])){
	    $training = new Training($_GET['id']);
	
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
                $query = $bdd -> prepare('UPDATE Training
                                        SET name=:name,date=:date,duration=:duration,type=:type,start=:start 
                                        WHERE id=:id');
                $query -> bindValue(':name',$name);
                $query -> bindValue(':date',$date);
                $query -> bindValue(':duration',$duration);
                $query -> bindValue(':type',$type);
                $query -> bindValue(':start',$start);
                $query -> bindValue(':id',$training->getId());
                $query -> execute();
                $verif = 2;
            }
    	}
        
        include("Form/addTraining.php");
	}
?>
<script type="text/javascript">
    $('#nameTraining').val('<?php echo $training -> getName();?>');
	$('#date').val('<?php echo $training -> getDate();?>');
	$('#timeTraining').val('<?php echo $training -> getStart();?>');
	$('#duration').val('<?php echo $training -> getDuration();?>');
	$('#typeTraining').val('<?php echo $training -> getType();?>');
</script>