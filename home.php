<?php 
    include"includes/config.php"; 
    session_start();

    if(strlen($_SESSION['alogin'])==0){	
        header('location:index.php');
    }
    else{
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
                                <a href="user_list.php" class="btn-box big span4">
                                <?php 
                                    $query = "SELECT * FROM users ";

                                    if ($select_query = mysqli_query($connection, $query)){
                                        $rowcount=mysqli_num_rows($select_query);
                                    }
                                ?>
                                <i class="icon-bell-alt"></i><b><?php echo $rowcount; ?></b>
                                <p class="text-muted">Number of users</p>
                                </a>  
                         
                                <a href="task_list.php" class="btn-box big span4">
                                <?php 
                                    $query = "SELECT * FROM user_task ";

                                    if ($select_query = mysqli_query($connection, $query)){
                                        $rowcount=mysqli_num_rows($select_query);
                                    }
                                ?>
                                <i class="icon-bell-alt"></i><b><?php echo $rowcount; ?></b>
                                <p class="text-muted">Number of tasks</p>
                                </a>  
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

<?php include"includes/footer.php"; ?>
<?php } ?>


