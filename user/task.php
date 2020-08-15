<?php 
    include"includes/config.php"; 
    session_start();

    if(strlen($_SESSION['username'])==0){	
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
                            
                            
                            <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Task name</th>
                                                <th scope="col">Assign time</th>
                                                <th scope="col">Start time</th>
                                                <th scope="col">End time</th>
                                                <th scope="col">Total time (hrs)</th>
                                                <th scope="col">End Start time</th>
                                                <th scope="col">End time</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php 
                                            
                                                $userName = $_SESSION['username'];
                                            
                                                $query = "SELECT * FROM user_task WHERE username = '$userName' ";
                                                $select_query = mysqli_query($connection, $query);

                                                $cnt = 1;
                                            
                                                while($row = mysqli_fetch_assoc($select_query)){
                                                    $id = $row['id'];
                                                    $task_name = $row['task_name'];
                                                    $username = $row['username'];
                                                    $assign_time = $row['date'];
                                                    $start_time  = $row['start_time'];
                                                    $end_time  = $row['end_time'];
                                                    
                                                    $diff_min = ( strtotime( $end_time ) - strtotime( $start_time ) ) / 60 / 60;
                                                    $total_time  = $diff_min;
                                                    sprintf( '%0.3f', $total_time);
                                            ?>
                                            <tr>
                                                <th><?php echo $cnt ;?></th>
                                                <td><?php echo $task_name ;?></td>
                                                <td><?php echo $assign_time; ?></td>
                                                <td><?php echo $start_time; ?></td>
                                                <td><?php echo $end_time; ?></td>
                                                <td><?php echo $total_time; ?></td>
                                                <td>
                                                    <a href="edit_task.php?id=<?php echo $row['id']?>" >Add start time</a>
                                                </td>
                                                
                                                <td>
                                                    <a href="edit_task_end.php?id=<?php echo $row['id']?>" >Add end time</a>
                                                </td>
                                            </tr> <?php $cnt=$cnt+1; } ?>
                                        </tbody>
                                    </table>
                    
                                
                            </div>  
 
                            <div class="btn-box-row row-fluid">
                                      
                          
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

<?php include"includes/footer.php";  } ?>
