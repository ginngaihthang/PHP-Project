<?php 

    $total = 100;
    $num1 = 300;
    $num2 = 500;
    echo $num1++;
    echo "<br>";
    echo $num1;
    echo "<br>";

    echo ++$num2;
    echo "<br>";
    echo $num2;

    $total += $num2;// $total = $total + $num2;
    echo "<br>";
    echo $total;
    echo "<br>";

    $firstNumber = 600;
    $secondNumber = 400;
    $add = $firstNumber + $secondNumber;
    $sub = $firstNumber - $secondNumber;
    $mul = $firstNumber * $secondNumber;
    $div = $firstNumber / $secondNumber;
    $mod = $firstNumber % $secondNumber;

    echo "$add <br> $sub <br> $mul <br> $div <br> $mod"; 
?>