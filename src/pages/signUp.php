<?php 
    session_start();

    if ($_SESSION['user']) {
      header('Location: ./home.php');
    };
?>

<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/auth.scss"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <title>PHP</title>
</head>
<body class="bg-image">
    
    <!-- SignUp form -->
     
    <h1>Форма регистрации</h1>
    <form action='../functions/signUp.php' method='POST'>
        <label>Имя</label>
        <input name="name" type="text" placeholder="Введите имя">

        <label>Логин</label>
        <input name="login" type="text" placeholder="Введите логин">

        <label>Пароль</label>
        <input name="password" type="password" placeholder="Введите пароль">
        <button type="submit">Зарегистрироваться</button>

        <a href="../../index.php">Переход ко входу</a>

        <?php if ($_SESSION['error']) {
            echo '<p>'. $_SESSION['error'] .'</p>';
            unset($_SESSION['error']);
        } 
        ?>
    </form>

</body>
</html>