<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="css/theme.css" rel="stylesheet">
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
    rel='stylesheet'>
    
    
    
        <script type="text/javascript">
        function valid()
        {
        if(document.chngpwd.password.value=="")
        {
        alert("Current Password Filed is Empty !!");
        document.chngpwd.password.focus();
        return false;
        }
        else if(document.chngpwd.newpassword.value=="")
        {
        alert("New Password Filed is Empty !!");
        document.chngpwd.newpassword.focus();
        return false;
        }
        else if(document.chngpwd.confirmpassword.value=="")
        {
        alert("Confirm Password Filed is Empty !!");
        document.chngpwd.confirmpassword.focus();
        return false;
        }
        else if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
        {
        alert("Password and Confirm Password Field do not match  !!");
        document.chngpwd.confirmpassword.focus();
        return false;
        }
        return true;
        }
    </script>
    
</head>