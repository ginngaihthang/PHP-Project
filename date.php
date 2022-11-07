<?php 
    echo "<h1>Date</h1>";
    echo "Today is".date("Y-m-d")."<br>";
    echo "Today is".date("d.m.Y")."<br>";
    echo "Today is".date("d M Y")."<br>";
    echo "Today is".date("d/m/y")."<br>";

    echo "Today is ".date("l")."<br>";

    echo "<h1>Time</h1>";
    echo "The time is ".date("h:i:sa");
    echo "<br>";
    echo date_default_timezone_get();
    echo "<br>";

    date_default_timezone_set("Asia/Yangon");
    echo "The time is ".date("h:i:sa");


    echo "<h1>Strtotime</h1>";
    $tomorrow = strtotime("tomorrow");
    echo $tomorrow;
    echo "<br>";
    echo "Tommorrow is ".date("Y-m-d",$tomorrow)."<br>";

    $nextSat = strtotime("next Saturday");
    echo $nextSat."<br>";
    echo "next Saturday is ".date("Y-m-d",$nextSat)."<br>";

    $next2weeks = strtotime("+2 weeks");
    echo "comming 2 weeks is ".date("Y-m-d", $next2weeks)."<br>";

    $next3months = strtotime("+3 months");
    echo "After 3 month later is ".date("Y-m-d",$next3months)."<br>";

    $nextYear = date("Y-m-d",mktime(0,0,0,date('m'),date('d'),date('Y')+1));
    echo $nextYear."<br>";

    echo date('y', strtotime('+1 year'));

?>