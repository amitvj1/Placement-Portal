<?php

            require 'connect.php';

            $author =$_GET['author'];
            $tag =$_GET['tag'];
            $tag = '%'.$tag.'%';
            $result=mysql_query("SELECT q.qid,q.question,a.answer,a.user,q.tags from question q,answer a where q.qid = a.qid and tags like '".$tag."' and a.user ='".$author."'");
            $i = 0;
            if ($result) 
            {
              while($row = mysql_fetch_assoc($result))
              { 

                //creating  arrays for individual elements        
                $qid_arr[$i] = $row['qid'];
                $question_arr[$i]=$row['question'];
                $answer_arr[$i]=$row['answer'];
                $user_arr[$i]=$row['user'];
                $tags_arr[$i]=$row['tags']; 
                $i+=1;
              }
            }

            if(!$author)
            {   
              die("do something");
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
   <style type="text/CSS">
  h3,h5
  {
    line-height: 8px;
  }
    
  h5
  {
    font-style: italic;
    color: red;
  }
</style>

        <script type='text/javascript'>
      function loadAuthorandTags()
      {
        //display all the answers with their author and tags
        i = 0;
        auth  = String (<?php echo json_encode($author); ?>);
        ques = document.getElementById('ques');
        author_results = document.getElementById('author');
        author_results.innerHTML = "More answers by "+auth;
        que_arr=String (<?php echo json_encode($question_arr); ?>);
        qid_arr=String (<?php echo json_encode($qid_arr); ?>);
        ans_arr=String (<?php echo json_encode($answer_arr); ?>);
        user_arr=String (<?php echo json_encode($user_arr); ?>);
        tags_arr=String (<?php echo json_encode($tags_arr); ?>);
        que_arr = que_arr.split(',');
        ans_arr = ans_arr.split(',');
        user_arr = user_arr.split(',');
        tags_arr = tags_arr.split(',');
        while(i<que_arr.length)
        {
          h2=document.createElement("h2");
          a=document.createElement("a");
          a.href="Q.php?id="+qid_arr[i];
          a.innerHTML=que_arr[i];
          h2.appendChild(a);
          h3=document.createElement("h3");
          h3.innerHTML = ans_arr[i];
          h5=document.createElement("h5");
          p = document.createElement("p");
          p.innerHTML = tags_arr[i];
          h5.appendChild(p);
          ques.appendChild(h2);
          ques.appendChild(h3);
          ques.appendChild(h5);
          i++;  
        }
    }
    </script>

  </head>

  <body onload="loadAuthorandTags()">

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="main_page_edit.php">Forum</a>
        </nav>
      </div>
    </div>
  
    <div class="container">

      <div class="blog-header">
        <h2 class="blog-title">Search Results</h2>
      </div>

   
      <div class="row">

        <div class="col-sm-8 blog-main">

          
    
<div class="blog-post">
            <h2 class="blog-post-title" id ="author">Questions</h2>
            <br><br>
            <div id='ques'>
            </div>
            <hr>
            <br><br><br><br><br>
          <nav>
          </nav>
            
          </div><!-- /.blog-post -->


        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
                    <nav>
            <ul class="pager">
              <li><a href="try1.html">Ask Question</a></li>
            </ul>
          </nav>
          <div class="sidebar-module sidebar-module-inset">
            </div>
          
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