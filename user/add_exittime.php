<?php 

    include"includes/config.php"; 
    session_start();

     if(strlen($_SESSION['username'])==0){	
        header('location:index.php');
    }
    else{

        $tid=intval($_GET['id']);

        if(isset($_POST['submit'])){
        
            $username = $_SESSION['username'];
            $exittime = $_POST['exittime'];

            $query = "UPDATE officeTime set exittime = now() WHERE username = '{$username}' AND id = '$tid'  ";
            //$query .= "VALUES('{$entrytime}' )";

            $entry_query = mysqli_query($connection, $query);

            if($entry_query){
                echo "<script>alert('You are successfully register');</script>";
                header("location:office_time.php");
            }
            
            else{
                echo "<script>alert('Not register something went worng');</script>";
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
                                        <h2>Add office exit time</h2>
                                    </div>
                                    
                                    <form action="" method="post">
<!--
                                        <div class="form-group">
                                            <label for="entrytime" class="sr-only">Exit Time</label>
                                            <input type="text" name="exittime" id="exittime" class="span8"> 
                                        </div>
-->
                                        <button name="submit" id="login" class="btn btn-primary" type="submit" value="submit">Add</button>
                                    </form>
                                </div>  
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
    
    <!--/.wrapper-->

    <?php include"includes/footer.php"; } ?>
