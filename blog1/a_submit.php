<?php
//answer submission page
            session_start();
          if(isset($_SESSION['username']))
          {

          
         

//connecting with the database
require 'connect.php';

//starting the session of the user

$answer=mysql_real_escape_string($_POST['answer']);
$qid=$_GET['qid'];

$user=$_SESSION['username'];


$res_send=mysql_query("INSERT INTO forum.answer (`qid`,`user`,`answer`,`upvotes`) VALUES ('$qid','$user','$answer',0)");
								   
if(!$res_send)
{
	die("lid query:".mysql_error());
}
}
 else
          {
            //session_destroy();
            echo "<script type='text/javascript'>window.location.href= 'main_page.php';</script>";
          }

?>
	
<!DOCTYPE html>
<html>
<head>
	<script>
		qid=String (<?php echo json_encode($qid); ?>);
		window.location.href='Q.php?id='+qid ;
	</script>
</head>
</html>



