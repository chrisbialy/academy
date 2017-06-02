<?php
    $_SESSION['id'] = null;
    $_SESSION['typeUser'] = null;
    session_destroy();
    header('Location: index.php');
?>