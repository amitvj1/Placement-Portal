<html>
<head>
<title>Adding</title>

<?php
$dir = "exp_files/";
$company = $_POST['company'];


// Open a directory, and read its contents
if (is_dir($dir)){
  if ($dh = opendir($dir)){
    $i=0;
    while (($file = readdir($dh)) !== false){
  //echo "filename:" . $file . "<br>";
      $file_arr[$i++]=$file;
    }   
    $pat = "/".preg_quote($company)."\d+\.txt$/";
    $fl_array = preg_grep($pat, $file_arr);
    $n=sizeof($fl_array);       
  }
}
$exp = $_POST['exp'];
//echo $google;
$n = $n+1;
$filename = $company.(string)$n.".txt";
$myfile = fopen("exp_files/".$filename, "w") or die("Unable to open file!");
fwrite($myfile, $exp);
echo "done";
header('Refresh: 5;url=experience3.php');

?>

</head>
<body>
</body>
</html>
