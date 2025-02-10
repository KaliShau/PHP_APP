<?php 
  session_start();

  if (!$_SESSION['user']) {
    header('Location: ../../index.php');
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
    <h1>My user</h1>

    <div>
      <div class="data-user">
        <?php 
        echo "<p>Имя: " . $_SESSION['user']['name'] . "</p>";
        echo "<p>Логин: " . $_SESSION['user']['login'] . "</p>";
        echo "<p>Пароль: " . $_SESSION['user']['password'] . "</p>";
        ?>
      </div>
      <form action="../functions/signOut.php">
        <button>Выход</button>
      </form>
    </div>
  </main>

</body>
</html>