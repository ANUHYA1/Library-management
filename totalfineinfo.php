<?php
include("connection.php");
include("styles.html");

$sql = "select book_loans.Card_id,SUM(fines.Fine_amt) as total_fine
from fines
left join book_loans
on fines.Loan_id=book_loans.Loan_id
where fines.paid=false
group by Card_id";
$result=mysqli_query($mysqli,$sql);


echo "<table><tr><th>Card_id</th><th>Total fine_amt</th><th> Make Payment</th></tr>";
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
echo "<tr><td>".$row['Card_id']."</td><td>".$row['total_fine']."</td><td><form action='pay.php' method='get'>
	<input type='submit' name='pay' value='pay'/>
	<input type='hidden' name='fine_amt' value='".$row['total_fine']."'/>
	<input type='hidden' name='card_id' value='".$row['Card_id']."'/>
	</form>
	</td></tr>";
	
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