<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <script src="script.js"></script>
        <title>Délibérations</title>
    </head>
    <body>

        <div id="loginForm">
            <i class='bx bx-x' onclick="closeLogin()"></i>
            <div class="loginWrapper">
                <form action="">
                    <h1>Connexion admin</h1>
                    <div class="inputBox">
                        <input type="text" placeholder="Identifiant" required>
                    </div>
                    <div class="inputBox">
                        <input type="password" placeholder="Mot de passe" required>
                    </div>

                    <button type="submit" class="loginBtn">Se connecter</button>
                </form>
            </div>
        </div>

        <header>
            <div class="navbar">
                <img class="logo" src="logo_Standre.png">
                <h1 class="title">Dépot de délibérations</h1>
                <div class="adminButton">
                    <div onclick="showLogin()">
                        Login admin
                    </div>
                </div>
            </div>
        </header>

        

        <div class="main">


            <form method="POST" enctype="multipart/form-data" action="upload.php">
                <input type="file" name="file">
                <input type="submit" value="Upload">
            </form>

            <ul class="PDFlist">
            <?php
                $files = scandir("stock");
                for ($a = 2; $a < count($files); $a++) {
            ?>
                <li class="info-pdf">
                    <div>
                        <p><?php echo $files[$a] ?></p>
                        <a class="downloadBtn" download="stock/<?php echo $files[$a] ?>" href="stock/<?php echo $files[$a] ?>">
                            <i class='bx bxs-download'></i> 
                        </a>
                        <i class='bx bx-x'></i>
                        <i class='bx bxs-edit-alt' ></i>
                    </div>

                    <div><div id="dmY"><?php echo date("d/m/Y",filemtime("stock/".$files[$a])) ?></div><div id="Hmin"><?php echo date("H:i",filemtime("stock/".$files[$a])) ?></div></div>
                </li>
            <?php        
                }

            ?>

            </ul>
        </div>

    </body>
</html>
