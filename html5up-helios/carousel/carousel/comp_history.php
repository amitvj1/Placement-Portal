<!DOCTYPE html>
<html lang="en">
  <head>
     <?php include ('addtosamepage.php'); ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Previous Years Placement Statistics</title></title>

    <!-- Bootstrap core CSS -->
    <link href="docs/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="docs/dashboard.css" rel="stylesheet">

   
<script type="text/javascript">


function init()
{
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
          <a class="navbar-brand" href="#">Companies Portal -- PES University Placement Portal</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Home</a></li>
            <li><a href="#">Students</a></li>
            <li><a href="#">Recruiters</a></li>
            <li><a href="#">Contact Us</a></li>
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
            <li class="active"><a href="#company_profile">Comapny Profile <span class="sr-only">(current)</span></a></li>
            <li><a href="Companies_after_login_page.html#div_logo">Update Logo</a></li>
            <li><a href="Companies_after_login_page.html##job_profile">Job Offered</a></li>
      <li><a href="#">List of Eligible Students</a></li>
      <li><a href="Round wise-Selection.html">Round-Wise Selection</a></li>
      </ul>
          <ul class="nav nav-sidebar">
      <li><pre>   Links</pre></li>
            <li><a href="">Student Portal</a></li>
            <li><a href="">Admin Settings</a></li>            
            
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Placement History</h1>

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
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
