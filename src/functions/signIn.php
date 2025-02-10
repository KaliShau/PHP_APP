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

  $stmt = mysqli_prepare($connect, "SELECT * FROM users WHERE login = ? AND password = ?");
  mysqli_stmt_bind_param($stmt, "ss", $login, $password);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if ((mysqli_num_rows($result) == 0)) {
    $_SESSION['error'] = 'Пользователь не найден';
    header("Location: ../../index.php");
    exit();
  }
  
  $user = mysqli_fetch_assoc($result);
  $_SESSION['user'] = $user;
  mysqli_stmt_close($stmt);
  
  header("Location: ../pages/home.php");
?>

<pre><?php print_r($_SESSION['user']) ?></pre>