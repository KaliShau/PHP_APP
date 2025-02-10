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

  // get user by login

  $stmt = mysqli_prepare($connect, "SELECT * FROM users WHERE login = ?");
  mysqli_stmt_bind_param($stmt, "s", $login);
  mysqli_stmt_execute($stmt);
  $oldUser = mysqli_stmt_get_result($stmt);

  if ((mysqli_num_rows($oldUser) > 0)) {
    $_SESSION['error'] = 'Ошибка в запросе';
    header("Location: ../pages/signUp.php");
    exit();
  }

  mysqli_stmt_close($stmt);

  // create user

  $stmt = mysqli_prepare($connect, "INSERT INTO users (name, login, password) VALUES (?, ?, ?)");
  mysqli_stmt_bind_param($stmt, "sss", $name, $login, $password);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  // sign in

  $stmt = mysqli_prepare($connect, "SELECT * FROM users WHERE login = ?");
  mysqli_stmt_bind_param($stmt, "s", $login);
  mysqli_stmt_execute($stmt);
  
  $result = mysqli_stmt_get_result($stmt);
  
  if ((mysqli_num_rows($result) == 0)) {
    $_SESSION['error'] = 'Ошибка в запросе';
    header("Location: ../pages/signUp.php");
    exit();
  }
  
  $user = mysqli_fetch_assoc($result);
  $_SESSION['user'] = $user;
  mysqli_stmt_close($stmt);

  header("Location: ../pages/home.php");
?>
