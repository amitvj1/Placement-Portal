<?php

require("PHPMailer/PHPMailerAutoload.php");

session_start();
include('connection.php');

$usn=mysql_real_escape_string($_POST['user']);
$email=mysql_real_escape_string($_POST['email']);

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

$query=mysql_query("SELECT * FROM stu_personal where USN='$usn' and email_id='$email'");
if($query)
{
$query1=mysql_fetch_assoc($query);
if(!$query1)
	{
	echo "<script type='text/javascript'>alert('no such entry in the database.either USN or emailID doesnot match')</script>";
	echo "<script type='text/javascript'>window.location.href= 'student_forgot.html';</script>";
}
else
{
	$ins=mysql_query("UPDATE stu_personal SET password='$str1' WHERE USN='$usn'"); 

if(!$ins)
{
	//echo "<script type='text/javascript'>alert('try again!!')</script>";
	//echo "<script type='text/javascript'>window.location.href= 'testing_studenthtml.html';</script>";
	die(mysql_error());
}

$name=$query1['name'];

$pass  = $str1;//FETCHING PASS
		
		$to = $email;
		
		$body  =  "<b>Hello ".$name." your new password for the account is: </br>
		</br>".$pass;
		/*$from = "lokesha805@gmail.com";
		$subject = "Password recovery";
		$headers1 = "From: $from\n";
		$headers1 .= "Content-type: text/html;charset=iso-8859-1\r\n";
		$headers1 .= "X-Priority: 1\r\n";
		$headers1 .= "X-MSMail-Priority: High\r\n";
		$headers
		1 .= "X-Mailer: Just My Server\r\n";
		$sentmail = mail ( $to, $subject, $body, $headers1 );*/
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
echo "<script type='text/javascript'>alert(' new password for login sent to registered e-mail Id')</script>";
	echo "<script type='text/javascript'>window.location.href= 'studentlogin.html';</script>";
	
	}	
		
//}	
	
	//else {
	 
	//echo "<span style='color:#ff0000;'> Not found your email in our database</span>";
		
		//}
	//If the message is sent successfully, display sucess message otherwise display an error message.

		
//}





//mysql_query("INSERT INTO stu_education(USN) VALUES ('$usn')");
//mysql_query("INSERT INTO stu_personal((name,father's_name,dob,temporary_address,permanent_address,email_id,mobile,landline) VALUES('$name','$father','$dob','$taddr','$paddr','$email','$mob','$land') where USN='$usn'");

//to check if an actual image or fake image
/*if(isset($_POST['upload']) && $_FILES['attach']['size'] > 0)
{
$fileName = $_FILES['attach']['name'];
$tmpName  = $_FILES['attach']['tmp_name'];
$fileSize = $_FILES['attach']['size'];
$fileType = $_FILES['attach']['type'];

$fp      = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));
$content = addslashes($content);
fclose($fp);
if(!get_magic_quotes_gpc())
{
    $fileName = addslashes($fileName);
}

include 'library/config.php';
include 'library/opendb.php';

$ins =mysql_query("UPDATE notification SET file_name='$fileName',file_type='$fileType',file_size='$fileSize',file_content='$content' where nid=1");
*/

}
else
{
	echo "<script type='text/javascript'>alert('No such entry');</script>";
	echo "<script type='text/javascript'>window.location.href='student_forgot.html';</script>";
}

?>