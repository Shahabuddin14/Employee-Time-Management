<?php 

    include"includes/config.php"; 
    session_start();

    if(strlen($_SESSION['alogin'])==0){	
        header('location:index.php');
    }
    else{

    $tid=intval($_GET['id']);

    if(isset($_POST['submit'])){
        $task_name = $_POST['task_name'];
        $username = $_POST['username'];

        $sql = mysqli_query($connection,"UPDATE user_task SET task_name='$task_name', username = '$username', date = now()  WHERE id='$tid' ");
        header("location:task_list.php");
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
                                        <h2>Edit Task</h2>
                                    </div>
                                    
                                    <form action="" method="post">
                                        <?php 

                                            $query = mysqli_query($connection,"SELECT * FROM user_task where id='$tid'");
                                           
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                        
                                        <div class="form-group">
                                            <label for="name" class="sr-only">Name</label>
                                            <input type="text" name="task_name" id="name" class="span8" value="<?php echo htmlentities($row['task_name']);?>">
                                        </div>
                                        
                                        <div class="form-group">
                                            <select name="username" class="span8">
                                                <option value="">Select User</option> 
                                                <?php

                                                    $query = mysqli_query($connection,"select * from users");
                                                    while($row=mysqli_fetch_array($query)){
                                                ?>

                                                <option value="<?php echo $row['username'];?>"><?php echo $row['username'];?></option>
                                                <?php } ?>
                                            </select>
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
