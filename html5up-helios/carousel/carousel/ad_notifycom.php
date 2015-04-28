<?php

session_start();
include('connection.php');

$title=mysql_escape_string($_POST['title']);
$content=mysql_escape_string($_POST['content']);
$compname=mysql_escape_string($_POST['compname']);

$message = "NOTIFICATION SUCCESSFUL";

$ins=mysql_query("SELECT id from com_basic where name='$compname'");
if ($ins) 
            {
            	
                
              if($row = mysql_fetch_assoc($ins))
              {
                

                $id=$row['id'];
				
				
				
//$ins =mysql_query("UPDATE notification SET cid='$id'where nid=LAST_INSERT_ID()");

mysql_query("INSERT INTO notification(title,type,content,cid)VALUES('$title','A','$content','$id')");

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

$ins =mysql_query("UPDATE notification SET cid='$id', file_name='$fileName',file_type='$fileType',file_size='$fileSize',file_content='$content' where nid=LAST_INSERT_ID()");

if(!$ins)
{
echo mysql_error();
}
}
echo "<script type='text/javascript'>alert('$message');</script>";
echo "<script type='text/javascript'>window.location.href='admin_notifycompany.html'</script>";
}

else
{
	echo "<script type='text/javascript'>alert('NO SUCH COMPANY');</script>";
echo "<script type='text/javascript'>window.location.href='admin_notifycompany.html'</script>";
}
}
else
{
	echo "<script type='text/javascript'>alert('NO SUCH COMPANY');</script>";
echo "<script type='text/javascript'>window.location.href='admin_notifycompany.html'</script>";
}

mysql_close($bd);

?>