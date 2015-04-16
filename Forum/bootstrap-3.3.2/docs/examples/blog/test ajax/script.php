<?php
  $conn_error ='Could not connect';
  $host='localhost';
  $user='root';
  $pass='';
  $mysql_db='forum';
  mysql_connect($host,$user,$pass) or die($conn_error);
  mysql_select_db($mysql_db);
  echo "connected";	
  $result=mysql_query("SELECT * forum.upvotes");
  echo $result;
  $count=10;
  $res=mysql_query("INSERT INTO forum.upvotes VALUES ('$count')");

?>

<!DOCTYPE html>
<html>
<head>
  <script>
    alert('yo!');
    window.location='http://localhost/SE%20Project/bootstrap-3.3.2/docs/examples/blog/test%20ajax/script.php';
  </script>
</head>
<body>

</body>
</html>