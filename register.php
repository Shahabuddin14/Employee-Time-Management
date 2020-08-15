<?php
    include"includes/config.php";

    //registration code
    session_start();
    if(isset($_POST['register'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $name = $_POST['name'];
    
        

        $sql_u = "SELECT * FROM admin WHERE username='$username'";
        $sql_e = "SELECT * FROM admin WHERE email='$email'";
        $res_u = mysqli_query($connection, $sql_u);
        $res_e = mysqli_query($connection, $sql_e);

        if (mysqli_num_rows($res_u) > 0){
            echo "<script>alert('Sorry... username already taken');</script>";
        } 
        else if(mysqli_num_rows($res_e) > 0){
            echo "<script>alert('Sorry... email already taken');</script>";
        } 
        else{
            $query = "INSERT INTO admin (username, name, email, password, date ) ";
            $query .= "VALUES('{$username}', '{$name}', '{$email}', '{$password}', now() )";

            $register_user_query = mysqli_query($connection, $query);

            if($register_user_query){
                echo "<script>alert('You are successfully register');</script>";
            }
            else{
                echo "<script>alert('Not register something went worng');</script>";
            }
        } 
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Register</title>
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
                           
                            <p class="login-card-description">Admin Register</p>
                            <form action="" method="post">
                                <div class="form-group">
                                    
                                        <label for="name" class="sr-only">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Your name">
                                   
                                    </div>
                                    
                                    <div class="form-group">
                                    
                                        <label for="name" class="sr-only">User Name</label>
                                        <input type="text" name="username" id="name" class="form-control" placeholder="User name">
                                    
                                </div>

                                

                  

                                

                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email address">
                                </div>

                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="***********">
                                </div>

                                <button name="register" id="login" class="btn btn-primary" type="submit" value="Regisster">Regisster</button>
                            </form>
                            <p class="">Have an account? <a href="index.php" class="">Login here</a></p>
                            
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
