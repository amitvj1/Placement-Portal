<?php
session_start();


if(isset($_SESSION['username']))
{
	session_destroy();

	echo "<script type='text/javascript'>window.location.href= 'http://localhost/bootstrap-3.3.2/docs/examples/html5up-helios/index.html';</script>";
}

else
{
	echo "<script type='text/javascript'>window.location.href= 'http://localhost/bootstrap-3.3.2/docs/examples/html5up-helios/index.html';</script>";	
}
?>

