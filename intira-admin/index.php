<?php
    session_start();
    include_once '../vendor/autoload.php';
    include_once './config/global.php';
    include_once './config/config.php';
    include_once './includes/tbl_user.inc.php';
?>

<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Intira Login</title>
  <link rel="stylesheet" href="assets/cs/style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

<?php
    //$pesan = '';
    if (isset($_POST['login'])) {
        $_SESSION['user_id'] = $_POST['user_id'];
        $_SESSION['user_password'] = $_POST['user_password'];
        
        
        
        $config = new Config();
        $db = $config->getConnection($db_name,$host);
        
        $commando = new Tbl_User($db);
        $commando->user_nik = $_POST['user_id'];
        $commando->user_pass = $_POST['user_password'];
        
        if($commando->Login($db_name)){
            echo "<script>location.href='home.php'</script>";
        } else{
            echo "<script>alert('NIK dan Password Salah!')</script>";
            echo "<script>location.href='index.php'</script>";
        }
    }
?>
<div class="login">
  <h2 class="active"> sign in </h2>
  <form method="POST">
    <input type="text" class="text" name="user_id" id="user_id">
        <span>NIK</span>
    <br>  
    <br>
    <br>
    <input type="password" class="text" name="user_password" id="user_password">
        <span>password</span>
    <br>

    <input type="checkbox" id="checkbox-1-1" class="custom-checkbox" />
    <label for="checkbox-1-1">Keep me Signed in</label>
    
    <button class="signin" name="login" id="login">
      Masuk
    </button>
        <a href="lupapassword.php">Lupa Password</a>
    <hr>
    <br>
        <a href="registrasi.php">Daftar</a>
  </form>
    
</div>
<!-- partial -->
  <script src="assets/js/script.js"></script>

</body>
</html>
