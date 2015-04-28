<?php
session_start();
include('connection.php');
$p1=mysql_real_escape_string($_POST['p1']);
if($_SESSION['cid'])
{
	$usn=$_SESSION['cid'];
	$sql=mysql_query("UPDATE com_basic SET password='$p1' WHERE id='$usn' ");
if(!$sql)
{
	//echo mysql_error();
	 echo "<script type='text/javascript'>alert('could not update! try later.');</script>";
	 echo "<script type='text/javascript'>window.location.href= 'company_profile_view.php';</script>";
}	
else
{
	echo "<script type='text/javascript'>alert('password updated!');</script>";
	  echo "<script type='text/javascript'>window.location.href= 'company_profile_view.php';</script>";
}

}


?>