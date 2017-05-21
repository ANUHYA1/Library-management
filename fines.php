<?php
include("connection.php");
include('styles.html');
?>
<html>
<head>
<style>
input[type=submit] {
    width: 30%;
    background-color: brown;
    color: white;
    padding: 14px 20px;
    margin-left: 400px;
	margin-top:50px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
	
</style>
</head>
<body>
<form action="history.php" method="get">
<input type="submit" name="history" value="Payment History"/>
</form>
<form action="totalfineinfo.php" method="get">
<input type="submit" name="submit" value="Card_id Fine Information"/>
</form>
<form action="fineinfo.php" method="get">
<input type="text" placeholder="Loan id" name="loan_id"  />
<input type="submit" name="fineinfo" value="Loan id Fine Information "/>

</form>
<form action="refresh.php" method="get">
<input type="date" placeholder="Checkin(YYYY-mm-dd)" name="date"  />
<input type="submit" name="refresh" value="Refresh"/>

</form>
</body>
</html>