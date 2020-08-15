<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <i class="icon-reorder shaded"></i>
            </a>
            
            <a class="brand" href="home.php" style="text-transform: capitalize;"><?php echo $_SESSION['username']; ?></a>
            
            <div class="nav-collapse collapse navbar-inverse-collapse">
                <ul class="nav pull-right">
                    <li class="nav-user dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <?php echo $_SESSION['username']; ?>
                        <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="divider"></li>
                            <li><a href="change-password.php">Change Password</a></li>
                            <li><a href="logout.php">logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.nav-collapse -->
        </div>
    </div>
    <!-- /navbar-inner -->
</div>