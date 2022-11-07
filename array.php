<?php 
    //Index array
    $laptops = array('Mac','Lenovo','Dell','Asus','HP', 'Acer');
    print_r($laptops);
    echo "<br>";
    echo $laptops[3];
    echo "<br>";

    $fruits = [];
    $fruits[0] = "Apple";
    $fruits[1] = "Orange";
    $fruits[2] = "Banana";
    $fruits[3] = "Mango";
    print_r($fruits);
    echo "<br>";

    foreach ($fruits as $key => $value) {
        echo "key is $key <br>";
        echo "Value is $value <br>";
        echo "$key => $value <br>";
    }

    //Associative Array
    $alphabet = [
        "A" => 1,
        "B" => 2,
        "Z" => 26
    ];
    print_r($alphabet);
    echo "<br>";
    print_r($alphabet["B"]);
    echo "<br>";
    print_r($alphabet["Z"]);
    echo "<br>";
    //Multidimensional Array
    $foods = [
        "breakfast" => ["Mohingar", "Nan Gyi Thoke", "Kaung Nyin Paung"],
        "lunch" => ["Shan style rice", "Rice","Rice and Burmese Curry"],
        "dinner" => ["Fried rice", "Mala Xiaung Guo"]
    ];

    print_r($foods);
    echo "<br>";
    print_r($foods["breakfast"]);
    echo "<br>";
    print_r($foods["lunch"]);
    echo "<br>";
    print_r($foods["dinner"]);
    echo "<br>";
    print_r($foods["breakfast"][2]);


    
?>