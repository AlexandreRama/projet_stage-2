<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Délibérations</title>
    </head>
    <body>
        <!--
        <header>
            <div class="navbar">
                <img class="logo" src="logo_Standre.png">
                <h1 class="title">Dépot de délibérations</h1>
                <div class="adminButton">
                    <div>
                        Login admin
                    </div>
                </div>
            </div>
        </header>
        -->
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
                    <li>
                        <a href="stock/<?php echo $files[$a] ?>"><?php echo $files[$a] ?></a>
                    </li>
                <?php        
                    }

                ?>

                    <li></li>
                    <li></li>
                </ul>
            </div>

    </body>
</html>
