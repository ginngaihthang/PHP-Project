<?php 

    //Superglobal Variable
    // $_GET, $_POST, $_FILES, $_COOKIE, $_SESSION

    // $name = $_GET['name'];
    // var_dump($name);
    // echo "$name.<br>";
    // $email = $_GET['email'];
    // echo $email;

    var_dump($_POST);
    echo "<br>";
    $name = $_POST['name'];
    echo "$name <br>";
    $email = $_POST['email'];
    echo "$email <br>";
    var_dump($_REQUEST);

?>