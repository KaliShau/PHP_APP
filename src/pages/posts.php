<?php 
  session_start();

  $connect = require_once("../functions/db.php");

  if (!$_SESSION['user']) {
    header('Location: ../../index.php');
     exit();
  };

  $result = mysqli_query($connect, 'SELECT * FROM posts;');

  $posts = []; 
  while ($row = mysqli_fetch_assoc($result)) {
    $posts[] = $row; 
  }
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
  </aside>
  
  <main>
  <h1>Posts</h1>

  <?php 
  
    foreach ($posts as $post) {
      echo '<div class="post">';
      echo '<img src="' . $post['image'] . '" alt="" />';
      echo '<label>' . $post['title'] . '</label>';
      echo '<p>'. $post['content'] . '</p>';
      echo '</div>';
    }

  ?>
  </main>

</body>
</html>