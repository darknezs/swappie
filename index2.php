<?php
      session_start();
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
        $s_login_email = $row_user['email'];
        $s_login_name = $row_user['name'];
        mysqli_free_result($result_user);
      }
      $conn->close();
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<head>
<title>Swappie - Your old is others' new!</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="style5.css" type="text/css">
</head>
<body>
<div class="header">
      <img href="index2.php" src="logo.png" width="270px" height="100px">
</div>
<div class="topnav">
  <a href="logout.php">Log-out</a>
  <a href="upload.php">Upload items</a>
  <a href="order.php">Profile</a>


  <div><?php
       echo "<a>"."$s_login_name"."</a>";
   ?>

   </div></div>
  <form name="form1" method="post" action="search_result.php">
  <input name="search" type="text" placeholder="I'm looking for...">
  <input type="submit" name="submit" value="Search">
    
  </form>


<div class="table">
  <div id="content">
    <section class="sidebar">
      <!-- This adds a sidebar with 1 searchbox,2 menusets, each with 4 links -->

      <div id="menubar">
        <nav class="menu">
          <h2><!-- Title for menuset 1 -->CATEGORIES</h2>
          <hr>
          <ul>
            <!-- List of links under menuset 1 -->
            <li><a href="items_elec.php" title="Link">Electronic Devices</a></li>
            <li><a href="items_clothes.php" title="Link">Clothes</a></li>
            <li><a href="items_acces.php" title="Link">Accessories</a></li>
            <li><a href="items_sport.php" title="Link">Sports</a></li>
            <li><a href="items_books.php" title="Link">Books</a></li>
            <li><a href="items_etc.php" title="Link">Etc...</a></li>
            <!-- notimp class is applied to remove this link from the tablet and phone views -->
          </ul>
        </nav>
        
      </div>
    </section>
    <?php
    echo "<section class='mainContent'>";
      echo"<div class='productRow'>";       //<!-- Each product row contains info of 3 elements -->
  //<!--        <div><img alt="sample" src="item.jpg"></div>    -->
  //<!--        <p class="price">$50</p>                          -->
  //<!--        <p class="productContent">Content holder </p>         -->
  //<!--        <input type="button" name="button" value="Swap" class="buyButton">    -->
            //display pictures all of them in DB
    //<!--        <div class="w3-row-padding" style="margin:0 -16px">
//<!--<div class="w3-half">
//<!--<div class="w3-button w3-white w3-ripple" style="margin:0;padding:0">
//<!--<img src="img_fjords.jpg" style="width:100%">
//<!--<p>A picture can be a w3-button</p>

            include 'connect_swp.php';
            $sql_2 = "SELECT * FROM picture";
            $result_2 = mysqli_query($conn,$sql_2);
            //$count = $row['img_id'];
            while ($row = mysqli_fetch_array($result_2))
            {
                $count = $row['img_id'];
                echo "<article class='productInfo'>";  //<!-- Each individual product description -->
                echo "<div class='w3-half'>";
                echo "<div class='w3-button w3-white w3-ripple' style='margin:0;padding:0'>";
                echo "<a href='item.php?id=$count'>"."<img src = 'images/".$row['img']."'>"."</a>";
                echo "<p>".$row['img_name']."</p>";
                echo "<a href='item2.php?id=$count'>"."</a>";
                echo "</div>";
                echo "</div>";
                echo "</article>";
            }
echo "</div>";
  echo "</section>";
  $conn->close();
?>
  </div>
</div>

</body>
</html>
