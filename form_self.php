<?php 
    //var_dum($_SERVER["REQUEST_METHOD"]);
    $name = '';
    if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name = $_POST["name"];
    }



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        <br><br>
        <button type="submit">Submit</button>
    </form>

    <h1><?php echo $name; ?></h1>
</body>
</html>