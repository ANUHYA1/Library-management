<?php
include("connection.php");
include("styles.html");

$loan_id=$_GET['loan_id'];
$date_in=date('Y-m-d');

$sql = "SELECT * FROM `fines` where loan_id='$loan_id'";
$result=mysqli_query($mysqli,$sql);

while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
	if($row['Paid']==0)
	{
		$sql1="select due_date from book_loans where loan_id='".$loan_id."' ";
		$result1=mysqli_query($mysqli,$sql1);
		$row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
		
	    $due_date=$row1['due_date'];
		$d1=strtotime($due_date);
		$d2=strtotime($date_in);
			
		if($date_in>$due_date)
		{
			echo "<table><tr><th>Update successful: Fine amount</th></tr></table>";
	
		    $days=($d2-$d1)/86400;
			$fine=round(0.25*$days,2);
			
			$sql2="UPDATE fines SET fine_amt='".$fine."' where loan_id='$loan_id' ";
			$result2=mysqli_query($mysqli,$sql2);
		}
		else{
			 
             echo "<table><tr><th>No fine</th></tr></table>";
		}
	}		
	else
	{		
		echo "<table><tr><th>Fine Payment is not pending</th></tr></table>";
	}
	
}
echo "</table>";
?>
<html>
<head>
<style>
table {
    border-collapse: collapse;
    width: 80%;
}

 th,td {
    padding: 35px;
    text-align: left;
    border-bottom: 1px solid #ddd;
	border-top: 1px solid #ddd;
}

</style>
</head>
</html>