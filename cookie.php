<?php 

  
    setcookie("age",18,time()+3600);
    echo $_COOKIE["age"];

    if(isset($_COOKIE['age'])) {
        if($_COOKIE['age'] == 18) {
            echo "you can buy";
        }
        else {
            echo "you can't buy.";
        }
    }

?>