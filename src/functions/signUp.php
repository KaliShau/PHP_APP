<?php 
  
  session_start();

  $connect = require_once('./db.php');

  $login = $_POST['login'];
  $password = $_POST['password'];
  $name = $_POST['name'];

  if (empty($login) || empty($password) || empty($name)) {
    $_SESSION['error'] = 'Все поля обязательны';
    header("Location: ../pages/signUp.php");
    exit();
  }

  mysqli_query($connect,"INSERT INTO users(name, login, password) VALUE('$name', '$login', '$password');");

  $check_user = mysqli_query($connect, "SELECT * FROM users WHERE login = '$login' AND password = '$password';");
  
  if ((mysqli_num_rows($check_user) == 0)) {
    $_SESSION['error'] = 'Ошибка в запросе';
    header("Location: ../pages/signUp.php");
    exit();
  }
  
  $user = mysqli_fetch_assoc($check_user);
  $_SESSION['user'] = $user;
  header("Location: ../pages/home.php");
?>
