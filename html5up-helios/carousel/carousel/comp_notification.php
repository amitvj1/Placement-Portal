<?php
include('connection.php');
session_start();
if(isset($_SESSION['username']));
{
$name=$_SESSION['username'];

//$ins=mysql_query("SELECT com_basic.username,id,notification.cid FROM com_basic,notification WHERE com_basic.username='$name'and notification.cid='$cid' and com_basic.id=notification.cid");

/*if($_SESSION['username'])
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
                $path=base64_encode(
}

*/
//include('connection.php');

//$name=$_SESSION['name'];
$i=0;
$ins= mysql_query("SELECT nid,title,content,file_name FROM notification WHERE type='C' order by nid desc");

	if ($ins) 
            {
                echo "sgvh";
              while($row = mysql_fetch_assoc($ins))
              {
               $title_arr[$i]=$row['title']; 
               $content_arr[$i]=$row['content']; 
               $name_arr[$i]=$row['file_name'];
               $nid_arr[$i]=$row['nid'];
               $i+=1;
               
            }
        }

        else
        {
          	echo mysql_error();
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

		<title>Admin--PES University Placement Portal</title>

		<!-- Bootstrap core CSS -->
		<link href="docs/bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="docs/dashboard.css" rel="stylesheet">
		
		<style>
		td{
			padding-right:4px;
			padding-bottom:30px;
		}
		</style>

		<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
		<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->


		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	<script src="../../assets/js/ie-emulation-modes-warning.js"></script>
	<script>
	function init()
	{
			title_arr=String(<?php echo json_encode($title_arr); ?>);
			content_arr=String(<?php echo json_encode($content_arr); ?>);
			name_arr=String(<?php echo json_encode($name_arr); ?>);
			nid_arr=String(<?php echo json_encode($nid_arr); ?>);
			title_arr=title_arr.split(",");
			content_arr=content_arr.split(",");
			name_arr=name_arr.split(",");
			nid_arr=nid_arr.split(",");

			i=0;
			table=document.getElementById("table");
			while(i<title_arr.length)
			{
				tr1=document.createElement("tr");
				tr2=document.createElement("tr");
				tr3=document.createElement("tr");
				tr4=document.createElement("tr");

				td11=document.createElement("td");
				td12=document.createElement("td");
				//td21=document.createElement("td");
				//td22=document.createElement("td");
				//td23=document.createElement("td");

				td11.innerHTML="<b>"+title_arr[i]+"</b>";
				td11.style.fontSize="30px";
				td11.style.textDecoration="underline";
				tr2.style.borderBottom="1px dashed grey";
				tr3.style.borderBottom="1px dashed grey";
				tr4.style.borderBottom="2px solid grey";
				td11.id="11"+i;
				td12.id="12"+i;
				tr2.id="21"+i;
				tr3.id="31"+i;
				tr4.id="41"+i;
				//td22.id="22"+i;
				tr3.innerHTML="attachments(click to download):<br/> <a href='admin_attach.php?fileid="+nid_arr[i]+"''>"+name_arr[i]+"</a> ";
				td12.innerHTML=" ==> ";
				td12.style.fontSize="24px";
				td12.addEventListener("click",display,false);
				tr4.innerHTML=" <==";
				tr4.addEventListener("click",hide,false);

				tr2.style.fontSize="24px";
				//td12.onclick=display;
				tr2.innerHTML=content_arr[i];
				//td22.innerHTML=" <a onclick='hide()'> << </a> ";
				//td22.onclick=hide;
				
				td12.style.color="blue";
				tr4.style.color="blue";
				tr1.appendChild(td11);
				tr1.appendChild(td12);
				td12.addEventListener("mouseover",underline,false);
				tr4.addEventListener("mouseover",underline,false);
				td12.addEventListener("mouseout",under,false);
				tr4.addEventListener("mouseout",under,false);
				//td1.onmouseover=underline;	
				//tr2.appendChild(td21);
				//tr2.appendChild(td23);
				//tr2.appendChild(td22);

				tr2.style.display="none";
				tr3.style.display="none";
				tr4.style.display="none";

				table.appendChild(tr1);
				table.appendChild(tr2);
				table.appendChild(tr3);
				table.appendChild(tr4);

				i++;

			}
		}
		function underline(event)
		{
			event.target.style.textDecoration="underline";
		}
		function under(event)
		{
			event.target.style.textDecoration="none";
		}
		function display(event)
		{	
			//alert("display");
			//alert(event.target);
			//alert(event.target.id);
			i=parseInt(event.target.id);
			i=i%10;
			//alert(i);
			str1="21"+i;
			str2="31"+i;
			str3="41"+i;
			//str2="22"+i;

			tr2=document.getElementById(str1);
			tr3=document.getElementById(str2);
			tr4=document.getElementById(str3);
			//alert(td1.id);
			//td2=document.getElementById(str2);
			//alert(td2.id);
			tr2.style.display="block";
			tr3.style.display="block";
			tr4.style.display="block";
			//td2.style.display="block";
			//event.preventDefault();

		}

		function hide(event)
		{	//alert("hide");
			i=parseInt(event.target.id);
			i=i%10;
			//alert(i);
			str1="21"+i;
			str2="31"+i;
			str3="41"+i;
			//str2="22"+i;

			tr2=document.getElementById(str1);
			tr3=document.getElementById(str2);
			tr4=document.getElementById(str3);
			//alert(td1.id);
			//td2=document.getElementById(str2);
			//alert(td2.id);
			tr2.style.display="none";
			tr3.style.display="none";
			tr4.style.display="none";
			//td2.style.display="block";
			//event.preventDefault();
			
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
					<a class="navbar-brand" href="#">ADMIN-PES UNIVERSITY</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="admin.html">Home</a></li>
						
						<li><a href="#">Log Out</a></li>
					
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
					
						<li ><a href="admin.html">Students  <span class="sr-only">(current)</span></a></li>
						<li class="active"><a href="admin_company.html">Companies</a></li>
						<li><a href="admin_change.html">Change Password</a></li>
						
						
			
			
			</ul>
					.
				</div>
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<h1 class="page-header" style="background-color:grey;">NOTIFY HERE</h1>

					<div class="row placeholders">
						
					</div>

							<div class="table-responsive">
						<form name="htmlform" method="post" action="html_form_send.php" enctype="multipart/form-data">
						<table id="table" name="table">
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

