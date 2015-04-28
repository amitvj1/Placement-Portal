      <?php
    session_start();
    include('connect1.php');

    $name=mysql_escape_string($_POST['login']);
    $name1=mysql_escape_string($_POST['password']);
    $ins=mysql_query("SELECT USN ,password,name FROM stu_personal WHERE USN='$name' and password='$name1'");
    if ($ins) 
            {
                
              if($row = mysql_fetch_assoc($ins))
              {
                $_SESSION['username']=$row['name'];
                $_SESSION['password']=$row['password'];
                $_SESSION['usn']=$row['USN'];
                //echo "<script>window.location.href='student_afterlogin.html'</script>";
                echo "<script type='text/javascript'>window.location.href= 'student_afterlogin.php';</script>";
                //echo "<script type='text/javascript'>window.location.href= 'studentlogin1.html';</script>";    
              }
            
    else
    {
    echo "<script type='text/javascript'>window.location.href= 'studentlogin1.html';</script>";
    //echo "<script>window.location.href='studentlogin1.html'</script>";
    session_destroy();    
    }
            }
    
    
    if(!$ins)
    {
      echo mysql_error();
    }

    mysql_close($bd);
    ?>

    
 