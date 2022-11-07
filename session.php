<?php 

    session_start();

    $_SESSION["name"] = "Gin Ngaih Thang";
    $_SESSION["email"] = "ginngaihthan24@gmail.com";

    if(isset($_SESSION["name"])) {
        echo "<h1>".$_SESSION['name']."</h1>";
        echo "<h1>".$_SESSION['email']."</h1>";


    }

?>