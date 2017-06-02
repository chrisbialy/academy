<?php
/**
 *  Created by Antoine 
 *  Modified by Antoine the 09/03/17 
 */
   if(isset($_POST["submit3"])){
       if(isset($_POST['email3']) && isset($_POST['password2'])){
    		if (empty($_POST['email3']) || empty($_POST['password2']))
    		{
    		    $message = '<div class="alert alert-danger" role="alert">Error you have to input all the fields.</div>';
    		}
    		else //check user
    		{
    		    $query=$bdd->prepare('SELECT password, email,id
    		    FROM User WHERE email = :email');
    		    $query->bindValue(':email',$_POST['email3'], PDO::PARAM_STR);
    		    $query->execute();
    		    $data=$query->fetch();
    		    //var_dump($data);
    			if ($data['password'] == md5($_POST['password2'])) // check password
    			{
    			    $_SESSION['id'] = $data['id'];
    			    //1: user; 2: Admin
    			    $_SESSION['typeUser'] = 1;
    			    header('Location: indexUser.php');
    			}
    			else 
    			{// check admin
    				$query=$bdd->prepare('SELECT password, email,id
    			    FROM Admin WHERE email = :email');
    			    $query->bindValue(':email',$_POST['email3'], PDO::PARAM_STR);
    			    $query->execute();
    			    $data=$query->fetch();
    			    if ($data['password'] == md5($_POST['password2'])) // check password admin
    				{
    				    $_SESSION['id'] = $data['id'];
    				    //0: no user; 1: user; 2: Admin
    				    $_SESSION['typeUser'] = 2;
    				    header('Location: indexAdmin.php');
    	  				//exit();
    				}
    				else{
    			    	$message = '<div class="alert alert-danger" role="alert"> Incorrect email or password</div>';
    				}
    			}
    			$query->CloseCursor();
    		}
       }
   }
    include("View/login.php");
?>