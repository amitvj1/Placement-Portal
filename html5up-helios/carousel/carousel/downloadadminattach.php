<?php
include('connection.php');
session_start();

if($_SESSION['usn'])
{  
    $nid=$_GET['fileid'];

$query = "SELECT file_name, file_type, file_size, file_content FROM notification WHERE nid = '$nid'";       
        $result = mysql_query($query) or die('Error, query failed');
        list($name, $type, $size, $content) =  mysql_fetch_row($result);
        if($name==null)
        {
            echo "<script>alert('no  such attachment uploaded');</script>";
            echo "<script type='text/javascript'>window.location.href= 'notification.php';</script>";

        }
        else
        {

        header("Content-Disposition: attachment; filename=\"$name\"");
        header("Content-type: $type");
        header("Content-length: $size");
         //echo "<script>alert('file downloaded successfully');</script>";
// echo "<script type='text/javascript'>window.location.href= 'notification.php';</script>";
        echo $content;
       
}
}

?>