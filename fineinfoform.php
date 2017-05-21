<?php
include("connection.php");
include('styles.html');
?>
<html>
<head>
<style>
input[type=text], select {
    width: 60%;
    padding: 12px 20px;
    margin: 50px 8px 8px 8px;
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
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
</style>
</head>
<body>
<form action="fineinfo.php" method="get">
<input type="text" name="card_id" placeholder="Card ID"/>
<input type="submit" name="submit" value="submit"/>
</form>
</body>
</html> 