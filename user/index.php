<?php
    include"includes/config.php";
    session_start();

    //login code
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $query = mysqli_query($connection,"SELECT * FROM users WHERE username='$username' AND password='$password'");
        $num = mysqli_fetch_array($query);

        if($num>0){
            header("location:change-password.php");
//            $_SESSION['username']=$username;
//            $_SESSION['name']=$name;
//            $_SESSION['id']=$id;
            
            
            $extra="home.php";//
            $_SESSION['username']=$username;
            //$_POST['username'] = $username;
            $_SESSION['id']=$num['id'];
            $host=$_SERVER['HTTP_HOST'];
            $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
            header("location:change-password.php");
            exit();
        }
        else{
            $extra = "index.php";
            $host = $_SERVER['HTTP_HOST'];
            $uri = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
            header("location:http://$host$uri/$extra");
            exit();
            echo "<script>alert('username / password incorrect');</script>";
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Login</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    
                    <div class="col-md-6 offset-md-3">
                        <div class="card-body">
                            
                            <p class="login-card-description">User Login</p>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="username" class="sr-only">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Your username">
                                </div>
                                
                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="***********">
                                </div>
                                
                                <button name="login" id="login" class="btn btn-primary login-btn mb-4" type="submit" value="Login">Login</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
