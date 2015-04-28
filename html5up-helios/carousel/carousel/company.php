<?php

require("PHPMailer/PHPMailerAutoload.php");

session_start();
include('connection.php');

$name=mysql_real_escape_string($_POST['name']);
$web=mysql_real_escape_string($_POST['web']);
//$password=mysql_real_escape_string($_POST['password']);
//$father=mysql_real_escape_string($_POST['fname']);
//$dob=mysql_real_escape_string($_POST['date']);
//$age=mysql_real_escape_string($_POST['age']);
//$taddr=mysql_real_escape_string($_POST['taddress']);
$paddr=mysql_real_escape_string($_POST['paddress']);
$land=mysql_real_escape_string($_POST['landline']);
$mob=mysql_real_escape_string($_POST['mobile']);
$email=mysql_real_escape_string($_POST['email']);
$fileName = $_FILES['pic']['name'];

$tmpName  = $_FILES['pic']['tmp_name'];
$fileSize = $_FILES['pic']['size'];
$fileType = $_FILES['pic']['type'];


$fp      = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));
$content = addslashes($content);
fclose($fp);
if(!get_magic_quotes_gpc())
{
    $fileName = addslashes($fileName);
}
//$ten=mysql_real_escape_string($_POST['tmarks']);
//$twelve=mysql_real_escape_string($_POST['twmarks']);
//$sgpa1=mysql_real_escape_string($_POST['1SGPA']);
/*$sgpa2=mysql_real_escape_string($_POST['2SGPA']);
$sgpa3=mysql_real_escape_string($_POST['3SGPA']);
$sgpa4=mysql_real_escape_string($_POST['4SGPA']);
$sgpa5=mysql_real_escape_string($_POST['5SGPA']);
$sgpa6=mysql_real_escape_string($_POST['6SGPA']);
$cgpa=mysql_real_escape_string($_POST['CGPA']);
$admit=mysql_real_escape_string($_POST['admission']);*/
//$branch=mysql_real_escape_string($_POST['Branch']);
/*$cet=mysql_real_escape_string($_POST['CET']);
$comedk=mysql_real_escape_string($_POST['COMEDK']);*/
function generateRandomString($length = 10) 
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) 
    {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$str1=generateRandomString();

$query=mysql_query("SELECT * FROM com_basic where name='$name' and email='$email'");
if($query)
{
$query1=mysql_fetch_assoc($query);
if(!$query1)
{
	echo "<script type='text/javascript'>alert('no such entry in the database either name or emailID doesnot match')</script>";
	echo "<script type='text/javascript'>window.location.href= 'testing_companyhtml.html';</script>";
}
else
{
	if($query1['password']!='')
	{
		echo "<script type='text/javascript'>alert('account exists')</script>";
	echo "<script type='text/javascript'>window.location.href= 'testing_companyhtml.html';</script>";	
	}
	else
	{
		
$ins=mysql_query("UPDATE com_basic SET  website='$web',address='$paddr',phone='$mob',password='$str1',logo='$content' WHERE name='$name'"); 

if(!$ins)
{
	//echo "<script type='text/javascript'>alert('try again!!')</script>";
	//echo "<script type='text/javascript'>window.location.href= 'testing_studenthtml.html';</script>";
	die(mysql_error());

}
else
{
	//$quer=mysql_query("INSERT into eligibility VALUES('$usn','1','1','1')");



   
		$pass  = $str1;
		
		$to = $email;
		
		$body  =  "<b>Hello ".$name." your password for the account is: </br>
		</br>".$pass;
		
		$Mail = new PHPMailer();
$Mail->IsSMTP(); // Use SMTP
$Mail->Host        = "smtp.gmail.com"; // Sets SMTP server for gmail
$Mail->SMTPDebug   = 0; // 2 to enable SMTP debug information
$Mail->SMTPAuth    = TRUE; // enable SMTP authentication
$Mail->SMTPSecure  = "tls"; //Secure conection
$Mail->Port        = 587; // set the SMTP port to gmail's port
$Mail->Username    = 'pesrupam'; // gmail account username
$Mail->Password    = 'pesrupam123'; // gmail account password
$Mail->Priority    = 1; // Highest priority - Email priority (1 = High, 3 = Normal, 5 =   low)
$Mail->CharSet     = 'UTF-8';
$Mail->Encoding    = '8bit';
$Mail->Subject     = 'Password Recovery';
$Mail->ContentType = 'text/html; charset=utf-8\r\n';
$Mail->From        = 'pesrupam@gmail.com'; //Your email adress (Gmail overwrites it anyway)
$Mail->FromName    = 'PESIT-PLACEMENT';
$Mail->WordWrap    = 900; // RFC 2822 Compliant for Max 998 characters per line

$Mail->addAddress($to); // To
$Mail->isHTML( TRUE );
$Mail->Body    =  $body;
$Mail->AltBody = 'This is a recovery mail';
//$_SESSION['user1'] = $row;
		if(!$Mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $Mail->ErrorInfo;
    exit;
    }
$Mail->SmtpClose();
echo "<script type='text/javascript'>alert('password for login sent to registered e-mail Id')</script>";
	echo "<script type='text/javascript'>window.location.href= 'companylogin.html';</script>";
	
	}	
		


mysql_close($bd);
}
}
}
else
{
	echo "<script type='text/javascript'>alert('no such entry in DB')</script>";
	echo "<script type='text/javascript'>window.location.href= 'companylogin.html';</script>";
}
?>