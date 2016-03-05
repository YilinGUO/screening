<?php

/*
$ID = $_POST['user'];
$Password = $_POST['pass'];
*/
function SignIn()
{
    $host='localhost';
    $user='root';
    $password='';
    $db='screening';

    $connection=mysqli_connect($host, $user, $password, $db);
    session_start();   //starting the session for user profile page
    if(!empty($_POST['user']))   //checking the 'user' name which is from Sign-In.html, is it empty or have some text
    {
        $query = mysqli_query($connection, "SELECT *  FROM UserName where user_name = '$_POST[user]' AND pass = '$_POST[pass]'") or die(mysqli_error($connection));
        $row = mysqli_fetch_array($query) or die(mysqli_error($connection));
        if(!empty($row['user_name']) AND !empty($row['pass']))
        {
            $_SESSION['user_name'] = $row['pass'];
            echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE...";

        }
        else
        {
            echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY...";
        }
    }
}
if(isset($_POST['submit']))
{
    SignIn();
}

?>