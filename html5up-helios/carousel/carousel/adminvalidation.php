      <?php
    session_start();
    include('connection.php');

    $name=mysql_escape_string($_POST['login']);
    $name1=mysql_escape_string($_POST['password']);
    $ins=mysql_query("SELECT user_name,pwd FROM admin WHERE user_name='$name' and pwd='$name1'");
    if ($ins) 
            {
                
              if($row = mysql_fetch_assoc($ins))
              {
                $_SESSION['username']=$row['user_name'];
                $_SESSION['password']=$row['pwd'];
               
               
                echo "<script type='text/javascript'>window.location.href= 'admin_company.html';</script>";
                
              }
              
            
    else
    {
    echo "<script type='text/javascript'>window.location.href= 'adminlogin1.html';</script>";
    
    session_destroy();    
    }
            }
    
    
    if(!$ins)
    {
      echo mysql_error();
    }

    mysql_close($bd);
    ?>

    
 