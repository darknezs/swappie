<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>รายละเอียด/items</title>
    <link rel="stylesheet" href="style5.css" type="text/css">
    <style media="screen">
    
    </style>
  </head>
  <body>
    <div class="header">
      <a href="index2.php"><img src="logo.png" width="270px" height="100px"></a>
  </div>

  <div class="topnav">
  <a href="logout.php">Log-out</a>
  <a href="order.php">Order</a>
  <a href="index2.php">Home</a>
  </div>

<div class="grid-container">
  <div>
    <?php

    include 'connect_swp.php';
      session_start();  //START SESSION
      
 //display individual pic
    $id = $_GET['id'];
    $sql_1 = "SELECT * FROM picture WHERE picture.img_id = $id" ;
    $result_1 = mysqli_query($conn,$sql_1);
    while ($row = mysqli_fetch_array($result_1))
    {
     echo "<article class='productInfo'>";
        echo "<div>";
          echo "<img src = 'images/".$row['img']."'>";
        echo "</div>";
      echo "</article>";
    }
     ?>
   </div>
   <div >
     <?php
     $sql_2 = "SELECT * FROM picture,login WHERE picture.img_id = $id && login.id = picture.id";
     $result_2 = mysqli_query($conn,$sql_2);
     while ($row = mysqli_fetch_array($result_2))
     {
       $img_id = $row['img_id'];
       $id = $row['id'];
      echo "<div style='text-align:left'>";
      echo "<p>"."ชื่อสินค้า/Item's Name: ".$row['img_name']."</p>";
      echo "<p>"."รายละเอียด/Item's Description: ".$row['text']."</p>";
      echo "<p>"."ผู้ลงสินค้า/Owner: ".$row['name']."</p>";
      echo "<p>"."อีเมลล์/Email: ".$row['email']."</p>";
      echo "<p>"."สิ่งที่ต้องการ/Expected Items: ".$row['trade']."</p>";
      echo "<form method='post'>";
      echo "<input type=submit name=swap value='SWAP'>";
      echo "</form>";
      echo "</div>";
     }
     if (isset($_POST['swap']))
     {
       if(!isset($_SESSION['login_id'])) {
           header("Location:login.php");
       }
       else {
         echo "<script>alert('คุณได้ส่งข้อเสนอแล้ว/Your request has been sent successfully!!!')</script>";

         //$stmt = $conn->prepare("UPDATE picture set status = ? where img_id = ?");
         //$stmt->bind_param("si",$status,$img_id);   //old statement
         //$status   = $s_login_username;
         //$img_id   = $x;

      //get inf user of login
      $session_login_id = $_SESSION['login_id'];
      $qry_user = "SELECT * FROM login where id = '$session_login_id'";
      $result_user = mysqli_query($conn,$qry_user);
      if ($result_user) {
        $row_user = mysqli_fetch_array($result_user,MYSQLI_ASSOC);
        $s_login_username = $row_user['username'];
        $s_login_name = $row_user['name'];
        $s_login_id = $row_user['id'];   //**
        mysqli_free_result($result_user);
      }


         $stmt = $conn->prepare("INSERT INTO trade (id,img_id,trader_id,trader_name) VALUES (?,?,?,?)");
         $stmt->bind_param("iiis",$id,$img_id,$trader_id,$trader_name);
         $trader_id = $s_login_id;
         $trader_name = $s_login_name;
         

         $stmt->execute();
       }
     }
      ?>
   </div>
</div>
     <div class="footer">
       <p>This website is the mini-project of subject 308-223 WEB-PROGRAMMING</p>
       <p>Group Name: EASY EASY!!!</p>
     </div>
  </body>
</html>
