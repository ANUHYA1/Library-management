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
    margin-left: 30px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 5%;
    background-color: grey;
    color: white;
    padding: 14px 20px;
    margin-left: 40px;
	margin-top:10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
</style>
</head>
<body>
<form action="paid.php" method="get">
Card_id <input type="text" name="card_id" value="<?php echo $_GET['card_id']?>" placeholder="card_id"></br>
Fine amount <input type="text" name="fine_amt" value="<?php echo "$".$_GET['fine_amt']?>"></br>
<input type="submit" value="pay">
</form>
</body>
</html>