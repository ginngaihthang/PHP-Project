<?php 
    echo "<h1>Array</h1>";
    $pl = ["JavaScript","Python","java","PhP","C#"];

    echo "<h3>Sorting array</h3>";
    sort($pl);
    foreach($pl as $value) {
        echo "$value <br>";
    }

    echo "<h3>R-sort array</h3>";
    rsort($pl);
    foreach($pl as $value) {
        echo "$value <br>";

    }

    $foods = [
        'breakfast' => "Mohingar",
        'lunch' => "Rice",
        'dinnger' => "Mala Xianguo"
    ];

    echo "<h3>a-sort array</h3>";
    asort($foods);

    foreach($foods as $food) {
        echo "$food <br>";
    }

    echo "<h3>ar-sort array</h3>";
    arsort($foods);
    foreach($foods as $key => $food) {
        echo "$food <br>";
    }


    echo "<h3>k-sort array</h3>";
    ksort($foods);
    foreach($foods as  $key => $food) {
        echo "$key => $food <br>";
    }

    
    echo "<h3>kr-sort array</h3>";
    krsort($foods);
    foreach($foods as $key => $food) {
        echo "$key => $food <br>";
    }

    echo "<h3>array push </h3>";
    $colors = ["Red", "Green", "Blue", "Black", "White"];
    array_push($colors, "Pink","Yellow");
    foreach($colors as $color) {
        echo "$color <br>";
    }

    echo "<h3>array pop</h3>";
    array_pop($colors);
    foreach($colors as $color) {
        echo "$color <br>";
    }

    echo "<h3>Array Unset</he>";
    unset($colors[1]);
    foreach($colors as $color) {
        echo "$color <br>";
    }

    echo "<h3>Array <=> String</h3>";
    $actors = ["Pyay Ti Oo", "Daung","Ye Tile"];

    $actors_str = implode(',',$actors);
    echo "$actors_str <br>";

    $actor_arr = explode(",",$actors_str);
    print_r($actor_arr);
?>