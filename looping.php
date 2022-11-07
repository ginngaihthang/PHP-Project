<?php 
    $a = 0;
    $b = 0;
    // for loop
    for($i=0; $i < 15; $i++) {
        $a += 10;
        $b += 5;
    }
    echo "The looping end is a = $a and b = $b <br>";

    // while loop
    $j = 0;
    $num = 50;
    while ($j <= 10) {
        $num --;
        $j++;
    }
    echo "Looping stop at j = $j and num = $num <br>";

?>