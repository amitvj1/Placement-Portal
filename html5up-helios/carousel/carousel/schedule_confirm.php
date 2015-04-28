<?php
session_start();

$link = mysql_connect('localhost','root',''); 
if (!$link) { 
	die('Could not connect to MySQL: ' . mysql_error()); 
} 
$c=mysql_select_db('placed');

$str = "";
if(!empty($_GET['branches'])) 
{
// Loop to store the branches obtained
	foreach($_GET['branches'] as $selected) 
	{
		$str .= $selected . ";";	
	}
//echo "<br/><b>Note :</b> <span>Similarily, You Can Also Perform CRUD Operations using These Selected Values.</span>";
}

else
{
	echo "<b>Please Select Atleast One Option.</b>";
}

$branch = trim($str,';');
$cid = $_SESSION['cid'];
$nam=$_SESSION['name'];
//$cid = 1;
$date = $_GET['schedule_date'];
$year = DateTime::createFromFormat("Y-m-d",$date);
$year = $year->format("Y");
echo $year;
$content=$_GET['content'];
$session = $_GET['sess'];
$cut_off = $_GET['cutoffCGPA'];
$position = $_GET['position'];
$n_position = $_GET['number'];
$pack = $_GET['package'];
$link = $_GET['link'];

$result = mysql_query("INSERT INTO scheduling VALUES ('$date','$session','$branch','$cut_off','$position','$cid')");

if(!$result)
	{
		echo "<script type='text/javascript'>alert('already date booked !');</script>";
	echo "<script type='text/javascript'>window.location.href= 'schedule.php';</script>";
	}
else
{
	


$ins = mysql_query("INSERT INTO com_history VALUES ('$cid','$year','$n_position','$position','$pack','$branch')");
if(!$ins)
{
	echo "<script type='text/javascript'>alert('already date booked by you!');</script>";
	echo "<script type='text/javascript'>window.location.href= 'schedule.php';</script>";

}
else
{
	

$title=$nam." recruitment message".$year;
$msg="Hello Students<br> ".$nam." is coming for campus recruitment on ".$date."<br> cuttoff cgpa for application is ".$cut_off."<br> timings: ".$session."<br>job offered:".$position." <br>the departments which can apply are:".$branch."<br> salary per annum offered:".$pack."<br>link for registering:<a>".$link."</a> <br> here is the message by the company: ".$content;
$ins1 = mysql_query("INSERT INTO notification(title,type,content,cid) VALUES ('$title','S','$msg','$cid')");
if($ins1)
{
	echo "<script type='text/javascript'>alert('DATE SUCCESSFULLY BOOKED');</script>";
	echo "<script type='text/javascript'>window.location.href= 'company_profile_view.php';</script>";

}
else
{
	echo "<script type='text/javascript'>alert('error NOTIFYING!try again!');</script>";
	echo "<script type='text/javascript'>window.location.href= 'schedule.php';</script>";
	
}
}
}
?>