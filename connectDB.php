<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=asw_website;charset=utf8', 'avauthey', '');
// 	echo 'ok';
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
?>