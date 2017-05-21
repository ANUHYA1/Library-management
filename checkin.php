<?php
include("connection.php");
include("styles.html");
$checkinDate=$_GET['date'];
$name=$_GET['name'];

$sql="Select * from book_loans where date_in is null and card_id='$name' or card_id in(select card_id from borrower where fname like '%$name%' or lname like '%$name%') or isbn='$name' or isbn in(select isbn from book where title like '%$name%')";
$result=mysqli_query($mysqli,$sql);

if(mysqli_num_rows($result)==0)
{
	 echo "<tr><th>Book loan Unavailable</th></tr>";
}

else
{
echo "<table><tr><th>Loan_id</th><th>ISBN</th><th>Card_id</th><th>Date_out</th><th>Due_date</th><th>Checkin</th></tr>";
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
{	
	echo "<tr><td>".$row['Loan_id']."</td><td>".$row['isbn']."</td><td>".$row['Card_id']."</td><td>".$row['Date_out']."</td><td>".$row['Due_date']."</td>
		  <td><form action='updatecheckin.php' method='get'>
		      <input type='submit' value='Checkin' name='Checkin'/>
			  <input type='hidden' value='".$row['isbn']."' name='isbn'/>
			  <input type='hidden' value='".$row['Loan_id']."' name='loan_id'/>
			  <input type='hidden' value='$checkinDate' name='datein'/>
			  </form>
			  </td></tr>";
}
echo "</table>";
}
?>
<html>
<head>
<style>
table {
    border-collapse: collapse;
    width: 80%;
}

 td {
    padding: 35px;
    text-align: center;
    border-bottom: 1px solid #ddd;
	border-top: 1px solid #ddd;
}
th{
	text-align: center;
    border-bottom: 1px solid #ddd;
	border-top: 1px solid #ddd;
	padding:4px;
	margin-left:4px;
}

</style>
</head>
</html>