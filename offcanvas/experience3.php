<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Experience Share</title>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="offcanvas.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
  <?php

$dir = "exp_files/";


// Open a directory, and read its contents
if (is_dir($dir)){
  if ($dh = opendir($dir)){
    $i=0;
    while (($file = readdir($dh)) !== false){
  //echo "filename:" . $file . "<br>";
      $file_arr[$i++]=$file;
    }
 
    
    $fl_array_google = preg_grep("/google\d+\.txt$/", $file_arr);
    $no_of_matches_google=sizeof($fl_array_google);   
    
 $fl_array_amazon = preg_grep("/amazon\d+\.txt$/", $file_arr);
    $no_of_matches_amazon=sizeof($fl_array_amazon);
    echo $no_of_matches_amazon;
 $fl_array_microsoft = preg_grep("/microsoft\d+\.txt$/", $file_arr);
    $no_of_matches_microsoft=sizeof($fl_array_microsoft);
 
 $fl_array_yahoo = preg_grep("/yahoo\d+\.txt$/", $file_arr);
    $no_of_matches_yahoo=sizeof($fl_array_yahoo);
 
 $fl_array_cisco = preg_grep("/cisco\d+\.txt$/", $file_arr);
    $no_of_matches_cisco=sizeof($fl_array_cisco);
 
 $fl_array_morgan = preg_grep("/morgan\d+\.txt$/", $file_arr);
    $no_of_matches_morgan=sizeof($fl_array_morgan);
 
 $fl_array_directi = preg_grep("/directi\d+\.txt$/", $file_arr);
    $no_of_matches_directi=sizeof($fl_array_directi);
 
 $fl_array_adobe = preg_grep("/adobe\d+\.txt$/", $file_arr);
    $no_of_matches_adobe=sizeof($fl_array_adobe);
 
 $fl_array_facebook = preg_grep("/facebook\d+\.txt$/", $file_arr);
    $no_of_matches_facebook=sizeof($fl_array_facebook);
 
 $fl_array_flipkart = preg_grep("/flipkart\d+\.txt$/", $file_arr);
    $no_of_matches_flipkart=sizeof($fl_array_flipkart);
     
  }
}
?>  
    <script type="text/javascript">
    
    function init()
    {
      parent=document.getElementById("toAppend");
      p1=document.getElementById("frame");
      p1.style.display = "none";
      h = document.getElementById("title");
    
  
    }
    /*function share()
    {
      text=document.createElement("textarea");
      //text.type="text";
      text.placeholder="share experience";

      but=document.getElementById("but");
      div=document.getElementById("details");
      div.insertBefore(text,but);
      but.value="GO";
      but.onclick=append;

    }*/
    /*function append()
    {
      amazon1+=text.value+"<br>";
      but.value="Share Experience";
      but.onclick=share;
      div.removeChild(text);
      amazon();
    }*/
    function amazon()
    {
      p1.style.display = "none";
      p1.style.display = "block";
      h.innerHTML = "Amazon";
      p1.src = "exp_files/amazon1.txt";
      n=parseInt(<?php echo json_encode($no_of_matches_amazon);?>);
      company="amazon";
      gen_link(n); 
    }
    function google()
    {
      p1.style.display = "none";
      p1.style.display = "block";
      h.innerHTML = "Google";
      p1.src = "exp_files/google1.html";
      company="google";
     n=parseInt(<?php echo json_encode($no_of_matches_google);?>);
     gen_link();
    }
    
    function gen_link(){
      
      for(i = 1;i <= n;i++)
      {
        var button = document.createElement("input");
        button.type = "button";
        button.value = "link"+i;
        button.slno=i;
        button.addEventListener("click", change_frame, true);
        
        //button.onclick = "exp_files/"+company+i+".txt";
        parent.appendChild(button);
      }
    }

    function change_frame(event){
    
      p1.src="exp_files/"+company +event.target.slno+".txt";



    }

    </script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body onload="init()">
    <nav class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">PES university-placement portal</a>
        </div>
        <!--<div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div>--><!-- /.nav-collapse -->
        <a href="addExp.html">
        <button type="submit" class="btn btn-success" style="position:absolute;top:10px;left:1150px;">Share Experince</button></a>
      </div><!-- /.container -->
    </nav><!-- /.navbar -->

    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div class="jumbotron">
            <h1>Experience Share</h1>
            <p>Read about the experience that others have felt during their interview</p>
          </div>
          <div id="toAppend">

            <h2 id='title'></h2>
            <iframe id='frame' style="width:700px; height:1000px" style="display:none;"></iframe>
            
          </div><!--/row-->
        </div><!--/.col-xs-12.col-sm-9-->

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
          <div class="list-group">
            <a href="#" class="list-group-item" onclick = "amazon()">Amazon</a>
            <a href="#" class="list-group-item" onclick = "google()">Google</a>
            <a href="#" class="list-group-item" onclick = "microsoft()">Microsoft</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
          </div>
        </div><!--/.sidebar-offcanvas-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; Company 2014</p>
      </footer>

    </div><!--/.container-->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

    <script src="offcanvas.js"></script>
  </body>
</html>
