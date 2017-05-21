<html>
<head>
<style>

input[type=text] {
    width: 30%;
    padding: 12px 20px;
   margin-top: 50px;
   margin-right: 150px;
    margin-left: 700px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 10%;
    background-color: grey;
    color: white;
    padding: 14px 20px;
    margin-left: 700px;
	margin-top:10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
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
    background-color: red;
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
<form action="addborrower.php" method="get">
 <input id="1" type="text" name="ssn" placeholder="Social Security Number" required></br>
 <input type="text" name="fname" placeholder="First Name" required></br>
<input type="text" name="lname" placeholder="Last Name"required></br>
 <input type="text" name="address" placeholder="Address" required></br>
 <input type="text" name="phone" placeholder="Phone" required></br>
<input align="center" type="submit" value="SUBMIT">
</form>
</body>
</html>
