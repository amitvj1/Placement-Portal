<?php
include('connection.php');
session_start();
if($_SESSION['cid'])
{
$id=$_SESSION['cid'];
$name=$_SESSION['name'];
$ins=mysql_query("SELECT name,id,address,phone,website,logo,username FROM com_basic WHERE id='$id' and name='$name'");
if ($ins) 
            {
            	//echo "jjj";
               // echo "abc";
              if($row = mysql_fetch_assoc($ins))
              {
                $image=$row['logo'];

                $id=$row['id'];
                $name=$row['name'];
                $address=$row['address'];
                $phone=$row['phone'];
                $website=$row['website'];
                $username=$row['username'];
               //echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['photo'] ).'"/>';
                $path=base64_encode( $image );
                //echo "<img src='php/imgView.php?imgId="+$row['photo']+"' />";
           			//echo $image;
              }
            
    else
    {
   			echo mysql_error();    
    }
            }
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../favicon.ico">

		<title>Companies Profile--PES University Placement Portal</title>

		<!-- Bootstrap core CSS -->
		<link href="docs/bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="docs/dashboard.css" rel="stylesheet">

		<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
		<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

<script>
		function init()
		{	//alert("jjkk");
			top_name=document.getElementById("top_name");
			logo=document.getElementById("img");
			com_name=document.getElementById("com_name");
			username=document.getElementById("company_username")		
			address=document.getElementById("address");
			telephone=document.getElementById("telephone");
			url=document.getElementById("url");
			//logo.alt="no image available";
			top_name.innerHTML="";
			//logo.innerHTML="";
			path=String(<?php echo json_encode($path); ?>);
			com_name.value="";
			telephone.value="";
			username.value="";
			address.value="";
			url.value="";
			name=String(<?php echo json_encode($name); ?>);


			path=String(<?php echo json_encode($path); ?>);
			logo.src="data:image/jpeg;base64,"+path;


			id=String(<?php echo json_encode($id); ?>);
			address1=String(<?php echo json_encode($address); ?>);
			phone=String(<?php echo json_encode($phone); ?>);
			website=String(<?php echo json_encode($website); ?>);
			
			top_name.innerHTML="Welcome "   +name;
			com_name.value=id;
			username.value=name;
			address.value=address1;
			telephone.value=phone;
			url.value=website;
			


		}
		
		</script>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		

	</head>

	<body onload="init()">

		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" id="top_name" name="top_name" href="#">Companies Portal -- PES University Placement Portal</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">

						<li><a href="company_profile_view.php">Home</a></li>
						<li><a href="company_logout.php">Sign Out</a></li>
					</ul>
					<form class="navbar-form navbar-right">
						<input type="text" class="form-control" placeholder="Search...">
					</form>
				</div>
			</div>
		</nav>

		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-3 col-md-2 sidebar">
					<ul class="nav nav-sidebar">
						<li><div style="position:relative;left=150px;"><img id="img" name="img" height="300" width="210" alt="student image" /></div></li>
						<li class="active"><a href="company_profile_view.php">Comapny Profile <span class="sr-only">(current)</span></a></li>
						

						<li><a href="changeLogo.php">Update Logo</a></li>
						<li><a href="change_password.php">Change Password</a></li>
						<li><a href="schedule.php">Schedule</a></li>
						<li><a href="notify_company.php">Notify to Admin</a></li>
						<li><a href="notification_from_admin_to_company.php">Notification from Admin</a></li>
					<ul class="nav nav-sidebar">
				
			
						
				</div>
				<div id ="logo"class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<img src="" alt="">LOGO here from db </img>
				</br></br></br>
					
				
					<h1 class="page-header">Name of the Company</h1>

					<div class="row placeholders">
						
					</div>

					<div class="table-responsive">

					

						<form name="htmlform" method="post" action="html_form_send.php">
		<table width="450px">
			
			<section>
			<h2 id="basic_details"> Basic Details <h2>
			


			<tr>
			<td valign="top">
				<label for="company_username">Company Username</label>
			</td>
			<td valign="top">
				<input  type="text" name="company_username" id="company_username" style="border-width:0px;" maxlength="50" size="30" readonly>
				<br></br>
			</td>
		`	</tr>
			<tr>
			<td valign="top">
				<label for="com_name">Company id </label>
			</td>
			<td valign="top">
				<input  type="text" name="com_name" id="com_name" style="border-width:0px;"maxlength="50" size="30" readonly>
				<br></br>
			</td>
			</tr>


			
			
			
			<tr>
			<td valign="top">
				<label for="address">Address </label>
			</td>
			<td valign="top">
				<input  type="text" name="address" id="address" style="border-width:0px;"maxlength="80" size="30" readonly>
				<br></br>
			</td>
 			</tr>
 			

			<tr>
			<td valign="top">
				<label for="telephone">Phone Number</label>
			</td>
			<td valign="top">
				<input  type="tel" name="telephone" id="telephone" style="border-width:0px;"maxlength="30" size="30" readonly>
				<br></br>
			</td>
			</tr>

			<tr>
			<td valign="top">
				<label for="url">Website</label>
			</td>
			<td valign="top">
				<input  type="url" name="url" id="url" style="border-width:0px;"maxlength="50" size="30" readonly>
				<br></br>
			</td>
			</tr>
			

			
 		</section>
 			


 		

				</form>
	




					</div>
				</div>
			</div>
		</div>



		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="docs/dist/js/bootstrap.min.js"></script>
		<script src="docs/assets/js/docs.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
	</body>
</html>
