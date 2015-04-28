<?php
          /*this is the main page of forum, kind of lika a homepage after someone logs in.
          10 questions are displayed at first, and the user has the option to view more.
          everything -- search options and the option to ask questions"
          */


          //check if logged in or not

          session_start();
          if(isset($_SESSION['username']))
          {

          }
          else
          {
            session_destroy();
            echo "<script type='text/javascript'>window.location.href= 'http://localhost/bootstrap-3.3.2/docs/examples/html5up-helios/carousel/carousel/forum_login.html';</script>";
          } 
            //connecting with the database
            require 'connect.php';
            $i=0;
            $arr=array(); 
            $result=mysql_query("SELECT title,tags,qid from forum.question order by qid desc");
            if ($result) 
            {
              while($row = mysql_fetch_assoc($result))
              {
                $title_arr[$i]=$row['title'];
                $tags_arr[$i]=$row['tags'];
                $qid_arr[$i]=$row['qid']; 
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
    line-height: 5px;
  }
    
  #sTag
  {
    outline-style: inherit;
  }
  h5
  {
    font-style: italic;
    color: red;
  }
</style>
    <script>
//displaying all questions, 10 at a time, or less

      function loadQuestions()
      {
        ques=document.getElementById('ques');

        title_arr=String (<?php echo json_encode($title_arr); ?>);
        tags_arr=String (<?php echo json_encode($tags_arr); ?>);
        qid_arr=String (<?php echo json_encode($qid_arr); ?>);
        title_arr=title_arr.split(',');
        tags_arr=tags_arr.split(',');
        qid_arr=qid_arr.split(',');
        
        count1 =0;
        count = 0;
        count2 = title_arr.length;
        moreQ();
     }

//fetching next 10 questions
       function moreQ()
      {
        i=0;
        while(i<10 && count1<count2)
        {
          h2=document.createElement("h2");
          a=document.createElement("a");
          a.href="Q.php?id="+qid_arr[i];
          a.innerHTML=title_arr[i + count];
          h2.appendChild(a);
          h5=document.createElement("h5");
          p = document.createElement("p");
          p.innerHTML = tags_arr[i];
          h5.appendChild(p);
          ques.appendChild(h2);
          ques.appendChild(h5);
          i++;  
          count1++;
        } 
        count = count + 10;
      }

  //positioning search box
      function placeTag()
    {
        tag = document.getElementById('sTag');
        tag.style.position = 'absolute';
        tag.style.left = window.innerWidth-400+'px';
        tag.style.top = window.innerHeight-550+'px'; 
    }
    //do it for all three
    function search()
    {
      select = document.getElementById("searchBox");
      val = select.value;
      searchT = document.getElementById("searchT");
      searchA = document.getElementById("searchA");
      tag = searchT.value;
      author = searchA.value;
      searchA.style.display = 'none';
      searchT.style.display = 'none';
      if(val == 0)
      {
        alert("Please select a search type");
      }
      else if(val ==1 && tag != '')
      {
        //php call to search by tag page- search_t.php
        window.location= "search_t.php?tag="+tag;
      }
      else if(val ==2 && author != '')
      {
        //php call to search by author page- add_author.php
        window.location= "add_author.php?author="+author;
      }
      else if(val ==3 && tag != '' && author != '')
      {
        //php call to search by both page- search_both.php
        window.location= "search_both.php?tag="+tag+"&author="+author;
      }
      else
      {
        alert("Fill in all the fields");
        window.location= "main_page.php";
      }

    }
    //displaying the search boxes
    function display()
    {
      select = document.getElementById("searchBox");
      val = select.value;
      searchT = document.getElementById("searchT");  
      searchA = document.getElementById("searchA");
      if(val == 0)
      {
        alert("Select a proper category if you want to search");  
      }
      else if(val == 1)
      {
        searchT.style.display = 'inline';
        searchA.style.display = 'none';  
      }
      else if(val == 2)
      {
        searchA.style.display = 'inline';
        searchT.style.display = 'none';  
      }
      else if(val == 3)
      {
        searchA.style.display = 'inline';
        searchT.style.display = 'inline';
      }
      else{
        
      }
    }
    </script>

  </head>

  <body onload="loadQuestions()">

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="main_page.php">Forum</a>
          <a style="left:680px;" class="blog-nav-item active" href="logout.php">Log Out</a>
        </nav>
      </div>
    </div>
  
    <div class="container">
      <br>
      <div class="blog-header">
        <h1 class="blog-title">FORUM</h1>
        <p class="lead blog-description">A place where you can post questions and expect answer from experts.</p>
                
        <form id='sTag' action='' >
          <input type = 'text' id ='searchT' style="display:none" placeholder='Search By Tag'/>   
          <input type = 'text' id ='searchA' style="display:none" placeholder='Search By Author'/>
          <select id = "searchBox" onchange ="display()">
            <option value = '0'>--SELECT--</option>
            <option value = '1'>Tags</option>
            <option value = '2'>Author</option>
            <option value = '3'>Both</option>
          </select><br><br>
          <input type='button' onclick = "search()" value=' Search'/>
          <script type="text/javascript">placeTag()</script>
        </form>
      </div>

   
      <div class="row">

        <div class="col-sm-8 blog-main">

          
    
<div class="blog-post">
            <h2 class="blog-post-title">Questions</h2>
            <br>
            <div id='ques'>
            </div>
            <hr>
          <nav>
            <ul class="pager">
            <li><a href="javascript:moreQ()">More</a></li>  
            </ul>
          </nav>
            
          </div><!-- /.blog-post -->


        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
                 
        
                    <nav>
            <ul class="pager">
                          <li><a href="try1.php">Ask Question</a></li>
            </ul>
          </nav>
          <div class="sidebar-module sidebar-module-inset">
           
            <h4>About</h4>
            <p>This is a discussion forum for students to post their doubts regarding placement process. Other students, seniors or alumni, can post the answers to the questions. </p>
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