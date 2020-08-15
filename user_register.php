<?php 

    include"includes/config.php"; 
    session_start();

    if(strlen($_SESSION['alogin'])==0){	
        header('location:index.php');
    }
    else{

    //registration code
    if(isset($_POST['register'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
//        $name = $_POST['name'];

        $sql_u = "SELECT * FROM users WHERE username='$username'";
        $res_u = mysqli_query($connection, $sql_u);


        if (mysqli_num_rows($res_u) > 0){
            echo "<script>alert('Sorry... username already taken');</script>";
        } 

        else{
            $query = "INSERT INTO users (username, password, date ) ";
            $query .= "VALUES('{$username}', '{$password}', now() )";

            $register_user_query = mysqli_query($connection, $query);

            if($register_user_query){
                echo "<script>alert('You are successfully register');</script>";
                header("location:user_list.php");
            }
            
            else{
                echo "<script>alert('Not register something went worng');</script>";
            }
        } 
    }
?>


<?php include"includes/header.php"; ?>

<body>
    <?php include"includes/nav.php"; ?>

    <!-- /navbar -->
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <?php include"includes/side_bar.php"; ?>
                <!--/.span3-->
                <div class="span9">
                    <div class="content">
                        <div class="btn-controls">
                            <div class="btn-box-row row-fluid">
                                <div class="module">
                                    <div class="module-head">
                                        <h2>Register a user</h2>
                                    </div>
                                    
                                    <form action="" method="post">
<!--
                                        <div class="form-group">
                                            <label for="name" class="sr-only">Name</label>
                                            <input type="text" name="name" id="name" class="span8" placeholder="Your name">
                                        </div>
-->

                                        <div class="form-group">
                                            <label for="name" class="sr-only">User Name</label>
                                            <input type="text" name="username" id="name" class="span8" placeholder="User name">
                                        </div>

                                        <div class="form-group mb-4">
                                            <label for="password" class="sr-only">Password</label>
                                            <input type="password" name="password" id="password" class="span8" placeholder="***********">
                                        </div>

                                        <button name="register" id="login" class="btn btn-primary" type="submit" value="Regisster">Regisster</button>
                                    </form>
                                </div>  
                            </div>
                        </div>
                    </div>
                    <!--/.content-->
                </div>
                <!--/.span9-->
            </div>
        </div>
        <!--/.container-->
    </div>
    <!--/.wrapper-->

<?php include"includes/footer.php"; } ?>
