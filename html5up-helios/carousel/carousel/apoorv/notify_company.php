<?php
include('connection.php');
session_start();
if($_SESSION['id'])
{
$id=$_SESSION['id'];
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
		<link rel="icon" href="pes.ico">

		<title>Notify-Company-PESU</title>

		<!-- Bootstrap core CSS -->
		<link href="docs/bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="docs/dashboard.css" rel="stylesheet">

		<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
		<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
		<script src="../../assets/js/ie-emulation-modes-warning.js"></script>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<script>
		function init()
		{	//alert("jjkk");
			top_name=document.getElementById("top_name");
			top_name.innerHTML="";
			name=String(<?php echo json_encode($name); ?>);
			top_name.innerHTML="Welcome "   +name;
	 	
		}
		</script>

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
						<li><a href="company_profile_view.html">Home</a></li>
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
						<li ><a href="company_profile_view.php">Comapny Profile </a></li>
						<li><a href="changeLogo.php">Update Logo</a></li>
						<li><a href="change_password.php">Change Password</a></li>
						<li ><a href="schedule.php">Schedule</a></li>
						<li class="active"><a href="notify_company.php">Notify to Admin<span class="sr-only">(current)</span></a></li>
						<li><a href="notification_from_admin_to_company.php">Notification from Admin</a></li>
			
					</ul>
					

		</div>
			
			</ul>
					
				</div>
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<h1 class="page-header">Send Notification to Admin</h1>

					<div class="row placeholders">
						
					</div>

							<div class="table-responsive">
						<form name="htmlform" method="post" action="comp_notifyadmin.php" enctype="multipart/form-data">
		<table >
					<tr>

						<input type="text" placeholder="Company Name" size="80px" id="compname" name="compname"/><br/><br/>


					</tr>
					<tr>
						<input type="text" placeholder="Subject" size="80px" id="title" name="title"/><br/><br/>
						
					</tr>
					<tr>
						<textarea placeholder="Content goes here .." id="content" name="content" rows="7" cols="82"/></textarea></br><br/>
						
					</tr>
					<tr>
						<div style="border:1px solid grey;width:600px; height:60px;color:grey; padding:5px;">
						Attachments (if any):<input type="file"   id="attach" name="attach"/><br/><br/>
						</div></br></br>
					</tr>
					<tr>
						<input type="submit" value=" Notify (Send to Admin)" name="upload"/><br/><br/>
						
					</tr>
		</table>	
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
