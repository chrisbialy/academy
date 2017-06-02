<?php  
    include('../connectDB.php');
    include('../Model/Training.php');
    include('../Model/User.php');
    global $bdd;
    session_start();
    if(isset($_POST['train_id'])){
        $aze=$_POST['train_id'];
        $_SESSION['idTraining'] = $aze;
        $query = $bdd -> prepare('SELECT idUser FROM Booking where idTraining = :id');
        $query -> bindValue(':id',$aze);
        $query -> execute();
        $arrayBooking = $query -> fetchAll();
       
        $train = new Training($aze);
        echo '<div class="row">
          <div class="col-md-12">
              <h4>Training</h4>
        <table class="table table-bordered">
            <tr>
                <th class="info">Name</th>
                <th class="info">Number of Remaining Places</th>
                <th class="info">Date of Session</th>
				<th class="info">Start Time</th>
                <th class="info">Duration</th>
                <th class="info">Type of Training</th>
            </tr>
            <tr>
                <th>'.$train -> getName().'</th>
				<th>'.$train -> getNbPlace().'</th>
				<th>'.$train -> getDate().'</th>
				<th>'.substr($train -> getStart(),0,-3).'</th>
                <th>'.$train -> getDuration().'</th>
                <th>'.$train -> getType().'</th>
            </tr>
        </table></br> ';
        echo "<h4>User</h4>";
        echo '<table class="table table-bordered">
            <tr>
                <th class="info">First name</th>
                <th class="info">Last Name</th>
                <th class="info">Email</th>
				<th class="info">Phone</th>
                <th class="info">Card number</th>
            </tr>';
        foreach ($arrayBooking as $user) {
            $userT = new User($user['idUser']);
            echo '
            <tr>
                <th>'.$userT -> getFirstName().'</th>
                <th>'.$userT -> getLastName().'</th>
                <th>'.$userT -> getEmail().'</th>
                <th>'.$userT -> getPhone().'</th>
                <th>'.$userT -> getCardNumber().'</th>
            </tr>';
        }
        echo '</table></div></div>';
    } 
?>