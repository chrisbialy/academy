<!DOCTYPE html>
<html>
<?php
// https://asw-website-avauthey.c9users.io
// A simple web site in Cloud9 that runs through Apache
// Press the 'Run' button on the top to start the web server,
// then click the URL that is emitted to the Output tab of the console

// Include the file to connect the project with the database
//include('connectDB.php');
session_start();

if(isset($_SESSION['id'])){
    if($_SESSION['typeUser']==1){
        header('Location: indexUser.php');
    }
    else if($_SESSION['typeUser']==2){
        header('Location: indexAdmin.php');
    }
}
// Include the file header
include("View/header.html");
?>


 
 
<body>
    <?php
    // Include the menu bar
    include("View/menuBar.html");
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
        // if the user wants to go on a page that doesn't exist it will display the index page 
       include 'Controller/home.php';
    }
?>
</body>

<?php

// Include the footer
include("View/footer.php");

?>
</html>