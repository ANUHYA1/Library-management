<?php
include("connection.php");
include("styles.html");
$date_in=date('Y-m-d');

$sql = "SELECT * FROM book_loans 
        JOIN fines ON book_loans.Loan_id = fines.Loan_id";
$result=mysqli_query($mysqli,$sql);
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
        $due_date=$row['Due_date'];
		$d1=strtotime($due_date);
		$d2=strtotime($date_in);
		$lid = $row['Loan_id'];
		
		if($date_in>$due_date)
		{		      
		    $days=($d2-$d1)/86400;
			$fine=round(0.25*$days,2);

			$sql1="UPDATE fines SET fine_amt='".$fine."' where Loan_id ='".$lid."'";
			$result1=mysqli_query($mysqli,$sql1);
			
		}
		
		else
		{
			echo "<table><tr><th>No Fine</th></tr></table>";
		}

}
echo "<table><tr><th>Update successful</th>
      <td><form action='display.php' method='get'>
	<input type='submit' name='display' value='display'/></td>
	</tr></table>";
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