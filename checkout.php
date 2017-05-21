<?php
$server='localhost';
$username='root';
$password='root';
$db='p2';

$mysqli=new mysqli($server,$username,$password,$db,8889); 
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
include("styles.html");
$isbn=$_GET['isbn'];
$card_id=$_GET['card_id'];

$date_out=date("Y-m-d");
$d=strtotime('+14 days',strtotime($date_out));
$due_date=date("Y-m-d",$d);

$sql = "select count(*) from book_loans where card_id='$card_id' and date_in is null";
$result=mysqli_query($mysqli,$sql);
$row=mysqli_fetch_array($result);

 if($row['count(*)']==3)
{
	echo "<table><tr><th>Error: More than 3 book loans not allowed</th></tr></table>";
}

else
{
$sql3="INSERT into book_loans(isbn,card_id,date_out,due_date) VALUES ('$isbn','$card_id','$date_out','$due_date')";
$result3=mysqli_query($mysqli,$sql3);
if(mysqli_affected_rows($mysqli)>0)
{	
echo "<table><tr><th>Book Checkout Successful</th></tr></table>";
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

