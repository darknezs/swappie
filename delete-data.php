<?php

include 'connect_swp.php';

$id = $_GET['id'];

$sql = "SELECT* FROM picture ";
$result=mysqli_query($conn,$sql);

$sql2 = "DELETE FROM picture WHERE picture.img_id= $id";
$result2=mysqli_query($conn,$sql2);

header("Location:order.php");

mysqli_close($conn);
 ?>