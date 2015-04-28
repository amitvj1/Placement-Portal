<?php
session_start();
include('connection.php');
if($_SESSION['username'])
{
$name=$_SESSION['username'];
$pass=mysql_escape_string($_POST['current']);
$pass1=mysql_escape_string($_POST['confirm']);
$message = "password changed";
	echo "<script type='text/javascript'>alert('$message');</script>";

	echo "<script type='text/javascript'>window.location.href='admin_change.html'</script>";
	
$ins=mysql_query("UPDATE admin SET pwd='$pass1' WHERE pwd='$pass' and user_name='$name'");
	
}mysql_close($bd);
?>
