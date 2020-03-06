cònOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>swappie</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
    <link href="/static/fontawesome/fontawesome-all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">
    <link rel="stylesheet" href="styleeee.css" type="text/css">
  </head>
  <body>
    <div class="header">
          <a href="index.php"><img src="logo.png" width="270px" height="100px">
    </div>
    <div class="topnav">
      <a href="register.php">สมัครสมาชิก/Register</a>
      <a href="login.php">ลงชื่อเข้าใช้/Log-in</a>
    </div>
    <div class="regis">
    <table>
      <tr>
        <td>
          <h1 style="padding: 0px 0px 0px 100px;" class="font">Register</h1>
    <form class="pure-form pure-form-stacked" method="post">
      <input type="hidden" name="submitted" value="true">
           Username:
           <input type="text" name="username" required autofocus><br>
           Password:
           <input type="password" name="password" required><br>
           Confirm Password:
          <input type="password" name="password2" class="textinput"><br>
           Name:
           <input type="text" name="name" placeholder="Ex.ananda everything" required ><br>
           Email:
           <input type="email" name="email" placeholder="example@gmail.com" required><br>
           Facebook:
           <input type="text" name="facebook" required ><br>
           Tel:
           <input type="text" name="tel" placeholder="Ex.0812345678" required ><br><br>
     <input type="submit" name="register_btn" value="Register" id="submit">
     <!--<br><br><a href="http://127.0.0.1/swappy/index.html">Home</a>-->
          </form>
        </td>
      </tr>
    </table>
  </div>
  <div class="footest">
  <p>This website is the mini-project of subject 308-223 WEB-PROGRAMMING</p>
  <p>Group Name: EASY EASY!!!</p>
</div>
</body>
</html>

<?php
if (isset($_POST['submitted']))
{
        include 'connect_swp.php';
        $username = $_POST['username'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $facebook = $_POST['facebook'];
        $tel = $_POST['tel'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];

        //encript password
        $key ='asdiuasodoasamsnd9asd0908as0';
        $hash_login_password = hash_hmac('sha256',$password,$key);

        //send data to DB
        $query = "INSERT INTO login(username,name,email,facebook,tel,password) VALUES ('$username','$name','$email','$facebook','$tel','$hash_login_password')";

        if ($password==$password2) {
            $result = mysqli_query($conn,$query);
                if ($result) {
                    header("location:index.php");
                }
                else {
                    echo "<script>alert('เกิดข้อผิดพลาด.mysqli_error($conn)')</script>"   ;
                    //echo "เกิดข้อผิดพลาด".mysqli_error($conn);
                }
        }
        else {
          echo "<script>alert('รหัสผ่านไม่ตรงกัน'/)</script>";
        }

        $conn->close();
}
?>
