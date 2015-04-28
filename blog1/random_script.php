<?php
session_start();


if(isset($_SESSION['username']))
{
	session_destroy();

	echo "<script type='text/javascript'>window.location.href= 'forum_login.html';</script>";
}

else
{
	echo "<script type='text/javascript'>window.location.href= 'forum_login.html';</script>";	
}
?>

