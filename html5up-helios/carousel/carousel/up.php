<?php
echo dirname[__FILE__];
//if (isset($_POST["file2"])) $file2=$_POST["file2"];
echo '<!DOCTYPE html>
<html>
<head></head>
<body>
<form action="excel.php" method="POST" enctype="multipart/form-data">
<input type="file" name="file" id="file"/>
<input type="submit">
</form>
</body>
</html>';
?>