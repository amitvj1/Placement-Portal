 
	<?php
	include('connection.php');
    
	$cgpa=mysql_escape_string($_POST['cgpa']);
	$dept=mysql_escape_string($_POST['dept']);
	$tier=mysql_escape_string($_POST['tier']);

	
	$a=rand(10,100);
	$a.="result";
	
	
	

	
	echo "<script type='text/javascript'>alert('$a');</script>";
	echo "<script type='text/javascript'>window.location.href='filter.html'</script>";
	if($tier==1)
	{
	$query  = "SELECT distinct s.name,s.mobile,s.email_id,st.sgpa_1,st.sgpa_2,st.sgpa_3,st.sgpa_4,st.sgpa_5,st.sgpa_6,st.cgpa INTO OUTFILE 'C:/tmp/$a.csv' FIELDS TERMINATED BY ','  
	 LINES TERMINATED BY '\r\n' FROM stu_personal s,com_basic c,stu_education st,eligibility e where st.cgpa>'$cgpa' and
	 st.backlogs=0 and st.branch='$dept' and e.tier_1=1 and st.USN=s.usn 
	 and s.USN=e.usn and e.usn=st.USN";
	 }
	 if($tier==2)
	{
	
	$query  = "SELECT distinct s.name,s.mobile,s.email_id,st.sgpa_1,st.sgpa_2,st.sgpa_3,st.sgpa_4,st.sgpa_5,st.sgpa_6,st.cgpa INTO OUTFILE 'C:/tmp/$a.csv' FIELDS TERMINATED BY ','  
	 LINES TERMINATED BY '\r\n' FROM stu_personal s,com_basic c,stu_education st,eligibility e where st.cgpa>'$cgpa' and
	 st.backlogs=0 and st.branch='$dept' and e.tier_2=1 and st.USN=s.usn 
	 and s.USN=e.usn and e.usn=st.USN";
	 }
	 
	 if($tier==3)
	{
	$query  = "SELECT distinct s.name,s.mobile,s.email_id,st.sgpa_1,st.sgpa_2,st.sgpa_3,st.sgpa_4,st.sgpa_5,st.sgpa_6,st.cgpa INTO OUTFILE 'C:/tmp/$a.csv' FIELDS TERMINATED BY ','  
	 LINES TERMINATED BY '\r\n' FROM stu_personal s,com_basic c,stu_education st,eligibility e where st.cgpa>'$cgpa' and
	 st.backlogs=0 and st.branch='$dept' and e.tier_3=1 and st.USN=s.usn 
	 and s.USN=e.usn and e.usn=st.USN";
	 }
	 
	 $result = mysql_query($query);
	
	 if(!$result)
    {
      echo mysql_error();
    }






    ?>