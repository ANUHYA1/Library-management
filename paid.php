<?php
include("connection.php");
include('styles.html');

$card_id=$_GET['card_id'];
$sql = "UPDATE `fines` SET `paid`=true WHERE loan_id in (select loan_id from book_loans where card_id='".$card_id."')";
$result=mysqli_query($mysqli,$sql);

if(mysqli_affected_rows($mysqli)>0)
{
echo "<table><tr><th>Payment Successful</th></tr></table>";
}
else
{
	 echo "<table><tr><th>Payment Failed</th></tr></table>";
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

