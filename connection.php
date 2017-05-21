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
?>