      <?php
    session_start();
    include('connection.php');

    $name=mysql_escape_string($_POST['login']);
    $password=mysql_escape_string($_POST['password']);
    $ins=mysql_query("SELECT id,password,name FROM com_basic WHERE name='$name' and password='$password'");
    if ($ins) 
            {
                
              if($row = mysql_fetch_assoc($ins))
              {
                echo "abc";
                $_SESSION['cid']=$row['id'];
                $_SESSION['password']=$row['password'];
                $_SESSION['name']=$row['name'];
                //echo "<script>window.location.href='student_afterlogin.html'</script>";-profile
                echo "<script type='text/javascript'>window.location.href= 'company_profile_view.php';</script>";
                //echo "<script type='text/javascript'>window.location.href= 'studentlogin1.html';</script>";    
              }
            
    else
    {
    echo "<script type='text/javascript'>window.location.href= 'companylogin1.html';</script>";
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

    
 