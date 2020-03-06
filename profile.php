<?php
      //START SESSION
/*      session_start();
      if(!isset($_SESSION['login_id'])) {
        header("Location:login.php");
      }
      include 'connect_swp.php';
      $session_login_id = $_SESSION['login_id'];
      $qry_user = "SELECT * FROM login where id = '$session_login_id'";
      $result_user = mysqli_query($conn,$qry_user);
      if ($result_user) {
        $row_user = mysqli_fetch_array($result_user,MYSQLI_ASSOC);
        $s_login_username = $row_user['username'];
        $s_login_name = $row_user['name'];
        $s_login_id = $row_user['id'];   //**
        mysqli_free_result($result_user);
      }                                                               */
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
      <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
       <link href="/static/fontawesome/fontawesome-all.css" rel="stylesheet">
       <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">
    <link href="styleeee.css" rel="stylesheet">
  </head>
  <body>
    <div class="header">
          <a href="index2.php"><img src="logo3.png" width="20%"></a>
    </div>
    <div class="topnav">
      <a href="logout.php" >
        <i class="fas fa-door-open"></i>
        Log-out
      </a>
      <a href="#about">การแจ้งเตือน/Notification</a>
      <a href="Order.php">รายการของคุณ/Order</a>

    </div>
    <div class="profile">
    <?php
    $id = $_GET['id'];
    include 'connect_swp.php';
    $sql = "SELECT * FROM login WHERE login.id = $id";
    $result = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_array($result))
    {
     echo "<div style='text-align:left'>";
     echo "<p>"."Username : ".$row['username']."</p>";
     echo "<p>"."ชื่อ : ".$row['name']."</p>";
     echo "<p>"."Facebook : ".$row['facebook']."</p>";
     echo "<p>"."Tel : ".$row['tel']."</p>";
     echo "<p>"."อีเมลล์ : ".$row['email']."</p>";
    }
    echo "</div>";
    ?>
  </div>
  <div class="footer">
    <p>This website is the mini-project of subject 308-223 WEB-PROGRAMMING</p>
    <p>Group Name: EASY EASY!!!</p>
  </div>
</body>
</html>
