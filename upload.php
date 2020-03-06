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
        $s_login_id = $row_user['id'];
        mysqli_free_result($result_user);
      }
      $conn->close();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>upload picture</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
    <link href="/static/fontawesome/fontawesome-all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">
    <link rel="stylesheet" href="styleeee.css" type="text/css">
  </head>
  <body>
    <div class="header">
          <a href="index2.php"><img src="logo.png" width="270px" height="100px">
    </div>
    <div class="topnav">
      <a href="logout.php">ออกจากระบบ/Log-out</a>
      <?php
           echo "<a>"."$s_login_name"."</a>";
       ?>
    </div>
    <div class="content">
      <h1 style="text-align:center;" class="font">Upload picture</h1>
        <form class="" method="post" enctype="multipart/form-data">
          <input type="hidden" name="size" value="1000000">
          <input type="hidden" name="submitted" value="true">
          <div>
            <input type="file" name="image" required>
          </div>
          <div>
            ชื่อสินค้า/Item's Name:
            <input type="text" name="img_name" required>
          </div>
          <div>
            <textarea name="text" rows="4" cols="40" placeholder="รายละเอียดเกี่ยวกับสิ่งของงชิ้นนี้/Item's Description" required></textarea>
          </div>
          <div>
            ประเภทของสินค้า/Kind of this item:
            <select name="cat_id">
              <option value="1">Electronic Devices</option>
              <option value="2">Clothes</option>
              <option value="3">Accessories</option>
              <option value="4">Sports</option>
              <option value="5">Books</option>
              <option value="6">Etc</option>
            </select>
          </div>
          <div>
            สิ่งของที่ต้องการแลก/Expected Items:
            <input type="text" name="trade" required>
          </div>
          <div>
            <input type="submit" name="upload" value="Upload image">
          </div>
        </form>
      </div>
      <script></script>
      <div class="footer">
        <p>This website is the mini-project of subject 308-223 WEB-PROGRAMMING</p>
        <p>Group Name: EASY EASY!!!</p>
      </div>
    </body>
  </html>
  <!-- /////////////////////////////////////////////////////////////////////////  -->
  <?php
        if (isset($_POST['submitted'])) {
          include 'connect_swp.php';
        //upload img
        $ext = pathinfo(basename($_FILES['image']['name']),PATHINFO_EXTENSION);
        $new_img_name = 'img_'.uniqid().".".$ext;
        $img_path = "images/";
         $upload_path = $img_path.$new_img_name;
      //  uploading
        $success = move_uploaded_file($_FILES['image']['tmp_name'],$upload_path);
        if ($success==FALSE) {
          echo "<script>"."alert('อัพโหลดไม่ได้/Cannot Upload!!!)"."</script>";
          exit();
        }
        $img = $new_img_name;
        $text = $_POST['text'];
        $date = date("d/m/Y");
        $id = $s_login_id;
        $trade = $_POST['trade'];
        $img_name = $_POST['img_name'];
        $cat_id = $_POST['cat_id'];

        $sql = "INSERT INTO picture (cat_id,id,img_name,img,text,trade,date) VALUES ('$cat_id','$s_login_id','$img_name','$img','$text','$trade','$date')";

        $result = mysqli_query($conn,$sql);
        if ($result) {
          echo "<script>"."alert('เพิ่มข้อมูลเรียบร้อยแล้ว/Uploaded Successfully!!!')"."</script>";
        }
        else {
          echo "เกิดข้อผิดพลาด/Something wrong happened...".mysqli_error($conn);
        }
        $conn->close(); //เพื่มมาใหม่
       }

   ?>
