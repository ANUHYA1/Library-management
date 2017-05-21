<?php
include("connection.php");
include("styles.html");

$sql = "select * from fines";
$result=mysqli_query($mysqli,$sql);

echo "<table><tr><th>Loan_id</th><th>fine_amt</th></tr>";
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
echo "<tr><td>".$row['Loan_id']."</td><td>".$row['Fine_amt']."</td></tr>";
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