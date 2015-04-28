<?php
session_start();
include('connection.php');
$p1=mysql_real_escape_string($_POST['p1']);
if($_SESSION['usn'])
{
	$usn=$_SESSION['usn'];
	$sql=mysql_query("UPDATE stu_personal SET password='$p1' WHERE USN='$usn' ");
if(!$sql)
{
	 echo "<script type='text/javascript'>alert('could not update! try later.');</script>";
	  echo "<script type='text/javascript'>window.location.href= 'student_afterlogin.php';</script>";
}	
else
{
	echo "<script type='text/javascript'>alert('password updated!');</script>";
	  echo "<script type='text/javascript'>window.location.href= 'student_afterlogin.php';</script>";
}

}


?>