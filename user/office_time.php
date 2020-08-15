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
                                                <th scope="col">Day</th>
                                                <th scope="col">Entry time</th>
                                                <th scope="col">Exit time</th>
                                                <th scope="col">Total time (hrs)</th>
                                                <th scope="col">Add Exit time </th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php 
                                            
                                                $userName = $_SESSION['username'];
                                            
                                                $query = "SELECT * FROM officeTime WHERE username = '$userName' ";
                                                $select_query = mysqli_query($connection, $query);

                                                $cnt = 1;
                                            
                                                while($row = mysqli_fetch_assoc($select_query)){
                                                    $id = $row['id'];
                                                    $username = $row['username'];
                                                    $entrytime = $row['entrytime'];
                                                    $exittime  = $row['exittime'];
                                                    $day  = $row['day'];
                                                    $diff_min = ( strtotime( $exittime ) - strtotime( $entrytime ) ) / 60 / 60;
                                                    $total_time  = $diff_min;
                                                    sprintf( '%0.3f', $total_time);
                                            ?>
                                            <tr>
                                                <th><?php echo $cnt; ?></th>
                                                <td><?php echo $day; ?></td>
                                                <td><?php echo $entrytime; ?></td>
                                                <td><?php echo $exittime; ?></td>
                                                <td><?php echo $total_time; ?></td>

                                                
                                                <td>
                                                    <a href="add_exittime.php?id=<?php echo $row['id']?>" >Add Exit time</a>
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
