
<?php
    include('includes/config.php');
    session_start();

    if(strlen($_SESSION['username'])==0){	
        header('location:index.php');
    }
    else{
        
        if(isset($_POST['submit'])){
            $sql = mysqli_query($connection,"SELECT password FROM  users where password='".md5($_POST['password'])."' && username='".$_SESSION['username']."'");
            $num = mysqli_fetch_array($sql);
            if($num>0){
                $connection = mysqli_query($connection,"update users set password='".md5($_POST['newpassword'])."' where username='".$_SESSION['username']."'");
                $_SESSION['msg']="Password Changed Successfully !!";
            }
            else{
                $_SESSION['msg']="Old Password not match !!";
            }
        }
?>

<?php include('includes/header.php');?>

<body>
    <?php include"includes/nav.php"; ?>

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <?php include('includes/side_bar.php');?>				
                <div class="span9">
                    <div class="content">
                        <div class="module">
                            <div class="module-head"><h3> Change Password</h3></div>
                            <div class="module-body">

                                <?php 
                                    if(isset($_POST['submit'])){
                                ?>
                                
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
                                </div>
                                <?php } ?>
                                <br>

                                <form class="form-horizontal row-fluid" name="chngpwd" method="post" onSubmit="return valid();">
                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Current Password</label>
                                        <div class="controls">
                                            <input type="password" placeholder="Enter your current Password"  name="password" class="span8 tip" required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">New Password</label>
                                        <div class="controls">
                                            <input type="password" placeholder="Enter your new current Password"  name="newpassword" class="span8 tip" required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Current Password</label>
                                        <div class="controls">
                                            <input type="password" placeholder="Enter your new Password again"  name="confirmpassword" class="span8 tip" required>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" name="submit" class="btn">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php');  ?>

</body>
<?php } ?>