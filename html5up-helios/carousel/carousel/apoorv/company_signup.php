<?php
session_start();
include('connection.php');
$cname=mysql_escape_string($_POST['company_name']);
$web=mysql_escape_string($_POST['site_link']);

$tele=mysql_escape_string($_POST['telephone']);

$cuname=mysql_escape_string($_POST['company_username']);
$cpwd=mysql_escape_string($_POST['cur_password']);
$add=mysql_escape_string($_POST['address']);

$ins = mysql_query("INSERT INTO com_basic (name,address,phone,website,admin_id) VALUES('$cname','$add','$tele','$web','1')");


//$id=LAST_INSERT_ID();
$id=mysql_insert_id();
echo "id is $id";
  if(!$ins1)
{
echo mysql_error();
}
  
  
  

if(!$ins)
{
echo mysql_error();
}


//if(!$ins1)
//{
//echo mysql_error();
//}

?>

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Company Sign up Form</title>
  <link rel="stylesheet" href="css/style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  <style type="text/css">
    #first
    {
            background-color:black;
            border-style: none;
            height: 300px;
            width: 1400px;
            
    }
    /*#second
    {
            background-color:grey;
            height: 1000px;
            width: 1500px;
    }*/
   
    
      
    
    #third
    {
      color: white;
      position: relative;
      left: 10px;
      top: 20px;
      
    }
    .myButton {
	
	box-shadow:inset 0px 39px 0px -24px #bbdaf7;
	background-color:#79bbff;
	
	border-radius:4px;
	border:1px solid #84bbf3;
	
	cursor:pointer;
	color:black;
	font-family:arial;
	font-size:15px;
	padding:6px 15px;
	text-decoration:none;
	text-shadow:0px 1px 0px #528ecc;
	
}
.myButton:hover {
	background-color:#378de5;
}
.myButton:active {
	position:relative;
	top:1px;
	
}
  </style>
  <div id="first">
  
   <div style="position:fixed; top:60px; width:600px ;height:100px; left:60px; ">
    <p><b><font size="8px" color="white">PES UNIVERSITY</font></b></p>
    <p><b><font size="4px" color="white">Company Sign-Up Form</font></b></p>
  </div>
  <div  style="position:fixed; top:25px; width:100px ;height:100px; right:20px; " >
    <img src="pes.png" style="width:90px;height:90px;">
  </div>
  </div>
    
  
  
  
  
  <div id ="second">
   <div id ="third">
  <form method="post" action="fill_company.php" class="login"\>
    <p>
      <label valign="top" for="login">Username:</label>
      <input type="text" name="username" id="Username" value="username" required>
    </p>
    
    <p>
      <label valign="top" for="password">Password:</label>
      <input type="password" name="password" id="password" value="password" required>
    </p>
    
    <p>
      <label valign="top" for="repass">Re-Enter:</label>
      <input type="password" name="repass" id="repass" value="repass" required>
    </p>

    
    <p>
      <label valign="top" for="company_name">C Name</label>
      <input type="text" name="company_name" id="company_name" value="" required>
    </p>

    
     <p>
      <label valign="top" for="phone">Phone</label>
      <input type="telephone" name="phone" id="phone" value="" required>
    </p>
     

     <p>
      <label  valign="top" for="link">Website</label>
      <input type="url" name="link" id="link" value="url" required>
    </p>       
          
   
   <div  style="top:500px; width:200px ;height:100px; left:600px; " >
    <a href="" class="myButton" id="a1" align= "right">SUBMIT</a>
    </div>
  </form>
    </div>
    </div>
  </body>
</html>
