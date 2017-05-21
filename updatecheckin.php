<?php
include("connection.php");
include("styles.html");

$isbn=$_GET['isbn'];
$loan_id=$_GET['loan_id'];
$date_in=$_GET['datein'];

$sql="update book_loans set date_in='".$date_in."' where isbn='".$isbn."' and loan_id='".$loan_id."' ";
$result=mysqli_query($mysqli,$sql);

if($result)
{	
	if(mysqli_affected_rows($mysqli)>0)
	{
		$sql1="select due_date from book_loans where isbn='".$isbn."' and loan_id='".$loan_id."' ";
		$result1=mysqli_query($mysqli,$sql1);
		$row=mysqli_fetch_array($result1,MYSQLI_ASSOC);
		
		$due_date=$row['due_date'];
		$d1=strtotime($due_date);
		$d2=strtotime($date_in);
			
		if($date_in>$due_date)
		{
			echo "<table><tr><th>Checkin successful: Overdue</th></tr></table>";
	
		    $days=($d2-$d1)/86400;
			$fine=round(0.25*$days,2);
			
			$sql1="insert into fines(loan_id,fine_amt) values ('$loan_id','$fine')";
			$result1=mysqli_query($mysqli,$sql1);
		}
		
		else
		{
			echo "<table><tr><th>Checkin successful: No Fine</th></tr></table>";
		}
	}
}
?>
<html>
<head>
<style>
table, td, th {
    border: 1px solid black;
	
}

table {
    border-collapse: collapse;
    width: 50%;
	margin-top:100px;
	margin-left:450px;
}

th {
    height: 50px;
}
</style>
</head>
</html>
