<?php
session_start();
include('connection.php');
$taddress=mysql_real_escape_string($_POST['taddress']);
$email=mysql_real_escape_string($_POST['email']);
$telephone=mysql_real_escape_string($_POST['telephone']);
$paddress=mysql_real_escape_string($_POST['paddress']);
if($_SESSION['usn'])
{
	$usn=$_SESSION['usn'];
	$sql=mysql_query("UPDATE stu_personal SET temporary_address='$taddress',permanent_address='$paddress',mobile='$telephone',email_id='$email' WHERE USN='$usn' ");
if(!$sql)
{
	 echo "<script type='text/javascript'>alert('could not update! try later.');</script>";
	  echo "<script type='text/javascript'>window.location.href= 'student_afterlogin.php';</script>";
}	
else
{
	echo "<script type='text/javascript'>alert('information updated!');</script>";
	  echo "<script type='text/javascript'>window.location.href= 'student_afterlogin.php';</script>";
}

}
?>