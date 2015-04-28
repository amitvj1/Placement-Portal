<?php
//session_start();
$con=mysql_connect("localhost","root","");

if (!$con)
  {
	  echo "error!";
    die('Could not connect: ' . mysql_error());
  }
  
mysql_select_db("placed",$con);

 $sql = "SELECT * FROM com_history NATURAL JOIN com_basic ORDER BY year";

$i=0;
$retval = mysql_query( $sql, $con );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
while($row = mysql_fetch_assoc($retval))
{
    $year[$i]=$row['year'];
    $number[$i]=$row['no_of_posts'];
    $role[$i]=$row['role'];
    $package_val[$i]=$row['package'];
    $branch[$i]=$row['branch'];
    $name[$i]=$row['name'];
    echo $name[$i];
 //   echo $year[$i] . $number[$i] . $role[$i] . $package_val[$i] . $branch[$i] . $name[$i] . "\n";
    $i++;
}
 
 
mysql_close($con);
?>
