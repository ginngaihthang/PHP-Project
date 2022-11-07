<?php 
    // variable
    $name = "Gin Ngaih Thang";
    $address = "Kalay";

    echo $name;
    echo "<br>";
    echo "My name is $name";
    echo "<br>";
    echo 'My localtion is $address';
    echo "<br>";
    echo 'My localtion is '.$address;
    echo "<br>";
    echo $name.' live in '.$address;

    $firstName = "Soung";
    $lastName = "Hey-Kyo";
    echo $firstName.' '.$lastName;
    echo "<br>";
    $firstName .= $lastName;
    echo "<br>";
    echo $firstName;

    $singer = " Rem nun ";
    echo "<br>";
    echo "My Farious singer is".trim($singer);
    echo "<br>";
    echo strlen($singer);
    echo "<br>";
    echo strtoupper($singer);
    echo "<br>";
    echo strtolower($singer);
    echo "<br>";
    echo substr("Hello Z2P Levle 2",6);
    echo "<br>";
    echo substr("Hello Z2P Level 2",6,3);
    echo "<br>";
    echo substr("Hello Z2P Level 2", -4);
    echo "<br>";
    
    // str_replace(search, replace, subject)
    echo str_replace("Manadalay","Smart City", "Hello Madalay");
?>