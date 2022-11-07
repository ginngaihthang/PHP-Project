<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

</head>
<body>

    <?php 

        session_start();
        if(isset($_SESSION['name'])) {

?>

            <div class="contianer my-5">
                <h3 class="text-center"><?php echo $_SESSION['name']?></h3>
                <a href="logout.php">Logout.php</a>
            </div>
            
<?php
        }else {
    
    
    ?>

    <div class="continer my-4">
        <div class="row">
            <h3 class="text-center">Login Form</h3>
            <div class="col-md-4 offset-md-4">
                <form action="login.php" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="xxxxxx">
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php 
    
        }
    ?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>