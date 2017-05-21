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

$sql1="select * from book_loans where isbn='$isbn' and date_in is null";
				 $result1=mysqli_query($mysqli,$sql1);
				 if(mysqli_num_rows($result1)>0)
				 {				
					echo "<table><tr><th>Book Unavailable</th></tr></table>";
					  
				 }
				 else
				 {
					 echo "<table><tr><th>Book Available</th></tr>
					 <td><form action='checkout.php' method='get'>
					 <input type='submit' value='Checkout' name='Checkout'/>
					 <input type='hidden' value='".$isbn."' name='isbn'/>
					 <input type='hidden' value='".$card_id."' name='card_id'/>
					 </form>
					 </td>";					 
				 }	

echo "</table>";
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

