
<?php
session_start();
require('Functions/html_table.php');
if(isset($_SESSION['idTraining'])){
	ini_set('display_errors', 1);
	include('connectDB.php');
	include('Model/Booking.php');
	include('Model/User.php');
	include('Model/Training.php');
	global $bdd;
	$training = new Training($_SESSION['idTraining']);
	$query = $bdd -> prepare('SELECT idUser FROM Booking where idTraining = :id');
    $query -> bindValue(':id',$training -> getId());
    $query -> execute();
    $arrayBooking = $query -> fetchAll();
    
    
	
	$pdf = new PDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',12);
	$pdf->SetXY(30,20);
	$pdf->SetFontSize(25);
	$pdf->Cell(10,10,"Training");
	$pdf->SetFontSize(12);
	$pdf->SetXY(0,35);
    $html='<table border="1">
        <tr>
         <td width="125" height="30" bgcolor="#525688"><font COLOR="#FFFFFF">Name</font></td><td width="80" height="30" bgcolor="#525688"><font COLOR="#FFFFFF">Booking</font></td><td width="95" height="30" bgcolor="#525688"><font COLOR="#FFFFFF">Date</font></td><td width="95" height="30" bgcolor="#525688"><font COLOR="#FFFFFF">Start Time</font></td><td width="80" height="30" bgcolor="#525688"><font COLOR="#FFFFFF">Duration</font></td><td width="162" height="30" bgcolor="#525688"><font COLOR="#FFFFFF">Type of Training</font></td>
        </tr>
    <tr>
    <td width="128" height="30">'.$training -> getName().'</td><td width="80" height="30">'.(20 - $training -> getNbPlace()).'</td><td width="95" height="30">'.$training -> getDate().'</font></td><td width="95" height="30">'.substr($training->getStart(),0,-3).'</td><td width="80" height="30">'.$training -> getDuration().'</td><td width="160" height="30">'.$training->getType().'</td>
    </tr>
    </table>';
    $pdf->WriteHTML($html);
    $pdf->SetXY(30,60);
	$pdf->SetFontSize(25);
	$pdf->Cell(10,10,"User(s)");
	$pdf->SetFontSize(12);
	$pdf->SetXY(0,80);
	$html='<table border="1">
        <tr>
        <td width="100" height="30" bgcolor="#525688"><font COLOR="#FFFFFF">First name</font></td><td width="100" height="30" bgcolor="#525688"><font COLOR="#FFFFFF">Last Name</font></td><td width="250" height="30" bgcolor="#525688"><font COLOR="#FFFFFF">Email</font></td><td width="115" height="30" bgcolor="#525688"><font COLOR="#FFFFFF">Phone</font></td><td width="110" height="30" bgcolor="#525688"><font COLOR="#FFFFFF">Card nb</font></td>
        </tr>';
    foreach ($arrayBooking as $user) {
        $userT = new User($user['idUser']);
        $content.='
    <tr>
    <td width="100" height="30">'.$userT -> getFirstName().'</td><td width="100" height="30">'.$userT -> getLastName().'</td><td width="250" height="30">'.$userT -> getEmail().'</td><td width="115" height="30">'.$userT -> getPhone().'</td><td width="110" height="30">'.$userT -> getCardNumber().'</td>
    </tr>';
    }
    $out = $html.$content.'</table>';
    $pdf->WriteHTML($out);
    $pdf->Output();
}





?>