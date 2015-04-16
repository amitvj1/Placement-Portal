<?php
//connecting with the database
require 'connect.php';

//starting the session of the user
session_start();
//$query=mysql_query("SELECT ")
$answer=mysql_real_escape_string($_POST['answer']);
$qid=$_GET['id'];
/*$res=mysql_query("SELECT user from forum.question where qid=$qid");	

$row = mysql_fetch_assoc($res);
if ($res) 
    $user=$row['user'];
*/

$user='1PI12CS048';

$res_send=mysql_query("INSERT INTO forum.answer (`qid`,`user`,`answer`,`upvotes`) VALUES ('$qid','$user','$answer',0)");
								   
if(!$res_send)
{
	die("lid query:".mysql_error());
}

?>
	
<!DOCTYPE html>
<html>
<head>
	<script>
		qid=String (<?php echo json_encode($qid); ?>);
		window.location.href='http://localhost/SE%20Project/bootstrap-3.3.2/docs/examples/blog/Q.php?id='+qid ;
	</script>
</head>
</html>



