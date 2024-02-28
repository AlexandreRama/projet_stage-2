<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Délibérations</title>
    </head>
    <body>

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
                        <p><?php echo $files[$a] ?></p>
                        <div class="downloadButton">
                            <a download="stock/<?php echo $files[$a] ?>" href="stock/<?php echo $files[$a] ?>">Télécharger</a>
                        </div>
                        <p><?php echo date("d/m/Y H:i.",filemtime("stock/".$files[$a])) ?></p>
                    </li>
                <?php        
                    }

                ?>

                </ul>
            </div>

    </body>
</html>
