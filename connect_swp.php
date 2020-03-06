<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "swappie";

$conn = new mysqli($servername,$username,$password,$dbname);     // connect to database

if ($conn->connect_error)
{
  die("connection failed: ".$conn->connect_error);
}

//echo "Connected successfully<br><br>";

?>
