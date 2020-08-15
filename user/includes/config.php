<?php

    $SERVER = "localhost";
    $USER = "root";
    $PASSWORD = "";
    $DATABASE = "employee";


    $connection = mysqli_connect($SERVER, $USER, $PASSWORD, $DATABASE);

    if (!$connection){
        die("Connection failed: ". mysqli_connect_error());
    }

?> 