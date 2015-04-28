<?php
//asking a question

          session_start();
          if(isset($_SESSION['username']))
          {

echo "hiiii";          
//connecting with the database
require 'connect.php';

//starting the session of the user
$title=mysql_real_escape_string($_POST['title']);
$question=mysql_real_escape_string($_POST['question']);
$user=$_SESSION['username'];
//$user='1PI12CS048';
$tags=mysql_real_escape_string($_POST['tags']);
$res=mysql_query("INSERT INTO forum.question (`title`,`question`,`user`,`tags`,`upvotes` ) VALUES ('$title','$question','$user','$tags','0')");		
if($res)
{ 
  echo "<script type='text/javascript'>alert('SUCCESSFULL');</script>";
echo"<script >window.location.href='main_page.php';</script>";
}



								   
else
{

  echo mysql_error();
	//die("lid query:".mysql_error());
}
}
else
          {
            session_destroy();
            echo "<script type='text/javascript'>window.location.href= 'forum_login.html';</script>";
          }
?>

