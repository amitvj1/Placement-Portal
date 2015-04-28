<?php
  $conn_error ='Could not connect';
  $host='localhost';
  $user='root';
  $pass='';
  $mysql_db='forum';
  mysql_connect($host,$user,$pass) or die($conn_error);
  mysql_select_db($mysql_db);
  

  //$user=$_SESSION['user'];
  $user='1PI12CS048';
  $qid=$_GET['id'];	
  $result=mysql_query("SELECT upvotes from forum.question where qid=$qid");
  $row = mysql_fetch_assoc($result);
  $count=$row['upvotes'];
  
  
  $ins_q_upvotes=mysql_query("INSERT into forum.q_upvotes (`qid`,`user`) VALUES ('$qid','$user')");
  if($ins_q_upvotes)
  {
    $res=mysql_query("UPDATE forum.question SET upvotes=$count WHERE qid=$qid");
    $count+=1;
  }
  echo $count; 

?>