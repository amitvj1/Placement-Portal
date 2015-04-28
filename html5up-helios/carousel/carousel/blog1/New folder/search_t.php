<?php

            //connecting with the database
      
            require 'connect.php';
      //create a variable to store the tag name,

      $tag =$_GET['tag'];
            $i=0;
            $tag = '%'.$tag.'%';
            
            //$try = "SELECT * from question where tags like ".$tag;
            //echo $try;          
            $result=mysql_query("SELECT * from question where tags like '".$tag."'");
            if ($result) 
            {
              while($row = mysql_fetch_array($result))
              {
                $title_arr[$i]=$row['title'];
                $tags_arr[$i]=$row['tags'];
                $qid_arr[$i]=$row['qid']; 
                $i+=1;
              }
            }



                               
            if(!$result)
            {
              die(mysql_error());
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

    <title>Forum</title>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
      function loadQuestions()
      {
        ques=document.getElementById('ques');
        title_arr=String (<?php echo json_encode($title_arr); ?>);
        tags_arr=String (<?php echo json_encode($tags_arr); ?>);
        qid_arr=String (<?php echo json_encode($qid_arr); ?>);
        title_arr=title_arr.split(',');
        tags_arr=tags_arr.split(',');
        qid_arr=qid_arr.split(',');
        i=0;
        while(i<title_arr.length)
        {
          h2=document.createElement("h2");
          a=document.createElement("a");
          a.href="Q.php?id="+qid_arr[i];
          a.innerHTML=title_arr[i];
          h2.appendChild(a);
          ques.appendChild(h2);
          i++;  
        }
      }
    </script>

  </head>

  <body onload="loadQuestions()">

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="main_page_edit.php">Forum</a>
        </nav>
      </div>
    </div>
  
    <div class="container">

      <div class="blog-header">
        <h1 class="blog-title">FORUM</h1>
        <p class="lead blog-description">A place where you can post questions and expect answer from experts.</p>

      </div>

   
      <div class="row">

        <div class="col-sm-8 blog-main">

          
    
<div class="blog-post">
            <h2 class="blog-post-title" >Questions</h2>
            <div id = "ques"></div>
            <hr>
          <nav>
            <ul class="pager">
            </ul>
          </nav>
            
          </div><!-- /.blog-post -->


        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
                    <nav>
            <ul class="pager">
              <li><a href="try1.html">Ask Question</a></li>
            </ul>
          </nav>
          
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->


    </div><!-- /.container -->
<div id="question">

</div>
    <footer class="blog-footer">
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>


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