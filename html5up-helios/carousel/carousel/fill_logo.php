<?php

session_start();
if($_SESSION['cid'])
{
$cid=$_SESSION['cid'];

}
include('connection.php');

if(isset($_POST['upload']) && $_FILES['pic']['size'] > 0)
{
$fileName = $_FILES['pic']['name'];

$tmpName  = $_FILES['pic']['tmp_name'];
$fileSize = $_FILES['pic']['size'];
$fileType = $_FILES['pic']['type'];


$fp      = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));
$content = addslashes($content);
fclose($fp);
if(!get_magic_quotes_gpc())
{
    $fileName = addslashes($fileName);
}

$ins =mysql_query("UPDATE com_basic SET logo='$content' where id='$cid'");

if(!$ins)
{
echo mysql_error();
echo "<script type='text/javascript'>alert('could not update! try later.');</script>";
	 echo "<script type='text/javascript'>window.location.href= 'company_profile_view.php';</script>";
}
else
{
	echo "<script type='text/javascript'>alert('SUCCESSFUL');</script>";
	 echo "<script type='text/javascript'>window.location.href= 'company_profile_view.php';</script>";
}
}
mysql_close($bd);

?>