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
                //echo "abc";
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

		<title>Password -Companies-PESU</title>

		<!-- Bootstrap core CSS -->
		<link href="docs/bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="docs/dashboard.css" rel="stylesheet">

		<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
		<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
		<script >	
		function init()
		{	//alert("jjkk");
			top_name=document.getElementById("top_name");
			top_name.innerHTML="";
			name=String(<?php echo json_encode($name); ?>);
			top_name.innerHTML="Welcome "   +name;
	 	
		}

	function fun()
	{
		p1=document.getElementById("p1");
		p2=document.getElementById("p2");
		if(p1.value!=p2.value){
				alert("Passwords do not match");
				p1.value="";
				p2.value="";
				p1.focus();
		}
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
					<a class="navbar-brand" id="top_name" name="top_name"  href="#">Companies Portal -- PES University Placement Portal</a>
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
							
						<li><a href="company_profile_view.php">Comapny Profile </a></li>
						
						<li><a href="changeLogo.php">Update Logo</a></li>
						<li class="active"><a href="change_password.php">Change Password<span class="sr-only">(current)</span></a></li>
						<li><a href="schedule.php">Schedule</a></li>
						<li><a href="notify_company.php">Notify to Admin</a></li>
						<li><a href="notification_from_admin_to_company.php">Notification from Admin</a></li>
			
					</ul>
					
			
						
				</div>
				<<div id ="logo"class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					</br>
					
				
					<h1 class="page-header">Change Password</h1>

					<div class="row placeholders">
						
					</div>

					<div class="table-responsive">

					

						<form name="htmlform" method="post" action="company_change.php">
		<table width="450px">
			
		
		
		<!--<tr>
			<td valign="top">
				<label for="company_username">Company Username *</label>
				 if session is enabled then username can be made to be readonly or else we can manually input it here 
			</td>
			<td valign="top">
				<input  type="text" name="company_username" maxlength="50" size="30" required>
				<br></br>
			</td>
		</tr>-->
		

		<tr>
			<td valign="top">
				<label for="cur_password">Current Password *</label>
			</td>
			<td valign="top">
				<input  type="password" name="cur_password" maxlength="50" size="30" required onblur="authenticate()" >
					<br></br>
			</td>
		</tr>


		<tr>
			<td valign="top">
				<label for="p1"> New Password *</label>
			</td>
			<td valign="top">
				<input  type="password" id="p1" name="p1" maxlength="50" size="30">
					<br></br>
			</td>
		</tr>


		<tr>
			<td valign="top">
				<label for="p2"> Confirm Password *</label>
			</td>
			<td valign="top">
				<input  type="password" id="p2" name="p2" maxlength="50" size="30" onblur="fun()">
					<br></br>
			</td>
		</tr>
		<br>
	



		
					
		</tr>
			<tr>
			<td valign="top">
				
			</td>
			<td valign="top">
				<input  type="submit">
				<br></br>
			</td>
		</tr>




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
