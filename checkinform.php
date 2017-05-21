<?php
include("connection.php");
?>
<html>
<head>
<style>
input[type=text], select {
    width: 60%;
    padding: 12px 20px;
    margin: 50px 8px 20px 8px;
    border: 1px solid #ccc;
	display: inline-block;
	box-sizing: border-box;
    border-radius: 4px;
    
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
    background-color: green;
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
    background-color: orange;
}


</style>
</head>
<body>

       <ul>
        <li><a href="index.php">Book Search</a></li>
		<li><a href="checkoutform2.php">Checkout</a></li>
        <li><a href="borrowerform.php">Borrower System</a></li>
        <li><a href="checkinform.php">Checkin</a></li>
        <li><a href="fines.php">Fines</a></li>
      </ul>
	  <form action="checkin.php" method="get">
	  <input type="date" placeholder="Checkin(YYYY-mm-dd)" name="date" />
 <input class="search" type="text" placeholder="Enter Borrower name or Card id or ISBN" name="name">
 <input align="center" type="submit" value="Checkin">
</form>
</div>
</body>
</html>