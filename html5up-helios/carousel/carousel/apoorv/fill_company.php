<?php
session_start();
include('connection.php');
$cname=mysql_escape_string($_POST['company_name']);
$web=mysql_escape_string($_POST['site_link']);

$tele=mysql_escape_string($_POST['telephone']);

$job=mysql_escape_string($_POST['role']);
$tier=mysql_escape_string($_POST['tier']);


$salary=mysql_escape_string($_POST['package']);
$cuname=mysql_escape_string($_POST['company_username']);
$cpwd=mysql_escape_string($_POST['cur_password']);
$add=mysql_escape_string($_POST['address']);
$num=mysql_escape_string($_POST['npost']);


echo $cname;
echo $web;
echo $tele;

echo $job;
echo $tier;

echo $salary;
echo $cuname;
echo $cpwd;


$ins = mysql_query("INSERT INTO com_basic (name,address,phone,website,admin_id) VALUES('$cname','$add','$tele','$web','1')");


//$id=LAST_INSERT_ID();
$id=mysql_insert_id();
echo "id is $id";
$name = $_POST['branches'];
    if(isset($_POST['branches'])) {

    echo "You chose the following attribute(s): <br>";
    foreach ($name as $branches){
	
    echo $branches."<br />";
	if($branches==1)
	$branch='CS';
	if($branches==2)
	$branch='EC';
	if($branches==3)
	$branch='IS';
	if($branches==4)
	$branch='TCE';
	if($branches==5)
	$branch='EEE';
	if($branches==6)
	$branch='CV';
	if($branches==2)
	$branch='BT';
	
	$ins1=mysql_query("INSERT INTO com_offer VALUES('$branches','$branch','$job','$salary','$tier','$num','$id')");
	if(!$ins1)
{
echo mysql_error();
}
	
	
    }} 

if(!$ins)
{
echo mysql_error();
}


//if(!$ins1)
//{
//echo mysql_error();
//}

?>
