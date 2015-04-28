<?php
$c_date = $_GET['date'];
$session = $_GET['session'];
$c_date = date('Y-m-d',strtotime($c_date));

//connection to database
$con = mysql_connect('localhost','root','');
$c=mysql_select_db('placed');						
if (!$con) {
    die('Could not connect: ' . mysql_error($con));
}

$sql="SELECT * FROM scheduling where f_date = '$c_date'";    //c_date -- the date received from company's side

$result = mysql_query($sql);

if($result)
{	
	if(mysql_num_rows($result)==2)			//both the sessions are booked
	{	echo "Not Available";
	//Print the available dates
			
	}
	else if(mysql_num_rows($result)==1)
	{
		$row = mysql_fetch_array($result);
		if($row[1] == 'ALL_DAY')		//booked for the full day
		{	echo "Not Availablehaha";
			
		}
		else if($session == $row[1])	//check the session availability
		{
			echo "Not Available";
			
		}
		else
		{
			echo "Available";
			
		}
	}
	else
	{
		echo "Available";
		
	}
}
else
{
	die(mysql_error($result));

}


//find the available dates
function available($date1)
{
	$date1 = date($date1);
	echo $date1;
	$prev_date = date('Y-m-d',strtotime($date1.'-7 day'));		//date a week past
	$next_date = date('Y-m-d',strtotime($date1.'+7 day'));		//date a week ahead
	echo $prev_date.$next_date;
	$sql = "SELECT * FROM scheduling where f_date >='$prev_date' and f_date <= '$next_date'"; 
	$result = mysql_query($sql);
	echo "RESULT    ".$result;
	$i = 0;
	$na_date = array();
	$count = mysql_num_rows($result);
	while($res = mysql_fetch_array($result))
	{
		$na_date[$i] = $res['f_date'];		//$na_date -- holds the already booked i.e Not Available dates
		$i += 1;
		echo $res['f_date'];
	}
	echo $na_date[1];	
	$i = 0;
	$j = 0;
	$temp_date = $prev_date;
	while($temp_date <= $next_date) 
	{
		if(search($temp_date,$na_date,$count))				//find out if the date is present in the given array
		{
			$temp_date = date('Y-m-d',strtotime($temp_date.'+1 day'));
			echo $temp_date;
		}

		else
		{
			$a_date[$j] = $temp_date;
			$temp_date = date('Y-m-d',strtotime($temp_date.'+1 day'));
			$j = $j + 1;
			echo $temp_date;
		}		
	}
	return $a_date;
}


//search whether date present in the table or not
function search($date,$array,$row)
{
	$row = $row - 1;
	while($row >= 0)
	{
		if($date == $array[$row])
		{	
			return true;
		}
		else
		{
			$row = $row - 1;
		}
	}
	return false;
}


?>

