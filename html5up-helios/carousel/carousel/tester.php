<?php 
    include("connection.php");  
    //$fetc = "SELECT * FROM stu_personal where USN='1PI12EE067";
    $result = mysql_query("SELECT * FROM stu_personal where USN='1PI12EE067'");
?>
<!DOCTYPE html>
<html>
<head><title>..</title></head>
<body>
<?php
if($row1=mysql_fetch_assoc($result))
{
    $name=$row1['file_name'];
    $type=$row1['file_type'];
    ?>
<div class="rect">
<img alt="down-icon" src="down-drop-icon.png" align="left" width="20" height="20" />
<a href="download.php?filename=<?php echo $name ;?>" >
<?php echo $name ;?></a>
</div>
<?php 
} 
?>
</body>
</html>