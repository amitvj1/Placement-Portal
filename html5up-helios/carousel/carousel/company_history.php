<?php
include('connection.php');
session_start();
//echo "hiii";
 $sql = mysql_query("SELECT * FROM com_history NATURAL JOIN com_basic ORDER BY year desc");

$i=0;
//$retval = mysql_query( $sql, $con );
if(!$sql )
{
  die('Could not get data: ' . mysql_error());
}
while($row = mysql_fetch_assoc($sql))
{
    $year[$i]=$row['year'];
    $number[$i]=$row['no_of_posts'];
    $role[$i]=$row['role'];
    $package_val[$i]=$row['package'];
    $branch[$i]=$row['branch'];
    $name[$i]=$row['name'];
    //echo $name[$i];
 // echo $year[$i] . $number[$i] . $role[$i] . $package_val[$i] . $branch[$i] . $name[$i] . "\n";
    $i++;
}
//$name="ggg";
if($_SESSION['username'])
{
$name1=$_SESSION['username'];
$usn=$_SESSION['usn'];
$ins=mysql_query("SELECT stu_personal.USN ,name,email_id,photo,mobile,cgpa,10th_perc,12th_diploma FROM stu_personal,stu_education WHERE stu_personal.USN='$usn' and name='$name1' and stu_personal.USN=stu_education.USN");
if ($ins) 
            {
            	//echo "jjj";
                
              if($row = mysql_fetch_assoc($ins))
              {
                $image=$row['photo'];

               // $usn=$row['USN'];
                //$name=$row['name'];
               // $email_id=$row['email_id'];
               // $mobile=$row['mobile'];
               // $cgpa=$row['cgpa'];
               // $tenth_percent=$row['10th_perc'];
               // $twelth_diploma=$row['12th_diploma'];
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
	
		<title>company_history</title>

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
			
			a_name=document.getElementById("a_name");
			img=document.getElementById("img");
	
			img.alt="no image available";
			a_name.innerHTML="";
			

			name1=String(<?php echo json_encode($name1); ?>);
			path=String(<?php echo json_encode($path); ?>);
			img.src="data:image/jpeg;base64,"+path;


			a_name.innerHTML="Welcome "   +name1;
		
			 i=0;
    j=0;
    year=String(<?php echo json_encode($year);?>);
    
    number=String(<?php echo json_encode($number);?>);
    role=String(<?php echo json_encode($role);?>);
    package_val = String(<?php echo json_encode($package_val);?>);
    branch=String(<?php echo json_encode($branch);?>);
    name=String(<?php echo json_encode($name);?>);

     yeararray=year.split(",");
     numberarray=number.split(",");
     rolearray = role.split(",");
     package_valarray = package_val.split(",");
     brancharray = branch.split(",");
     namearray = name.split(",");
     
     currentyear=yeararray[0];
  container=document.getElementById("data_container");

  for(j=0;j<yeararray.length;j++){
    if(j==0){
     
  per_year(currentyear);
  table.appendChild(tbody);
  tablediv.appendChild(table);
  container.appendChild(heading);
  container.appendChild(tablediv);}


  else if(yeararray[j]!=currentyear){
      currentyear=yeararray[j];
  per_year(currentyear);
  table.appendChild(tbody);
  tablediv.appendChild(table);
  container.appendChild(heading);
  container.appendChild(tablediv);}
  }
}
  function per_year(currentyear){
  heading=document.createElement("h2");
 heading.className= "sub-header";
 heading.innerHTML= "For the year: "+ currentyear;
tablediv=document.createElement("div");
tablediv.className= "table-responsive";
table=document.createElement("table");
table.className ="table table-striped";
thead=document.createElement("thead");
table.appendChild(thead);
headrow=document.createElement("tr");
cell2=document.createElement("th");
cell2.innerHTML="Company";
cell3=document.createElement("th");
cell3.innerHTML="No. Of postings";
cell4=document.createElement("th");
cell4.innerHTML="Job Role";
cell5=document.createElement("th");
cell5.innerHTML="Package Provided";
cell6=document.createElement("th");
cell6.innerHTML="Branch";
  headrow.appendChild(cell2);
  headrow.appendChild(cell3);
  headrow.appendChild(cell4);
  headrow.appendChild(cell5);
  headrow.appendChild(cell6);
 
  thead.appendChild(headrow);
  table.appendChild(thead);
  tbody=document.createElement("tbody");
  while(yeararray[i]==currentyear){
    populate(yeararray[i],numberarray[i],rolearray[i],package_valarray[i],brancharray[i],namearray[i]);
    i++;
  }

		}
		function populate(year_par, number_par, role_par, package_par, branch_par, name_par){


bodyrow=document.createElement("tr");
bodycell2=document.createElement("th");
bodycell2.innerHTML=name_par;
bodycell3=document.createElement("th");
bodycell3.innerHTML=number_par;
bodycell4=document.createElement("th");
bodycell4.innerHTML=role_par;
bodycell5=document.createElement("th");
bodycell5.innerHTML=package_par;
bodycell6=document.createElement("th");
bodycell6.innerHTML=branch_par;
bodyrow.appendChild(bodycell2);
bodyrow.appendChild(bodycell3);
bodyrow.appendChild(bodycell4);
bodyrow.appendChild(bodycell5);
bodyrow.appendChild(bodycell6);
tbody.appendChild(bodyrow);

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
						<li ><a href="resume.php">Resume</a></li>
						<li><a href="notification.php">Notifications</a></li>
						<li ><a href="change.php">change Password</a></li>
						<li ><a href="../../../offcanvas/experience3.php">Experience Sharer</a></li>
						<li class="active"><a href="comapny_history.php">View Company History</a></li>
			
			
			</ul>
					.
				</div>
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<h1 class="page-header" style="background-color:grey;">COMPANY HISTORY</h1>

					<div class="row placeholders">
						
					</div>
					 <div id="data_container"> 

					
		
							 
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
