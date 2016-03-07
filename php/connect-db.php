<?php
$host='localhost';
$user='root';
$password='';
$db='screening';

$connection=mysqli_connect($host, $user, $password, $db);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>