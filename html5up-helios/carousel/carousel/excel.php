<?php
require('connection.php');
//echo $_SERVER['SCRIPT_FILENAME'];
//echo $_SERVER["DOENT_ROOT"];
//$tmpName  = $_FILES['file']['tmp_name'];
//echo $tmpName;
$str=$_FILES['list']['name'];

//echo mysql_real_escape_string($_POST['file'])
$str1='C:/tmp/'.$str;


$sql="LOAD DATA LOCAL INFILE '$str1' INTO TABLE stu_personal FIELDS TERMINATED BY ',' ENCLOSED BY '' LINES TERMINATED BY '\r\n'(USN,name,email_id)";
$d=mysql_query($sql);
if(!$d)
{
   // echo mysql_error();
    echo "<script type='text/javascript'>alert('TRY AGAIN!COULD NOT INSERT');</script>";
    echo "<script type='text/javascript'>window.location.href= 'import_students.html';</script>";

}

else
{
     echo "<script type='text/javascript'>alert('SUCCESSFULL');</script>";
    echo "<script type='text/javascript'>window.location.href= 'import_students.html';</script>";

}
?>


