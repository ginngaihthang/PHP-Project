<?php 

    session_start();
    unset($_SESSION['name']);
    header('location:main_login.php');


?>