<?php 
    include_once '../function.php';
    include_once '../connectDB.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .container{
            display: flex;
        }
    </style> 
</head>
<body>
    <div class="container">
        <div class="content">
            <img src="../assets/image/login.jpg" alt="login" width=50%>
        </div>
        <div class="content">
            <form action="register.php" method="post">
                <label for="">Username:</label>
                <input type="text" name="username" id="username">
                <br>
                <label for="">Password:</label>
                <input type="password" name="password" id="password">         
                <br>
                <label for="">Re type password:</label>
                <input type="password" name="repassword" id="repassword">         
                <br>
                <input type="submit" value="Register" name="btn-register">
            </form>
            <a href="login.php">Login</a>
        </div>
    </div>
    <?php 
        if(isset($_POST['btn-register'])){
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);
            $repassword = trim($_POST['repassword']);
            if(validateFormRegister($username, $password, $repassword)){
                register($username, $password);
                setDefaultUserInfo($username);
                header("location: login.php");
            }
        }
    ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>