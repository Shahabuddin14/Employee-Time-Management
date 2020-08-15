<?php 
    include"includes/config.php"; 
    session_start();

    if(strlen($_SESSION['alogin'])==0){	
        header('location:index.php');
    }
    else{

    if(isset($_GET['del'])){

        $query = "DELETE FROM officetime where id = '".$_GET['id']."'";
        $delete_user_query = mysqli_query($connection, $query);
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
                                        <h2>All registered user</h2>
                                    </div>

                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">day</th>
                                                <th scope="col">username</th>
                                                <th scope="col">entry time</th>
                                                <th scope="col">exit time</th>
                                                <th scope="col">total time (hrs)</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php 
                                            
                                                $query = "SELECT * FROM officetime ";
                                                $select_query = mysqli_query($connection, $query);

                                                $cnt = 1;
                                            
                                                while($row = mysqli_fetch_assoc($select_query)){
                                                    $id = $row['id'];
                                                    $username = $row['username'];
                                                    $entrytime = $row['entrytime'];
                                                    $exittime = $row['exittime'];
                                                    $day = $row['day'];
                                                    
                                                    $diff_min = ( strtotime( $exittime ) - strtotime( $entrytime ) ) / 60 / 60;
                                                    $total_time  = $diff_min;
                                                    sprintf( '%0.3f', $total_time);
                                                    
                                            ?>
                                            
                                            <tr>
                                                <th><?php echo $cnt ;?></th>
                                                <th><?php echo $day; ?></th>
                                                <td><?php echo $username ;?></td>
                                                <td><?php echo $entrytime ;?></td>
                                                <td><?php echo $exittime ;?></td>
                                                <td><?php echo $total_time ;?></td>
                                                <td>
                                                    <a href="user_office.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you want to delete?')"><i class="icon-remove-sign"></i></a>
                                                </td>
                                            </tr> <?php $cnt=$cnt+1; } ?>
                                        </tbody>
                                    </table>
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
