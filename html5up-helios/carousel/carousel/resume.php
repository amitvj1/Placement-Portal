<?php
include('connection.php');
session_start();
echo "hiii";
$name="ggg";
if($_SESSION['username'])
{
$name=$_SESSION['username'];
$usn=$_SESSION['usn'];
$ins=mysql_query("SELECT stu_personal.USN ,name,email_id,photo,mobile,cgpa,10th_perc,12th_diploma FROM stu_personal,stu_education WHERE stu_personal.USN='$usn' and name='$name' and stu_personal.USN=stu_education.USN");
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

		<title>resume_student</title>

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
			img.src="data:image/jpeg;base64,"+path;

			//mobile=String(<?php echo json_encode($mobile); ?>);
			//email_id=String(<?php echo json_encode($email_id); ?>);
			//tenth_percent=String(<?php echo json_encode($tenth_percent); ?>);
			//twelth_diploma=String(<?php echo json_encode($twelth_diploma); ?>);
			//cgpa=String(<?php echo json_encode($cgpa); ?>);
			//usn=String(<?php echo json_encode($usn); ?>);

			a_name.innerHTML="Welcome "   +name;
			/*name1.value=name;
			mobile1.value=mobile;
			mail1.value=email_id;
			cgpa1.value=cgpa;
			usn1.value=usn;
			marks10.value=tenth_percent;
			marks12.value=twelth_diploma;*/

		}
		function verify(event)
		{
			str=confirm("ready to upload?");
				if(str)
				return true;
			else 
				return false;
		}
		function viewresume(event)
		{

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
					<a class="navbar-brand" id="a_name" id="a_name" href="#">Student Profile  PES University Placement Portal</a>
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
						<li><div style="position:relative;left=150px;"><img name="img" id="img" height="300" width="210" alt="student image" /></div></li>
						<li ><a href="student_afterlogin.php">Student Profile <span class="sr-only">(current)</span></a></li>
						<li><a href="update_student.php">Update information</a></li>
						<li class="active"><a href="resume.php">Resume</a></li>
						<li><a href="notification.php">Notifications</a></li>
						<li ><a href="change.php">change Password</a></li>
						<li ><a href="../../../offcanvas/experience3.php">Experience Sharer</a></li>
						<li ><a href="company_history.php">View Company History</a></li>
			
			
			</ul>
					.
				</div>
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<h1 class="page-header" style="background-color:grey;"> Resume</h1>

					<div class="row placeholders">
						
					</div>

					
					<div class="table-responsive">
						<form name="htmlform" method="POST" action="fill_resume.php" onsubmit="return verify()" enctype="multipart/form-data">
		<table width="450px">
			<tr>
			<td valign="top">
				<label for="company_name"> Upload File</label><br/><br/>
			</td>
			<td valign="top">
				<input  type="file" name="attach" id="attach"/>
			</td>
			</tr>
 
			

<tr>
			
			<td valign="top">
		
			</td>
			<td valign="top">
				<input  type="submit" Value="Upload" name="upload" maxlength="80" size="30">
			</td>
 			</tr>
 		</table>
 		<hr>
 		<hr>
 		<hr>
 		

</form>
<table>
 			<tr>
 					<b>Do You Want To View Your Previously Uploaded resume?</b><br/><br/><br/>
 			</tr>
 			<tr>
 					<a href="download.php" style="border:1px solid black; font-size:20px;">Click Here</a>
 			</tr>
 	</table>
							 
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
