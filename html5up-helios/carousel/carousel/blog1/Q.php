<?php
            //connecting with the database
            require 'connect.php';
            $qid=$_GET['id'];
            $i=0;
            $arr=array(); 
            $result=mysql_query("SELECT * from forum.question where qid=$qid");
            if ($result) 
            {
              $row = mysql_fetch_array($result);
              $title=$row['title'];
              $tags=$row['tags'];
              $question=$row['question'];

              $user=$row['user'];   
            }
            $ans=0;
            $answer_query=mysql_query("SELECT * from forum.answer where qid=$qid");
            
            $i=0;
            
            $answer=[];
            
              
            while($row1 = mysql_fetch_assoc($answer_query))
            {
              $answer[$i]=$row1['answer'];
              $i+=1;
            }
               

            $q_query=mysql_query("SELECT upvotes from forum.question where qid=$qid");
            $q_upquery = mysql_fetch_assoc($q_query);                  
            $q_upvote_count = $q_upquery['upvotes'];

            $a_query=mysql_query("SELECT aid,upvotes from forum.answer where qid=$qid");
            $i=0; 
            
            $aid=[-1];
            $a_upvote_count=[0];

            if($a_query)
            {  
              while($ans_query = mysql_fetch_array($a_query))
              {  
                $aid[$i]=$ans_query['aid'];                   
                $a_upvote_count[$i] = $ans_query['upvotes'];
                $i+=1;
              }
            }                                                                                                               

            
            
        
             
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
        
        title=String (<?php echo json_encode($title); ?>);
        tags=String (<?php echo json_encode($tags); ?>);
        question=String (<?php echo json_encode($question); ?>);
        user=String (<?php echo json_encode($user); ?>);
        q_upvote_count=String (<?php echo json_encode($q_upvote_count); ?>);
        
        aid=(<?php echo json_encode($aid);?>);
        
        i=(<?php echo json_encode($i);?>);
        h2=document.createElement("p");
        h2.innerHTML="<pre>"+question+"</pre>";
        Q.appendChild(h2);

        give_answer=document.getElementById("container");
        give_answer=document.getElementById("give_answer");

        

        
        
        
        //Question Upvote BUTTON
        q_upvote=document.createElement('button');                                                //Upvote Button
        q_upvote.innerHTML='Upvote';
        q_upvote.addEventListener('click',q_Upvote);
        q_upvote.style.position='absolute';
        q_upvote.style.left=Q.offsetLeft-70+'px';
        q_upvote.style.top=Q.offsetTop+30+'px';
        document.body.appendChild(q_upvote);
        //----Question upvote BUTTON

        //Question Upvote Count
        q_up_count=document.getElementById('q_up_count');
        q_up_count.innerHTML=q_upvote_count;
        q_up_count.style.position='absolute';
        q_up_count.style.top=Q.offsetTop+60+'px';
        q_up_count.style.left=Q.offsetLeft-45  + 'px';
        //----Question Upvote Count

        A=document.getElementById('ANSWERS');
        A_new=document.createElement('div');
        A_new.innerHTML="DIV";
        //document.body.appendChild(A_new);
        //container.insertBefore(A_new,give_answer);


        answer=String(<?php echo json_encode($answer); ?>);
        answer=answer.split(',');
        if(answer[0]!="")
        { 
          a_upvote_count=String(<?php echo json_encode($a_upvote_count); ?>);
          a_upvote_count=a_upvote_count.split(',');
          
          if(a_upvote_count=="null")
            a_upvote_count=0;
          

          for(j=0;j<answer.length;j++)
          {  
              
              if(answer=="null")
                answer=" ";
              
              h2_answer=document.createElement("p");
              h2_answer.innerHTML="<pre>"+answer[j]+"</pre>";
              A.appendChild(h2_answer); 
              br=document.createElement("br");
              A.appendChild(br);

               
              //Answer Upvote BUTTON
              a_upvote=document.createElement('button');                                                //Upvote Button
              a_upvote.innerHTML='Upvote';
              a_upvote.id=aid[j];
              a_upvote.addEventListener('click',a_Upvote,false);
              a_upvote.style.position='absolute';
              a_upvote.style.left=h2_answer.offsetLeft-70+'px';
              a_upvote.style.top=h2_answer.offsetTop+'px';
              //----Answer Upvote Button
              
              //Append Buttons to the body
              document.body.appendChild(q_upvote);
              document.body.appendChild(a_upvote);
              //----Append Buttons to the body

              //Answer Upvote Count
              a_up_count=document.createElement('h4');
              a_up_count.id=""+aid[j]+aid[j];
              //a_up_count=document.getElementById('a_up_count');               //Create H4 elements----------------
              a_up_count.innerHTML=a_upvote_count[j];
              a_up_count.style.position='absolute';
              a_up_count.style.top=a_upvote.offsetTop+30+'px';
              a_up_count.style.left=a_upvote.offsetLeft+25+ 'px';
              document.body.appendChild(a_up_count);
              //----Answer Upvote Count


          }    
        }  
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

      function a_Upvote(event)
      {
        a_id=event.target.id;
        a_xmlhttp=new XMLHttpRequest();
        //q_xmlhttp.onreadystatechange=func;
        
        a_xmlhttp.open("GET","A_upvotes_sub.php?qid="+qid+"&aid="+a_id,true);
        //q_xmlhttp.open("GET","random_script.php",true);
        a_xmlhttp.onreadystatechange=a_processResults;
        a_xmlhttp.send();
        //window.location="A_upvotes_sub.php"+"?qid="+qid+"&aid="+a_id;
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
        if(a_xmlhttp.readyState==4 && a_xmlhttp.status==200 && a_xmlhttp.responseText!="")
          {
            up_count=a_xmlhttp.responseText.split(";");
            a_up_count=document.getElementById(up_count[1]+""+up_count[1]);
            a_up_count.innerHTML=up_count[0];
          }
      }

      function append_qid()
      {
        form=document.getElementById('form');
        form.action=form.action+"?qid="+qid;
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

    <div class="container" id="container">

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
      <div id="give_answer">
          <h3>Answer</h3>
      </div>
     <form id='form' action="a_submit.php" method="post" onsubmit="return append_qid()" >
        
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









