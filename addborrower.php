<?php
include("connection.php");
include("styles.html");

$ssn=$_GET['ssn'];
$fname=$_GET['fname'];
$lname=$_GET['lname'];
$address=$_GET['address'];
$phone=$_GET['phone'];

$q="select * from borrower where ssn='$ssn' ";
$result=mysqli_query($mysqli,$q);
if(mysqli_fetch_array($result))
{
 echo "<table>
       <tr><th>BORROWER ALREADY EXISTS!!</th></tr>
	   </table>";
}
else
{
	
$q1="INSERT into borrower(ssn,fname,lname,address,phone) VALUES ('$ssn','$fname','$lname','$address','$phone')";
$result=mysqli_query($mysqli,$q1);
$sql1="select card_id from borrower where ssn='$ssn' ";
$result1=mysqli_query($mysqli,$sql1);
$row=mysqli_fetch_array($result1);

 echo "<table><tr><th>New borrower inserted with Card_id '".$row['card_id']."' as generated </th></tr></table>";

}
?>

<html>
<head>
<style>
table, td, th {
    border: 2px solid brown;
	
}

table {
    border-collapse: collapse;
    width: 50%;
	margin-top:100px;
	margin-left:400px;
}

th {
    height: 100px;
}
</style>
</head>
</html>
