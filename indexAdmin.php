<!DOCTYPE html>
<html>
<?php
// https://asw-website-avauthey.c9users.io
// A simple web site in Cloud9 that runs through Apache
// Press the 'Run' button on the top to start the web server,
// then click the URL that is emitted to the Output tab of the console

// Include the file to connect the project with the database
/**
 * Create Antoine the 30/03/17
 * Modify by Antoine 15/03/17
 */ 

// Creation of a new session user
session_start();
if(isset($_SESSION["id"]) && isset($_SESSION["typeUser"])){
    if($_SESSION["typeUser"] == 2){
        include('connectDB.php');
        include('Model/Admin.php');
        // creation of new object user which is the user connected
        $admin = new Admin($_SESSION["id"]);
       
        // Include the file header
        include("View/header.html");
        
        ?>
        
        
         
         
        <body>
            <?php
            // Include the menu bar
            include("View/menuBarAdmin.html");
            // Condition to the MVC
            if (!empty($_GET['page']) && is_file('Controller/'.$_GET['page'].'.php'))
            {
                // Include the controller of the page asked by the user
                /* Ex: if the user wants to go on the page 
                    * https://asw-website-avauthey.c9users.io/index.php?page=home
                    * it will include the controller home.php
                */
                include 'Controller/'.$_GET['page'].'.php';
            }
            else
            {
                // if the user wants to go on a page that doesn't exist it will display the home page 
               include 'Controller/homeAdmin.php';
             
            }
        ?>
        </body>
        
        <?php
        
        // Include the footer
        include("View/footer.php");
    }
    else{
        echo "you are not allow in this section";
    }
}
else{
    echo "Your are not allow in this section";
}
?>
</html>