<?php 
  session_start();

  $connect = require_once("../functions/db.php");

  if (!$_SESSION['user']) {
    header('Location: ../../index.php');
     exit();
  };
?>

<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.scss"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <title>PHP</title>
</head>
<body >
    
  <aside>
    <img src="../assets/icons/crow.png" width="100px" alt="">
    <a href="./home.php">Home</a>
    <a href="./posts.php">Posts</a>
    <a href="./createPost.php">Create post</a>
  </aside>
  
  <main>
  <h1>Create post</h1>
    <form class="form" action='../functions/createPost.php' method='POST' enctype="multipart/form-data">
      <div>

        <label>Загаловок</label>
        <input name="title" type="text" placeholder="Введите загаловок">
        
        <label>Содержание</label>
        <input name="content" type="text" placeholder="Напишите содержание">
        
        <label>Картинка</label>
        <input name="image" type="file" placeholder="Напишите содержание">
        <button type="submit">Войти</button>
        
        <?php if ($_SESSION['error']) {
          echo '<p>'. $_SESSION['error'] .'</p>';
          unset($_SESSION['error']);
        } 
        ?>
      </div>
    </form>
  </main>

</body>
</html>