<?php 
     ini_set('display_erros','1');
     ini_set('display_startup_errors', '1');
     error_reporting(E_ALL);

    include "math.php";
    include "calc.php";

    // echo Math\add(1,2);
    // echo "<br>";
    // echo Calc\add([23,2]);

    use NamespaceFolder\AppMath\Math;
    use NamespaceFolder\AppCalc\Calc;

    $math = new Math();
    echo "<h3>".$math->add(32,23)."</h3>";


    $calc = new Calc();
    echo "<he>".$calc->add([55,33])."</h3>";


?>