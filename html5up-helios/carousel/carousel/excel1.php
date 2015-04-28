<?php
require('connection.php');
//echo $_SERVER['SCRIPT_FILENAME'];
//echo $_SERVER["DOENT_ROOT"];
//$tmpName  = $_FILES['file']['tmp_name'];
//echo $_FILES['file']['name'];
$str=$_FILES['list1']['name'];

//echo mysql_real_escape_string($_POST['file'])
$str1='C:/tmp/'.$str;


//echo mysql_real_escape_string($_POST['file']);
$sql="LOAD DATA LOCAL INFILE '$str1' INTO TABLE stu_education FIELDS TERMINATED BY ',' ENCLOSED BY '' LINES TERMINATED BY '\r\n'(USN,branch,10th_perc,12th_diploma,sgpa_1,sgpa_2,sgpa_3,sgpa_4,sgpa_5,sgpa_6,cgpa,backlogs)";
$d=mysql_query($sql);
if(!$d)
{

  echo "<script type='text/javascript'>alert('TRY AGAIN!COULD NOT INSERT');</script>";
    echo "<script type='text/javascript'>window.location.href= 'import_students.html';</script>";


}

else
{

    echo "<script type='text/javascript'>alert('SUCCESSFULL');</script>";
    echo "<script type='text/javascript'>window.location.href= 'import_students.html';</script>";

}
?>


