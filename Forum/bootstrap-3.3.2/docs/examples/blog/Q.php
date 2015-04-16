<?php
            //connecting with the database
            require 'connect.php';
            $qid=$_GET['id'];
            $i=0;
            $arr=array(); 
            $result=mysql_query("SELECT * from forum.question where qid=$qid");
            if ($result) 
            {
              $row = mysql_fetch_assoc($result);
              $title=$row['title'];
              $tags=$row['tags'];
              $question=$row['question'];
              $user=$row['user']; 
            }
            $ans=0;
            $answer_query=mysql_query("SELECT * from forum.answer where qid=$qid");
            if ($answer_query) 
            {
              $ans=1;
              $row1 = mysql_fetch_assoc($answer_query);                   //TO DO : Multiple Answer to be rendered, Rendering only one.
              $answer=$row1['answer']; 
            }

            $q_query=mysql_query("SELECT upvotes from forum.question where qid=$qid");
            $q_upquery = mysql_fetch_assoc($q_query);                  
            $q_upvote_count = $q_upquery['upvotes'];

            $a_query=mysql_query("SELECT upvotes from forum.answer where qid=$qid");
            $a_upquery = mysql_fetch_assoc($a_query);                  
            $a_upvote_count = $a_upquery['upvotes'];

            if(!$result)
            {
              die();
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

    <title>Blog Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>

      

      qid=String (<?php echo json_encode($qid); ?>);
      function load()
      {
        Q=document.getElementById('QUESTION');
        A=document.getElementById('ANSWERS');

        title=String (<?php echo json_encode($title); ?>);
        tags=String (<?php echo json_encode($tags); ?>);
        question=String (<?php echo json_encode($question); ?>);
        user=String (<?php echo json_encode($user); ?>);
        q_upvote_count=String (<?php echo json_encode($q_upvote_count); ?>);
        a_upvote_count=String (<?php echo json_encode($a_upvote_count); ?>);


        h2=document.createElement("p");
        h2.innerHTML="<pre>"+question+"</pre>";
        Q.appendChild(h2);

        q_up_count=document.getElementById('q_up_count');
        
        q_up_count.innerHTML=q_upvote_count;
        q_up_count=document.getElementById('q_up_count');
        a_up_count.innerHTML=a_upvote_count;
        q_upvote=document.createElement('button');                                                //Upvote Button
        q_upvote.innerHTML='Upvote';
        q_upvote.addEventListener('click',q_Upvote);
        q_upvote.style.position='absolute';
        q_upvote.style.left=Q.offsetLeft-70+'px';
        q_upvote.style.top=Q.offsetTop+'px';

        a_upvote=document.createElement('button');                                                //Upvote Button
        a_upvote.innerHTML='Upvote';
        a_upvote.addEventListener('click',a_Upvote);
        a_upvote.style.position='absolute';
        a_upvote.style.left=A.offsetLeft-70+'px';
        a_upvote.style.top=A.offsetTop+'px';


        document.body.appendChild(q_upvote);
        document.body.appendChild(a_upvote);

        q_up_count.style.position='absolute';
        q_up_count.style.top=q_upvote.offsetTop+30+'px';
        q_up_count.style.left=q_upvote.offsetLeft+25+ 'px';

        a_up_count.style.position='absolute';
        a_up_count.style.top=a_upvote.offsetTop+30+'px';
        a_up_count.style.left=a_upvote.offsetLeft+25+ 'px';

        //up_count.style.font-size=10+'px';
        A=document.getElementById('ANSWERS');

        answer=String (<?php echo json_encode($answer); ?>);
        h2_answer=document.createElement("p");
        h2_answer.innerHTML="<pre>"+answer+"</pre>";
        A.appendChild(h2_answer );

        


      }
      function q_Upvote()
      {
        q_xmlhttp=new XMLHttpRequest();
        //q_xmlhttp.onreadystatechange=func;
        q_xmlhttp.open("GET","Q_upvotes_sub.php?id="+qid,true);
        //q_xmlhttp.open("GET","random_script.php",true);
        q_xmlhttp.onreadystatechange=q_processResults;
        q_xmlhttp.send();
        //window.location="Q_upvotes_sub.php"+"?id="+qid;
      }

      function a_Upvote()
      {
        a_xmlhttp=new XMLHttpRequest();
        //q_xmlhttp.onreadystatechange=func;
        a_xmlhttp.open("GET","A_upvotes_sub.php?id="+qid,true);
        //q_xmlhttp.open("GET","random_script.php",true);
        a_xmlhttp.onreadystatechange=a_processResults;
        a_xmlhttp.send();
        //window.location="Q_upvotes_sub.php"+"?id="+qid;
      }


      function q_processResults()
      {
        if(q_xmlhttp.readyState==4 && q_xmlhttp.status==200)
          {
            q_up_count.innerHTML=q_xmlhttp.responseText;
          }
      }

      function a_processResults()
      {
        if(a_xmlhttp.readyState==4 && a_xmlhttp.status==200)
          {
            a_up_count.innerHTML=a_xmlhttp.responseText;
          }
      }

      function append_qid()
      {
        form=document.getElementById('form');
        form.action=form.action+"?id="+qid;
        return true;
      }

    </script>


  </head>

  <body onload="load()">

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="#">Forum</a>
        </nav>
      </div>
    </div>

    <h4 id='q_up_count'></h4>
    <h4 id='a_up_count'></h4>

    <div class="container">

      <div class="blog-header">
        <h1 class="blog-title">FORUM</h1>
        <p class="lead blog-description">A place where you can post questions and expect answer from experts.</p>
      </div><br><br>

      <div id="QUESTION">
        <p>QUESTION:</p>
      </div>


      <div id="ANSWERS">
        <p>ANSWERS:</p>
      </div>
	   <form id='form' action="a_submit.php" method="post" onsubmit="return append_qid()" >
        <div>
          <h3>Answer</h3>
        </div>
        <label>
          <textarea name="answer" cols="60" rows="5" placeholder="Enter Answer"></textarea>
        </label>
        <br> 
        <input id="sending_qid" type="hidden" ></input>
        <input type="submit" value="ANSWER">

    </form>

	     

      <div class="row">

        <div class="col-sm-8 blog-main">

          <div class="blog-post">
            <hr>
          </div><!-- /.blog-post -->

          <nav>
            <ul class="pager">
              <li><a href="#">More</a></li>
            </ul>
          </nav>

        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>This is a discussion forum for students to post their doubts regarding placement process. Other students, seniors or alumni, can post the answers to the questions. </p>
          </div>
          
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->


    </div><!-- /.container -->

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
