<?php
             session_start();
          if(isset($_SESSION['username']))
          {

          
          
  $conn_error ='Could not connect';
  $host='localhost';
  $user='root';
  $pass='';
  $mysql_db='forum';
  mysql_connect($host,$user,$pass) or die($conn_error);
  mysql_select_db($mysql_db);
  

  $user=$_SESSION['username'];
  //$user='1PI12CS048';
  $qid=$_GET['id'];	
  $result=mysql_query("SELECT upvotes from forum.question where qid=$qid");
  $row = mysql_fetch_assoc($result);
  $count=$row['upvotes'];
  //echo "<script type='text/javascript'>alert()
  
  
  $ins_q_upvotes=mysql_query("INSERT into forum.q_upvotes (`qid`,`user`) VALUES ('$qid','$user')");
  if($ins_q_upvotes)
  {
     $count+=1;
    $res=mysql_query("UPDATE forum.question SET upvotes=$count WHERE qid=$qid");
   

  }
  
  echo $count;
}
else
          {
            session_destroy();
            echo "<script type='text/javascript'>window.location.href= 'main_page.php';</script>";
          }

?>