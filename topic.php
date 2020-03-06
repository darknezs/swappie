<?php

   $id = $_GET['id'];

   echo $id;


   // ประกาศตัวแปร php ชื่อว่า $id แล้วทำการแอดซายค่าโดยการรับจากตัวแปรประเภท GET ที่มีชื่อว่า ID ณ ตอนนี้ $id จะมีค่าตามที่ถูกส่งมาแต่ละครั้ง เราสามารถนำตรงนี้ไปใช้งานต่อได้
   include 'connect_swp.php';
   $sql_2 = "SELECT * FROM picture WHERE picture.imp_id = '$id'";
   $result_2 = mysqli_query($conn,$sql_2);
   while ($row = mysqli_fetch_array($result_2))
   {
       echo "<article class='productInfo'>";  //<!-- Each individual product description -->
       echo "<div>";
       echo "<a href='item.php'>"."<img src = 'images/".$row['img']."'>"."</a>";
       //echo "<p>".$row['text']."</p>";
       // $row['img_id'];
       echo "<a href='item.php'>"."<input type='button' name='button' value='Swap' class='buyButton'>"."</a>";
       echo "</div>";
       echo "</article>";

   }



?>
