<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login_page.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>login</title>
</head>
<body>

    <div class="loginWrapper">
        <form action="login.php" method="POST">
            <h1>Connexion admin</h1>

            <?php if (isset($_GET['error'])){ ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>

            <div class="inputBox">
                <i id="userIcon" class='bx bxs-user'></i>
                <input type="text" name="user_name" placeholder="Identifiant"autocomplete="off">
            </div>
            <div class="inputBox">
                <i id="lockIcon" class='bx bxs-lock' ></i>
                <input type="password" name="password" placeholder="Mot de passe" autocomplete="off">
            </div>

            <button type="submit" class="loginBtn">Se connecter</button>
        </form>
        <a class="returnBtn" href="index.php">
            annuler
        </a>
    </div>

</body>
</html>