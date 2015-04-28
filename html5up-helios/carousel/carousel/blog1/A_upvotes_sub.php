<?php
  $conn_error ='Could not connect';
  $host='localhost';
  $user='root';
  $pass='';
  $mysql_db='forum';
  mysql_connect($host,$user,$pass) or die($conn_error);
  mysql_select_db($mysql_db);
  

  //$user=$_SESSION['user'];
  $user='1PI12CS028';
  $qid=$_GET['qid'];
  $aid=$_GET['aid'];
  $result=mysql_query("SELECT upvotes from forum.answer where qid=$qid and aid=$aid");
  $row=mysql_fetch_assoc($result); 
  $count=$row['upvotes'];
  //echo $count;
  //echo $result['upvotes'];
  
  
  $ins_a_upvotes=mysql_query("INSERT into forum.a_upvotes (`aid`,`qid`,`user`) VALUES ('$aid','$qid','$user')");
  if($ins_a_upvotes)
  {
    $count+=1;
    $res=mysql_query("UPDATE forum.answer SET upvotes=$count WHERE qid=$qid and aid=$aid");

  }
  echo $count.";".$aid; 

?>