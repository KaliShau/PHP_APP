<?php 
  
  session_start();

  $connect = require_once('./db.php');

  $title = $_POST['title'];
  $content = $_POST['content'];
  $image = $_FILES['image'];

  if (empty($title) || empty($content)) {
    $_SESSION['error'] = 'Все поля обязательны';
    header("Location: ../pages/createPost.php");
    exit();
  }

  if ($image['error'] === !UPLOAD_ERR_OK) {
    $_SESSION['error'] = 'Ошибка загрузки изображения';
    header("Location: ../pages/createPost.php");
    exit();
  }

  if (!is_dir('../../uploads')) {
    mkdir('../../uploads', 0755, true);
  }
  
  $new_image_name = uniqid("IMG-", true) . '.' . pathinfo($image['name'], PATHINFO_EXTENSION);
  $upload_path = '../../uploads/' . $new_image_name;
  
  if (move_uploaded_file($image['tmp_name'], $upload_path)) {
    $image_url = '/uploads/' . $new_image_name;
    $user_id = $_SESSION['user']['id']; 


    $stmt = mysqli_prepare($connect, "INSERT INTO posts (title, content, image, user_id) VALUE (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sssi", $title, $content, $image_url, $user_id); 
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../pages/posts.php");
    exit();
  } else {
    $_SESSION['error'] = 'Ошибка при перемещении файла на сервер.';
    header("Location: ../pages/createPost.php");
    exit();
  }

  $_SESSION['error'] = 'Ошибка.';
  exit();
?>
