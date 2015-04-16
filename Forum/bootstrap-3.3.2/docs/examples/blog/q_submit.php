<?php
//connecting with the database
require 'connect.php';

//starting the session of the user
session_start();
//$query=mysql_query("SELECT ")
$title=mysql_real_escape_string($_POST['title']);
$question=mysql_real_escape_string($_POST['question']);
//$user=$_SESSION['user'];
$user='1PI12CS048';
$qid=time();
$tags=mysql_real_escape_string($_POST['tags']);
$res=mysql_query("INSERT INTO forum.question (`qid`,`title`,`question`,`user`,`tags`,`upvotes` ) VALUES ('$qid','$title','$question','$user','$tags',0)");		
if($res)
echo"<script >window.location.href='http://localhost/SE%20Project/bootstrap-3.3.2/docs/examples/blog/main_page.php';</script>";

echo 'not done';


								   
if(!$res)
{
	die("lid query:".mysql_error());
}

?>

