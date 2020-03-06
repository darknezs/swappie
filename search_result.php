<?php
include "connect_swp.php";

if(!isset($_POST['search'])){
	header("location:index.php");
}

$search_sql="SELECT * FROM picture WHERE img_name LIKE '%".$_POST['search']."%' OR text LIKE '%".$_POST['search']."%'";
$search_query=mysqli_query($conn,$search_sql);
if(mysqli_num_rows($search_query)!=0){
$search_rs=mysqli_fetch_assoc($search_query);

	do{ 
		//echo $search_rs['img_name'];
		echo "<a href=item.php?id=".$search_rs['img_id'].">".$search_rs['img_name']."</a>"."<br>";
		

	}while($search_rs=mysqli_fetch_assoc($search_query));
}else{
	echo "No Results Found";
}

?>