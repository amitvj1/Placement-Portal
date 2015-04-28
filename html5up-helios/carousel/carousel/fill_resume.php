<?php

session_start();
include('connection.php');

//$title=mysql_escape_string($_POST['title']);
//$content=mysql_escape_string($_POST['content']);
//mysql_query("INSERT INTO notification(title,type,content)VALUES('$title','S','$content')");
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

$usn=$_SESSION['usn'];

$ins =mysql_query("UPDATE stu_personal SET file_name='$fileName',file_type='$fileType',file_size='$fileSize',file_content='$content' where USN='$usn'");

if($ins)
{
	//echo "could u ";
	echo "<script>alert('file successfully uploaded');</script>";
	 echo "<script type='text/javascript'>window.location.href= 'resume.php';</script>";

//echo mysql_error();

}

else
{

	//echo "could not";
echo mysql_error();
echo "<script>alert('file could not be uploaded,try again');</script>";
 echo "<script type='text/javascript'>window.location.href= 'resume.php';</script>";


}
}
else
{
echo "<script>alert('no file chosen');</script>";
 echo "<script type='text/javascript'>window.location.href= 'resume.php';</script>";
}
//mysql_close($bd);
?>