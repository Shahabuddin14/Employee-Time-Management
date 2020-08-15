<?php 

    include"includes/config.php"; 
    session_start();

    if(strlen($_SESSION['alogin'])==0){	
        header('location:index.php');
    }
    else{

    $uid=intval($_GET['id']);

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
//        $name = $_POST['name'];

        $sql = mysqli_query($connection,"update  users set username='$username',password='$password' where id='$uid' ");
        header('location:user_list.php');
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
                                        <h2>Edit user</h2>
                                    </div>
                                    
                                    <form action="" method="post">
                                        <?php 

                                            $query = mysqli_query($connection,"select * from users where id='$uid'");
                                            $cnt = 1;
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                        
<!--
                                        <div class="form-group">
                                            <label for="name" class="sr-only">Name</label>
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Your name" value="<?php echo htmlentities($row['name']);?>">
                                        </div>
-->

                                        <div class="form-group">
                                            <label for="name" class="sr-only">User Name</label>
                                            <input type="text" name="username" id="name" class="form-control" placeholder="User name" value="<?php echo htmlentities($row['username']);?>">
                                        </div>

                                        <div class="form-group mb-4">
                                            <label for="password" class="sr-only">Password</label>
                                            <input type="password" name="password" id="password" class="form-control" placeholder="***********" value="<?php echo htmlentities($row['password']);?>">
                                        </div>

                                        <?php } ?>

                                        <button name="submit" id="login" class="btn btn-primary" type="submit" value="Update">Update</button>
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
