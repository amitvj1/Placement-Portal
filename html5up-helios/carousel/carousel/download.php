<?php
include('connection.php');
session_start();

if($_SESSION['usn'])
{  
    $usn=$_SESSION['usn'];

$query = "SELECT file_name, file_type, file_size, file_content FROM stu_personal WHERE USN = '$usn'";       
        $result = mysql_query($query) or die('Error, query failed');
        list($name, $type, $size, $content) =  mysql_fetch_row($result);
        if($name==null)
        {
            echo "<script>alert('no  resume uploaded');</script>";
            echo "<script type='text/javascript'>window.location.href= 'resume.php';</script>";

        }
        else
        {
        header("Content-Disposition: attachment; filename=\"$name\"");
        header("Content-type: $type");
        header("Content-length: $size");
        echo $content;
        echo "<script>alert('file downloaded successfully');</script>";
 echo "<script type='text/javascript'>window.location.href= 'resume.php';</script>";
}
}

?>