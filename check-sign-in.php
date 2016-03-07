<?php

/*
$ID = $_POST['user'];
$Password = $_POST['pass'];
*/
function SignIn()
{
    session_start();
    $host='localhost';
    $user='root';
    $password='';
    $db='screening';

    $connection=mysqli_connect($host, $user, $password, $db);
    if(!empty($_POST['user']))   //checking the 'user' name which is from Sign-In.html, is it empty or have some text
    {
        $query = mysqli_query($connection, "SELECT *  FROM UserName where user_name = '$_POST[user]' AND pass = '$_POST[pass]'") or die(mysqli_error($connection));
        $row = mysqli_fetch_array($query);
        if(!empty($row['user_name']) AND !empty($row['pass']))
        {
            $_SESSION['user_name'] = $row['pass'];
            echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE...";
            echo "<script>window.open('view.php','_self')</script>";
        }
        else
        {
            $_SESSION['message'] = 'invalid login';
            header("Location: sign-in.php");
            //exit();
            //die(header("location:sign-in.php?loginFailed=true&reason=password"));
        }
    }
    else {
        $_SESSION['message'] = 'empty username';
        header("Location: sign-in.php");
    }
}
if(isset($_POST['submit']))
{
    SignIn();
}

?>