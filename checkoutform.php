<?php
include("connection.php");
include('styles.html');
?>
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
</style>
</head>
<body>
<form action="checkout.php" method="get">
 <input type="text" name="isbn" value="<?php echo $_GET['isbn']?>"/></br>
 <input type="text" name="card_id" placeholder="Library Card ID"/>
<input align="center" type="submit" value="CHECKOUT">
</form>
</body>
</html>