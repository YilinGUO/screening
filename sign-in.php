<!DOCTYPE HTML>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body id="body-color">

<div id="Sign-In">
    <fieldset><legend>LOG-IN HERE</legend>
        <form method="POST" action="check-sign-in.php">
            User <br><input type="text" name="user" size="40"><br>
            Password <br><input type="password" name="pass" size="40"><br>
            <div id="login" class="login">
            <input id="button" type="submit" name="submit" value="Log-In">
            </div>
        </form>
    </fieldset>
</div>
<?php
session_start();
//$reasons = array("password" => "Wrong Username or Password", "blank" => "You have left one or more fields blank."); if ($_GET["loginFailed"]) echo $reasons[$_GET["reason"]];
if (isset($_SESSION['message']))
{
    echo '<div class="error">' . $_SESSION['message'] . '<br></div>';
    unset($_SESSION['message']);
}
?>

</body>
</html>