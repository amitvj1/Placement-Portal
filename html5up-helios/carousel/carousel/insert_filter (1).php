 
	<?php
	include('connection.php');
	$tie=mysql_escape_string($_POST['tier']);
	$ret=move_uploaded_file($_FILES['attach']['tmp_name'],"C:\\tmp\\".$_FILES['attach']['name']);
	$name=$_FILES['attach']['name'];
    if($tie==1)
	{
	 
	$query  = "LOAD DATA INFILE '/tmp/$name' INTO TABLE stud_placement FIELDS TERMINATED BY ','";
    
	 
	
	$drop="DROP TRIGGER placed.student_after_insert";
	$tri="CREATE TRIGGER student_after_insert
    AFTER INSERT ON stud_placement
    FOR EACH ROW
   BEGIN
	UPDATE eligibility SET tier_1=0 WHERE NEW.usn=usn;
   UPDATE eligibility SET tier_2=0 WHERE NEW.usn=usn;
   UPDATE eligibility SET tier_3=0 WHERE NEW.usn=usn;
  
  
   
   END ";
   }
   
   if($tie==2)
	{
	
	$query  = "LOAD DATA INFILE '/tmp/$name' INTO TABLE stud_placement
     FIELDS TERMINATED BY ','";
	//$que= "LOAD DATA INFILE '/tmp/1.csv' INTO TABLE eligibility(usn)";
	$drop="DROP TRIGGER placed.student_after_insert";
	
	
	$tri="CREATE TRIGGER student_after_insert
    AFTER INSERT ON stud_placement
    FOR EACH ROW
	BEGIN
	
	
   
   UPDATE  eligibility
	SET    
		   tier_1 = IF(tier_2 = 2, 0, 1),
		   tier_2 = IF(tier_2 = 2, 0, 0)
    WHERE NEW.usn=usn;
	UPDATE eligibility SET eligibility.tier_3=0 WHERE NEW.usn=usn;
   
   END ";
   
   
   }
  
   if($tie==3)
	{
	$query  = "LOAD DATA INFILE '/tmp/$name' INTO TABLE stud_placement
     FIELDS TERMINATED BY ','";
	
	$drop="DROP TRIGGER placed.student_after_insert";
	$tri="CREATE TRIGGER student_after_insert
    AFTER INSERT ON stud_placement
    FOR EACH ROW
   BEGIN
   UPDATE eligibility SET tier_1=1 WHERE NEW.usn=usn;
   UPDATE eligibility SET tier_2=2 WHERE NEW.usn=usn;
   UPDATE eligibility SET tier_3=0 WHERE NEW.usn=usn;
   END ";
   
   }
   
  
	$result2 = mysql_query($drop);
	$result_tri = mysql_query($tri);
	
	$result = mysql_query($query);
	
	
	
	
	if(!$result2)
    {
		
      echo mysql_error();
    }
	
	
	if(!$result)
    {
	  
      echo mysql_error();
    }
	
	if(!$result_tri)
    {
	  
      echo mysql_error();
    }
	
	





    ?>