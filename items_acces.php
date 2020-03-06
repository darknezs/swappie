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
  <form name="form1" method="post" action="search_result.php">
  <input name="search" type="text" placeholder="I'm looking for...">
  <input type="submit" name="submit" value="Search">
  </form>

</div>

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
              include 'connect_swp.php';
              $sql_2 = "SELECT * FROM picture WHERE picture.cat_id = 3";
              $result_2 = mysqli_query($conn,$sql_2);
              while ($row = mysqli_fetch_array($result_2))
              {
                  $count = $row['img_id'];
                  echo "<article class='productInfo'>";  //<!-- Each individual product description -->
                  echo "<div>";
                  echo "<a href='item.php?id=$count'>"."<img src = 'images/".$row['img']."'>"."</a>";
                  //echo "<p>".$row['text']."</p>";
                  // $row['img_id'];
                  echo "<a href='item.php?id=$count'>"."<input type='button' name='button' value='Swap' class='buyButton'>"."</a>";
                  echo "</div>";
                  echo "</article>";
              }
  echo "</div>";
    echo "</section>";
    $conn->close();
?>
  </div>

<div class="footer">
  <p>This website is the mini-project of subject 308-223 WEB-PROGRAMMING</p>
  <p>Group Name: EASY EASY!!!</p>
</div>
</body>
</html>
