
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<head>
<title>Swappie - Your old is others' new!</title>
<style>
{
    box-sizing: border-box;
}
/*margin of head*/
body {
  margin: 0;
  background-color: #F5F5F5;
}
.header {
    background-color: #fc3f4d;
    padding: 0px 0px 0px 100px;
    text-align: left;

}
/*style of Navigation Bar*/
.topnav {
  overflow: hidden;/*Is to fix bug when use property float to make the content stretch if don't use Navigation Bar are disappear*/
  background-color: #fc717b;
  padding: 0px 100px 0px 0px;
}
/*Style of bottom*/
.topnav a {
  float: right;
  display: block;/*bottom to block*/
  color: white;
  text-align: center;
  padding: 6px 6px;
  text-decoration: none;/*Line under bottom*/
  font-size: 17px;
}
.footer {
    background-color: #fc3f4d;
    position: fixed;
    bottom: 0;/*space in bottom of page*/
    width: 100%;
    color: white;
    font-size: 12px;
    text-align: center;
}

#content .mainContent {
  float: left;
  width: 70%;
  text-align: center;
  padding-left: 4%;
}
/* Product rows for catalog */
#content .mainContent .productRow {
  height: 300px;
  color: rgba(146,146,146,1.00);
  padding-bottom: 150px;
}
/* Each product Information in the catalog */
.mainContent .productRow .productInfo {
  float: left;
  padding-left: 5%;
  padding-right: 5%;
  width: 22%;
}

/* Main content of the site */
#content {
  clear: both;
  overflow: auto;
  padding-top: 29px;
}
/* Sidebar */
#content .sidebar {
  font-family: 'Montserrat', sans-serif;
  color: #fc3f4d;
  float: left;
  width: 20%;
  padding-left: 3%;
  padding-right: 3%;
  text-align: center;
  padding-top: 36px;
  height: 784px;
}
/* main content of the site */
#content .mainContent {
  float: left;
  width: 70%;
  text-align: center;
  padding-left: 4%;
  padding-top: 50;
}

/*menubar's properties for menus in sidebar */
#content .sidebar #menubar {
  text-align: left;
  color: #fc3f4d;
  position: relative;
  left: 0%;
}

/* Whole page content */
#mainWrapper {
  width: 85%;
  padding-left: 10%;
}

/* Buy button for products in catalog */
.productRow .productInfo .buyButton {
  position: relative;
  top: 0px;
  width: 70%;
  background-color: #fc3f4d;
  height: 35px;
  color: rgba(255,255,255,1.00);
  border-style: none;
  font-size: 16px;
  text-transform: uppercase;
  margin-top: 8px;
}

/* Product's images in catalog */
.productInfo div img {
  object-fit: contain;
  width: 200px;
  height: 200px;
  margin-top: 20px;
  padding:10px;
}
</style>
</head>
<body>
<div class="header">
      <a href="index2.php"><img src="logo3.png" width="20%"></a>
</div>
<div class="topnav">
  <a href="logout.php">Log-out</a>
  <a href="#about">การแจ้งเตือน/Notification</a>
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

      			$id=$_GET['id'];
            //display pictures all of them in DB
              include 'connect_swp.php';
              $sql_2 = "SELECT * FROM picture WHERE id LIKE '%"img_name"%'";
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

