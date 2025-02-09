<?php 
  
  session_start();

  $connect = require_once('./db.php');

  $login = $_POST['login'];
  $password = $_POST['password'];

  if (empty($login) || empty($password)) {
    $_SESSION['error'] = 'Логин и пароль обязательны';
    header("Location: ../../index.php");
    exit();
}

  $check_user = mysqli_query($connect, "SELECT * FROM users WHERE login = '$login' AND password = '$password';");
  
  if ((mysqli_num_rows($check_user) == 0)) {
    $_SESSION['error'] = 'Пользователь не найден';
    header("Location: ../../index.php");
    exit();
  }
  
  $user = mysqli_fetch_assoc($check_user);
  $_SESSION['user'] = $user;
  header("Location: ../pages/home.php");
?>

<pre><?php print_r($_SESSION['user']) ?></pre>