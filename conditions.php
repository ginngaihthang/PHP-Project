<?php 
    //One condition
    $x = 10;
    $y = "10";
    echo gettype($x);
    echo "<br>";
    echo gettype($y);
    echo "<br>";
    if($x == $y) {
        echo "X is equal to Y.<br>";
    }

    // Two Condiation
    date_default_timezone_set('Asia/Yangon');

    $time = date("H");
    echo "$time <br>";
    if($time >= 20 && $time <= 22) {
        echo "Start Php Class with Zoom.";
    }
    else {
        echo "Relax time";
    }

    // Many condition
    echo "<br>";
    $d = date("D");
    echo "$d <br>";
    if ($d == "Mon") {
        echo "This day is Monday.";
    } elseif ($d == "Tue") {
        echo "This day is Tresday.";
    }
    elseif($d == "Wed") {
        echo "This day is Wednesday.";
    }
    elseif($d == "Thu") {
        echo "This day is Thursday";
    }
    elseif($d == "Fri") {
        echo "This day is Friday.";
    }
    else {
       echo "This day is Holiday.";
    }

?>