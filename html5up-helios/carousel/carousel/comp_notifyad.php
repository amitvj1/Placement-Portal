<?php

session_start();
include('connection.php');

if($_SESSION['name'])
{
$name=$_SESSION['name'];
$cid=$_SESSION['cid'];
$title=mysql_escape_string($_POST['title']);
$content=mysql_escape_string($_POST['content']);


$message = "NOTIFICATION SUCCESSFUL";
//echo "<script type='text/javascript'>alert('$name');</script>";

echo "<script type='text/javascript'>alert('$cid');</script>";

$in=mysql_query("INSERT INTO notification(title,type,content,cid)VALUES('$title','C','$content','$cid')");
if($in)
{
//$ins=mysql_query("SELECT id from com_basic where id='$'");
/*if ($ins) 
            {
            	
                
              if($row = mysql_fetch_assoc($ins))
              {
                

                $id=$row['id'];
				

				}
				}*/
//$ins =mysql_query("UPDATE notification SET cid='$cid'where nid=LAST_INSERT_ID()");
//if($ins)
//{
if(isset($_POST['upload']) && $_FILES['attach']['size'] > 0)
{
$fileName = $_FILES['attach']['name'];

$tmpName  = $_FILES['attach']['tmp_name'];
$fileSize = $_FILES['attach']['size'];
$fileType = $_FILES['attach']['type'];

$fp      = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));
$content = addslashes($content);
fclose($fp);
if(!get_magic_quotes_gpc())
{
    $fileName = addslashes($fileName);
}

$ins =mysql_query("UPDATE notification SET cid='$cid', file_name='$fileName',file_type='$fileType',file_size='$fileSize',file_content='$content' where nid=LAST_INSERT_ID()");

if(!$ins)
{
echo mysql_error();
echo "<script type='text/javascript'>alert('sorry!');</script>";
echo "<script type='text/javascript'>window.location.href='notify_company.php'</script>";
}
else
{
	echo "<script type='text/javascript'>alert('$message');</script>";
echo "<script type='text/javascript'>window.location.href='notify_company.php'</script>";
}
}
}
else
{
	echo mysql_error();
}
//}
//else
//{
	echo mysql_error();
//}
}

mysql_close($bd);

?>