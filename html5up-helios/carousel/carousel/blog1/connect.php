<?php
  $conn_error ='Could not connect';
  $host='localhost';
  $user='root';
  $pass='';
  $mysql_db='forum';
  $con = mysql_connect($host,$user,$pass);
  if (!$con) 
			{
    			die('Could not connect: ' . mysql_error($con));
			}
  mysql_select_db($mysql_db);

//echo "connected";

?>