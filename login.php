<?php 

    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];

    echo "$email and $password";

    if ($email == "gin@gmail.com" && $password == 1234) {
        $_SESSION['name'] = "Gin";
    } 

    header("location:main_login.php");

?>