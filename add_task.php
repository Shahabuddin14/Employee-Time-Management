<?php 

    include"includes/config.php"; 
    session_start();

     if(strlen($_SESSION['alogin'])==0){	
        header('location:index.php');
    }
    else{

    if(isset($_POST['task'])){

        $task_name = $_POST['task_name'];
        $username = $_POST['username'];

        $sql_u = "SELECT * FROM user_task WHERE task_name='$task_name'";
        $res_u = mysqli_query($connection, $sql_u);

        if (mysqli_num_rows($res_u) > 0){
            echo "<script>alert('Sorry... task already registered');</script>";
        } 

        else{
            $query = "INSERT INTO user_task ( task_name, username, date ) ";
            $query .= "VALUES('{$task_name}', '{$username}', now() )";

            $add_task_query = mysqli_query($connection, $query);

            if($add_task_query){
                echo "<script>alert('Task added successfully');</script>";
                header("location:task_list.php");
            }

            else{
            echo "<script>alert('Not added something went worng');</script>";
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
                                        <h2>Add a task</h2>
                                    </div>

                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="name" class="sr-only">Name</label>
                                            <input type="text" name="task_name" id="name" class="span8" placeholder="Taask name">
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
                                        <button name="task" id="login" class="btn btn-primary" type="submit" value="Regisster">Add task</button>
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

<?php include"includes/footer.php"; ?>
<?php } ?>
