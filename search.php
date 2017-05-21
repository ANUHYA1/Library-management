<?php
include("connection.php");
include("styles.html");

$name=$_GET['name'];

$sql = "SELECT book.isbn,book.title,group_concat(authors.name) as name 
        from book 
       JOIN book_authors ON book.isbn = book_authors.isbn 
	   JOIN authors ON book_authors.author_id = AUTHORS.author_id 
	   where book.isbn like '$name' or book.title like '%$name%' or authors.name like '%$name%' 
	   group by book.isbn";

$result=mysqli_query($mysqli,$sql);
	echo "<table><tr><th>ISBN</th><th>TITLE</th><th>AUTHOR(S)</th><th>AVAILABILITY</th><th>CHECKOUT</th></tr>";
	while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{		
		$isbn=$row['isbn'];	 
		   echo "<tr><td>".$row['isbn']."</td><td>".$row['title']."</td><td>".$row['name']."</td>";
				 $sql1="select * from book_loans where isbn='$isbn' and date_in is null";
				 $result1=mysqli_query($mysqli,$sql1);
				 if(mysqli_num_rows($result1)>0)
				 {				
					echo "<td>not available</td>
					     <td><input type='button' value='Checkout' name='Checkout' onClick='error()'/></td></tr>";
				 }
				 else
				 {
					 echo "<td>available</td>
					 <td><form action='checkoutform.php' method='get'>
					 <input type='submit' value='Checkout' name='Checkout'/>
					 <input type='hidden' value='".$isbn."' name='isbn'/>
					 </form>
					 </td>";					 
				 }	
	}
	echo "</table>";
?>
<html>
<head>
<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}
</style>
<script>
function error()
{
	alert("book not available");
}
</script>
</head>
</html>
 
 