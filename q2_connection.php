<?php

$conn = mysql_connect("localhost","root","root") 
			or die("cannot connected");

@mysql_select_db("reg",$conn);
$databaseHost = 'localhost';
$databaseName = 'reg';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
?>