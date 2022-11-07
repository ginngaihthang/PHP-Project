<?php 

    //function
    function myName() {
        echo "<h1>Gin Ngaih Thang</h1>";
    }

    myName();

    $myBrother = "Kyaw Kyaw";
    function brother($name) {
        echo "<h3>$name</h3>";
    }

    brother($myBrother);

    $x = 2344;
    $y = 34324;

    function sum($num1, $num2) {
        $result = $num1 + $num2;
        echo "$result <br>";
    }

    Sum($y, $x);

    function myNumber ($number=50) {
        echo "$number <br>";
    }

    myNumber(575);
    myNumber();
?>