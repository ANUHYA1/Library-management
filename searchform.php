<?php
include("connection.php");
?>
<html>
<head>
<style>
input[type=text], select {
    width: 80%;
    padding: 12px 20px;
    margin: 50px 8px 8px 8px;
    display: inline-block;
    border: 3px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 10%;
    background-color: grey;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: rgb(200,150,255);
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: red;
}

</style>
</head>
<body>
<div>
      <ul>
        <li><a href="index.php">Book Search</a></li>
		<li><a href="checkoutform2.php">Checkout</a></li>
        <li><a href="borrowerform.php">Borrower System</a></li>
        <li><a href="checkinform.php">Checkin</a></li>
        <li><a href="fines.php">Fines</a></li>
      </ul>
	  
	  <form action="search.php" method="get">
            <input class="search" type="text" name="name" placeholder="Search for Books by ISBN or Title or Author(s)" required>
            <input align="center" type="submit" value="GO">
      </form>
	  
</div>
</body>
</html>