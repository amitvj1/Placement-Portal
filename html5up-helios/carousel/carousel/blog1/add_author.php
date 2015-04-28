<?php
            //connecting with the database
            require 'connect.php';
            $author = $_GET['author'];
            $i=0;
            //echo $author;
            $j=0;
            $arr=array(); 
            $result =mysql_query("SELECT answer,user from answer where user ='".$author."'");       //add the respective questions too
            if ($result) 
            {

                while($row1 = mysql_fetch_assoc($result))
                {
                     
                    $answer_arr[$i]=$row1['answer'];
                    $author_arr[$i]=$row1['user']; 
                    $i= $i +1;                       
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
    <script type='text/javascript'>
        function loadAnswerforAuthor()
        {
        //alert("djhj");
        //author = <?php $author?>;

        answer_arr = String (<?php echo json_encode($answer_arr); ?>);
        author_arr = String (<?php echo json_encode($author_arr); ?>);
        author = String (<?php echo json_encode($author); ?>);
        an_arr=answer_arr.split(',');
        au_arr=author_arr.split(',');
        div = document.getElementById('ques');
        i=String (<?php echo json_encode($i); ?>);
        i = parseInt(i);
        j = 0;
        h2 = document.getElementById("title");
        h2.innerHTML = "More answers from  "+author ;
        div.appendChild(h2);  
        while(i>0)
            {

                
                //div = document.createElement("div");
                h4 = document.createElement("h4");
                p = document.createElement("p");
                h4.innerHTML = au_arr[j];
                p.innerHTML = an_arr[j];
               
                div.appendChild(h4);
                div.appendChild(p);

                i--;
                j++;
            
            }
        }
    </script>
</head>
  <body onload="loadAnswerforAuthor()">

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="main_page.php">Forum</a>
        </nav>
      </div>
    </div>
  
    <div class="container">

      <div class="blog-header">
        <h1 class="blog-title">Search Results</h1>
               

      </div>

   
      <div class="row">

        <div class="col-sm-8 blog-main">

          
    
<div class="blog-post" id ="ques">
            <h2 id = 'title' class="blog-post-title"></h2>
            
            
            
          
            
          </div><!-- /.blog-post -->
          <hr>


        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
                    <nav>
            <ul class="pager"><br><br>
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