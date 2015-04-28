<?php
          //the page where the user can ask questions.


          session_start();
          if(isset($_SESSION['username']))
          {

          }
          else
          {
            session_destroy();
            echo "<script type='text/javascript'>window.location.href= 'forum_login.html';</script>";
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

    


  </head>

  <body >

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="main_page.php">Forum</a>
          <a style="left:680px;" class="blog-nav-item active" href="logout.php">Log Out</a>
        </nav>
      </div>
    </div>
  
    <div class="container">

      <div class="blog-header">
        <h1 class="blog-title">Add a Question</h1>
        
      </div>

   
      <div class="row">

        <div class="col-sm-8 blog-main">

          
    <form action="q_submit.php" method="post" >
            <div>
              Title
            </div>
            <label>
              <input name="title" size="50" type="text" placeholder="Title">
            </label>
            <br><br> 
            <div>
              Question
            </div>
            <textarea name="question" cols="60" rows="5" placeholder="Enter a Question" ></textarea>
            <br><br>
            <div>
              Tags
            </div>
            <label>
              <input name="tags" size="50" type="text" placeholder="Tags">
            </label>
            <br><br>
            <input type="submit" value="ADD">

    </form>


<div class="blog-post">
            
            <hr>
          </div><!-- /.blog-post -->

          <nav>
            <ul class="pager">
              
            </ul>
          </nav>
        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          
          
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
