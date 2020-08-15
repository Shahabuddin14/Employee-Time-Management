<?php 

    include"includes/config.php"; 
    session_start();

    if(strlen($_SESSION['username'])==0){	
        header('location:index.php');
    }
    else{

        $tid=intval($_GET['id']);

        if(isset($_POST['submit'])){
            //$name = $_POST['name'];

            $sql = mysqli_query($connection,"UPDATE  user_task SET end_time = now() WHERE id='$tid' ");
            header("location:task.php");
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
                                        <h2>Set task start time</h2>
                                    </div>
                                    
                                    <form action="" method="post">
                                        <?php 

                                            $query = mysqli_query($connection,"SELECT * FROM user_task where id='$tid'");
                                            $cnt = 1;
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                        
<!--
                                        <div class="form-group">
                                            <label for="name" class="sr-only">Name</label>
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Your name" value="<?php echo htmlentities($row['task_name']);?>">
                                        </div>
-->

                                        <?php } ?>

                                        <button name="submit" id="login" class="btn btn-primary" type="submit" value="Update">End time</button>
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
