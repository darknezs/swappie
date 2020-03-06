<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>swappie</title>
    <link href="style5.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div class="header">
          <a href="main.php"><img src="logo.png" width="270px" height="100px">
    </div>
    <div class="topnav">
      <a href="register.php">สมัครสมาชิก</a>
      <a href="login.php">ลงชื่อเข้าใช้</a>
    </div>
    <div class="table">
      <div id="content">
        <section class="sidebar">
          <!-- This adds a sidebar with 1 searchbox,2 menusets, each with 4 links -->

          <div id="menubar">
            <nav class="menu">
              <h2><!-- Title for menuset 1 -->MENU ITEM 1 </h2>
              <hr>
              <ul>
                <!-- List of links under menuset 1 -->
                <li><a href="#" title="Link">Link 1</a></li>
                <li><a href="#" title="Link">Link 2</a></li>
                <li><a href="#" title="Link">Link 3</a></li>
                <li class="notimp"><!-- notimp class is applied to remove this link from the tablet and phone views --><a href="#" title="Link">Link 4</a></li>
              </ul>
            </nav>
            <nav class="menu">
              <h2>MENU ITEM 2 </h2>
              <!-- Title for menuset 2 -->
              <hr>
              <ul>
                <!--List of links under menuset 2 -->
                <li><a href="#" title="Link">Link 1</a></li>
                <li><a href="#" title="Link">Link 2</a></li>
                <li><a href="#" title="Link">Link 3</a></li>
                <li class="notimp"><!-- notimp class is applied to remove this link from the tablet and phone views --><a href="#" title="Link">Link 4</a></li>
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
                  include 'connect_swp.php';
                  $count = 1;
                  $sql_2 = "SELECT * FROM picture";
                  $result_2 = mysqli_query($conn,$sql_2);
                  while ($row = mysqli_fetch_array($result_2))
                  {
                      echo "<article class='productInfo'>";  //<!-- Each individual product description -->
                      echo "<div>";
                      echo "<a href='item.php?id=$count'>"."<img src = 'images/".$row['img']."'>"."</a>";
                      //echo "<p>".$row['text']."</p>";
                      // $row['img_id'];
                      echo "<a href='item.php?id=$count'>"."<input type='button' name='button' value='Swap' class='buyButton'>"."</a>";
                      echo "</div>";
                      echo "</article>";
                      $count++;
                  }
      echo "</div>";
        echo "</section>";
        $conn->close();
    ?>
      </div>
    </div>
    <div class="footer">
      <p>This website is the mini-project of subject 308-223 WEB-PROGRAMMING</p>
      <p>Group Name: EASY EASY!!!</p>
    </div>
  </body>
</html>
