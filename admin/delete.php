<?php
include 'database.php';
$a=$_POST['id'];
$query="DELETE FROM users WHERE id=$a";
mysqli_query($link,$query);
header('Location: login.php');
?>