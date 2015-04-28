<?php
include('connection.php');
session_start();
echo "hiii";
$name="ggg";
if($_SESSION['username'])
{
$name=$_SESSION['username'];
$usn=$_SESSION['usn'];
$ins=mysql_query("SELECT stu_personal.USN ,name,email_id,photo,mobile,cgpa,10th_perc,12th_diploma,password FROM stu_personal,stu_education WHERE stu_personal.USN='$usn' and name='$name' and stu_personal.USN=stu_education.USN");
if ($ins) 
            {
            	echo "jjj";
                
              if($row = mysql_fetch_assoc($ins))
              {
                $image=$row['photo'];

                $usn=$row['USN'];
                //$name=$row['name'];
                $email_id=$row['email_id'];
                $mobile=$row['mobile'];
                $password=$row['password'];
                $cgpa=$row['cgpa'];
                $tenth_percent=$row['10th_perc'];
                $twelth_diploma=$row['12th_diploma'];
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

		<title>change_student</title>

		<!-- Bootstrap core CSS -->
		<link href="docs/bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="docs/dashboard.css" rel="stylesheet">

		<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
		<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
		<script src="../../assets/js/ie-emulation-modes-warning.js"></script>
		<script>
		function init()
		{	
			//alert("jjkk");
			a_name=document.getElementById("a_name");
			img=document.getElementById("img");
			p=document.getElementById("p");

			//name1=document.getElementById("name");
			//mobile1=document.getElementById("telephone");
			//cgpa1=document.getElementById("cgpa");
			//usn1=document.getElementById("usn");
			//mail1=document.getElementById("email");
			//marks10=document.getElementById("marks10");
			//marks12=document.getElementById("marks12");
			img.alt="no image available";
			a_name.innerHTML="";
			//name1.value="";
			//mobile1.value="";
			//mail1.value="";
			//cgpa1.value="";
			//usn1.value="";
			//marks10.value="";
			//marks12.value="";
			//name=String(<?php echo json_encode($name); ?>);


			path=String(<?php echo json_encode($path); ?>);
			password=String(<?php echo json_encode($password); ?>);
			img.src="data:image/jpeg;base64,"+path;

			//mobile=String(<?php echo json_encode($mobile); ?>);
			//email_id=String(<?php echo json_encode($email_id); ?>);
			//tenth_percent=String(<?php echo json_encode($tenth_percent); ?>);
			//twelth_diploma=String(<?php echo json_encode($twelth_diploma); ?>);
			//cgpa=String(<?php echo json_encode($cgpa); ?>);
			//usn=String(<?php echo json_encode($usn); ?>);
			p.value=password;
			a_name.innerHTML="Welcome "   +name;
			/*name1.value=name;
			mobile1.value=mobile;
			mail1.value=email_id;
			cgpa1.value=cgpa;
			usn1.value=usn;
			marks10.value=tenth_percent;
			marks12.value=twelth_diploma;*/

		}
		
		
		</script>
		<script >
	/*	function updateLOGO() { 
				alert("df");
				var div = document.getElementById("div_logo"); 
				div.style.display=block;
			}
*/
	 
	function fun()
	{
		p1=document.getElementById("p1");
		p2=document.getElementById("p2");
		if((p1.value=="")||(p1.value!=p2.value)){
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
					<a class="navbar-brand" name="a_name" id="a_name" href="#">Student Profile  PES University Placement Portal</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="student_afterlogin.php">Home</a></li>
						<li><a href="notification.php">Notifications</a></li>
						<li><a href="log_out.php">Log Out</a></li>
					
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
						<li><div style="position:relative;left=150px;"><img id="img" name="img" height="300" width="300" alt="student image" /></div></li>
						<li ><a href="student_afterlogin.php">Student Profile <span class="sr-only">(current)</span></a></li>
						<li><a href="update_student.php">Update information</a></li>
						<li><a href="resume.php">Resume</a></li>
						<li><a href="notification.php">Notifications</a></li>
						<li class="active"><a href="#">change Password</a></li>
						<li ><a href="../../../offcanvas/experience3.php">Experience Sharer</a></li>
						<li ><a href="company_history.php">View Company History</a></li>
			
			
			</ul>
					.
				</div>
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<h1 class="page-header" style="background-color:grey;text-align:center"> Change Password</h1>

					<div class="row placeholders">
						
					</div>

					
					<div class="table-responsive">
						<form name="htmlform" method="post" action="student_change.php" >
		<table width="450px">
			<tr>
			<td valign="top">
				<label for="p"> Current Password</label><br/><br/>
			</td>
			<td valign="top">
				<input  type="password" name="p" id="p" maxlength="50" size="30" readonly>
			</td>
			</tr>
 
			<tr>
			<td valign="top">
				<label for="p1">New Password</label><br/><br/>
			</td>
			<td valign="top">
				<input  type="password" name="p1" id="p1" maxlength="50" size="30"><br/><br/>
			</td>
			</tr>
			
			<tr>
			<td valign="top">
				<label for="p2">Confirm Password</label><br/><br/>
			</td>
			<td valign="top">
				<input  type="password" name="p2" id="p2" maxlength="80" size="30" onblur="fun()">
			</td>
 			</tr>

<tr>
			.
			<td valign="top">
		
			</td>
			<td valign="top">
				<input  type="submit" Value="Change" name="email" maxlength="80" size="30">
			</td>
 			</tr>


							 
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
