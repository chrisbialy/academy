<?php
/**
 *  Created by Chris 
 *  Modified by Chris the 04/04/17 
 */
    $verif = 0;
   if(isset($_POST["submitPass"]))
   {
       if(isset($_POST['oldPass']) && isset($_POST['newPass']) && isset($_POST['confirmPass']))
       {
    		if (empty($_POST['oldPass']) || empty($_POST['newPass'])|| empty($_POST['confirmPass']))
    		{
    		    $message = '<div class="alert alert-danger" role="alert">Error you have to input all the fields.</div>';
    		}
    		else //check admin
    		{
    		    if(md5($_POST['oldPass']) != $admin -> getPassword())
    		    {
    		        $errOldPass = 'Your old password is wrong';
    		    }
    		    else
    		    {
    		        if($_POST['newPass'] != $_POST['confirmPass'])
    		        {
    		            $errPass = 'The new password and the confirmation are not the same';
    		        }
    		        else
    		        {
    		            $query=$bdd->prepare('UPDATE Admin 
    		                                SET password = :password
    		                                WHERE id = :id');
            		    $query->bindValue(':password',md5($_POST['newPass']));
            		    $query->bindValue(':id',$admin -> getId());
            		    $query->execute();
            		    $verif = 1;
    		        }
    		    }
    		    
    		}
       }
   }
    include("View/changePasswordAdmin.php");
?>