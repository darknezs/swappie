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
  $s_login_name = $row_user['name'];
  $s_login_id = $row_user['id'];
  mysqli_free_result($result_user);
}
$conn->close();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>order</title>
    <link rel="stylesheet" href="style5.css" type="text/css">
    <style media="screen">
      .topnav a:hover {
        background-color: #ddd;
        color: black;
      }

      .topnav .search-container {
        padding: 0px 15px 5px 1px;
        text-align: center;
      }
.footer {
    background-color: #fc3f4d;
    position:absolute;
    top: 100%;/*space in bottom of page*/
    width: 100%;
    color: white;
    font-size: 12px;
    text-align: center;
    }
      .topnav input[type=text] {
        padding: 6px;
        margin-top: 8px;
        font-size: 17px;
        border: none;
      }

      .topnav .search-container button {
        float: center;
        padding: 10px 10px;
        margin-top: 10px;
        margin-right: 50px;
        background: #ddd;
        font-size: 17px;
        border: none;
        cursor: pointer;
      }

      .content{
        margin-top: 0px;
      }
      .box_content{
        padding : 5px 5px 5px 5px;
        margin: 10px;
      }
      #content{
          width: 50%;
          margin: 20px auto;

      }
      form{
          width: 50%;
          margin: 20px auto;
      }
      form div{
          margin-top: 5px;
      }
      #img_div{
          width: 80%;
          padding: 5px;
          margin: 15px auto;
          border: 1px solid #cbcbcb;
      }
      #img_div:after{
          content:"";
          display: block;
          clear: both;
      }
      img{

        float: center;
        margin: 5px;
        width: 270px;
        height: 140;
      }
    </style>
  </head>
  <body>
       <div class="header">
         <a href="index2.php"><img src="logo.png" width="270px" height="100px">
       </div>
       <div class="topnav">
         <a href="logout.php">Log-out</a>
         <a href="index2.php">Home</a>

         <?php
             echo "<a>"."$s_login_name"."</a>";
          ?>
         <div class="search-container">
           <form method="post">
           </form>
         </div>
       </div>

         <!--<b><p>�Թ��Ңͧ�ѹ</p></b>-->

<?php
        include 'connect_swp.php';
        $sql = "SELECT * FROM picture WHERE picture.id = $s_login_id ";
        $result = mysqli_query($conn,$sql);

        $sql2 = "SELECT * FROM trade,picture where $s_login_id = trade.id && trade.img_id=picture.img_id ";   ///
        $result2 = mysqli_query($conn,$sql2);


          echo "<div class='list'>";
          echo "<table style='width:100%; text-align:center;'>";
             echo "<th>"."Items"."</th>";
             echo "<th>"."Picture"."</th>";
             echo "<th>"."Date Modified"."</th>";
             echo "<th>"."Status"."</th>";
             echo "<th>"."Modify"."</th>";
         while ($row = mysqli_fetch_array($result))
        {
                 $var = $row["img_id"];
             echo "<tr>".  "<td>".$row["img_name"]."</td>",
                           "<td>"."<img src = 'images/".$row['img']."'>"."</td>",
                           "<td>".$row["date"]."</td>";
             echo"<td>";


             $sql2 = "SELECT * FROM trade where img_id = '$var' ";   ///
             $result2 = mysqli_query($conn,$sql2);

              while($row2 = mysqli_fetch_array($result2))
                {

                    $count = $row2["trader_id"];
                    echo "<a href='profile.php?id=$count'>"."<p>".$row2["trader_name"]."</p>"."</a>";
                }

                echo"</td>";
                echo   "<td>"."<form action='delete-data.php?id=$var' method='post'>".
                       "<input type='submit' value='Delete'>"."</form>"
                       ."</td>"."</tr>";
        }
        echo " </table>";
?>

       </div>
  </body>
</html>
