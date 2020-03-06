<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta charset="UTF-8">
<head>
<style type="text/css">
  .footer {
    background-color: #fc3f4d;
    position: absolute;
    width: 100%;
    color: white;
    font-size: 12px;
    text-align: center;
    left: 0px;
}
</style>
<title>swappie</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
     <link href="/static/fontawesome/fontawesome-all.css" rel="stylesheet">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">
     <link href="styleeee.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="header">
      <a href="index2.php"><img src="logo.png" width="270px" height="100px">
</div>
<div class="topnav">
  <a href="register.php">สมัครสมาชิก/Register</a>
  <a href="index.php">Home</a>
</div>
<div class="log">
<table>
  <tr>
    <td>
<h1 style="padding: 0px 0px 0px 120px;" class="font">Login</h1>
      <form class="pure-form pure-form-stacked" action="login.php" method="post">
      <input type="hidden" name="submitted" value="true">
        Username:
      <input type="text" name="username" required autofocus>
        Password:
        <input type="password" name="password" required><br>
        <button class="pure-button" type="submit">
          <i class="fas fa-sign-in-alt"></i>
          sign in
        </button>
      </form>
  </td>
</tr>
</table>
</div>
<div class="footer">
  <p>This website is the mini-project of subject 308-223 WEB-PROGRAMMING</p>
  <p>Group Name: EASY EASY!!!</p>
</div>
</body>
</html>

<?php
if (isset($_POST['submitted']))
{

    include 'connect_swp.php';
    $login_username = mysqli_real_escape_string($conn,$_POST['username']);
    $login_password = mysqli_real_escape_string($conn,$_POST['password']);

    $key ='asdiuasodoasamsnd9asd0908as0';
    $hash_login_password = hash_hmac('sha256',$login_password,$key);

    $sql = "SELECT * FROM login where username = ? AND password = ?";
    $stmt = mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"ss",$login_username,$hash_login_password);
    mysqli_execute($stmt);
    $result_user = mysqli_stmt_get_result($stmt);

    if ($result_user->num_rows == 1) {
        session_start();
        $row_user = mysqli_fetch_array($result_user,MYSQLI_ASSOC);
        $_SESSION['login_id'] = $row_user['id'];
        header("location:index2.php");
    }
    else {
      echo "<script>alert('รหัสผ่านผิด/Wrong username or password!!!!')</script>";
    }

    $conn->close();
}
?>
