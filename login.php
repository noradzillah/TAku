<?php
  include('config.php');
  include('fungsi.php');

  session_start();
  if (isset($_SESSION['login'])) {
    if ($_SESSION['login']) {
      header('Location: index.php');
    }
  }

  //admin 1
  //kajur 2
  //juri 3

  if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['username']) and isset($_POST['password'])){
      return login();
  }
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  height: 100vh;
  background-image: img/bg.jpg;
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
}
}
form {border: 3px solid #f1f1f1;}


input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 10px 0;
  border: none;
  background-color: transparent;
  border-bottom: 2px solid #2979ff;
}

.btn {
  background-color: #92a8d1;
  color: white;
  padding: 14px 30px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 110%;
  
}

button:hover {
  opacity: 1;
}

.imgcontainer {
  text-align: center;
  margin: 6px 0 2px 0;
}

img.avatar {
  width: 7%;
  border-radius: 20%;
}

.container {
  width: 400px;
  margin: 0 auto;
  

}

span.psw {
  float: right;
  padding-top: 16px;
}


@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }

}
</style>
</head>
<body>

 <center> <h2>SPK Pemilihan Mahasiswa Berprestasi Tahunan Jurusan Sistem Informasi</h2></center>
 
 <br>
    <br>
    <br>
    <br>

  <form method="post" action="">
    <div class="imgcontainer">
      <img src="img/lo.png" alt="Avatar" class="avatar">
    </div>



    <div class="container">
      <label for="username"><b>Username</b></label>
      <input type="text" placeholder="" name="username" required>

      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="" name="password" required>

      <input type="submit" name="login" value="Login" class="btn">

     

      <?php
        if(!empty($_GET['message'])) {
          echo '<script type="text/javascript">';
            echo 'alert("'. $_GET['message'] .'")';
          echo '</script>';
        }
      ?>

   </div>

   <div class="container" style="background-color:#f1f1f1">

  </div>

  </form>
  

</body>

</html>


