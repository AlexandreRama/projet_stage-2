<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <script src="script.js"></script>
        <title>Délibérations</title>
    </head>
    <body>
        
        <div id="uploadFormWrapper">
            <div>
                <i id="closeUploadFormBtn" class='bx bx-x' onclick="closeElement('uploadFormWrapper')"></i>

                <form method="POST" enctype="multipart/form-data" action="upload.php" id="uploadForm">
                    <input type="file" id="file-input"  name="file-input" accept="application/pdf" multiple>
                    <label for="file-input" id="file-input-label"><p>Choisir un fichier</p><i class='bx bx-upload'></i></label>

                    <input type="text" id="conseil-input" name="conseil-input" placeholder="conseil">
                    <input type="text" id="theme-input" name="theme-input" placeholder="thèmes (thème1, thème2,...)">

                    <input type="submit" value="Confirmer" id="submitBtn">
                </form>

            </div>
        </div>

        <header>
            <div class="navbar">
                <img class="logo" src="logo_Standre.png" alt="Logo de Saint Andre">
                <h1 class="title">Dépot de délibérations</h1>
                <div class="adminButton">
                <?php
                    if(isset($_SESSION['user_identified']) && $_SESSION['user_identified']){
                ?>
                    <a>
                        <i class='bx bxs-user-check' ></i>
                    </a>
                    <a href="logout.php">
                        <i class='bx bx-log-out-circle' ></i>
                    </a>
                <?php
                    } else {
                ?>
                    <a href="login_page.php">
                        <i class='bx bxs-user-circle' ></i>
                    </a>
                <?php
                    }
                ?>

                </div>
            </div>
        </header>

        <div class="main">

            <div onclick="showElement('uploadFormWrapper')" id="openUploadFormBtn">
                Importer un fichier
            </div>

            <div id="filterBar">
                <p>filtrer :</p>
                <div>
                    <input type="text" id="nameSearchBar" onkeyup="filter('nameSearchBar')" placeholder="Nom du fichier">
                    <input type="text" id="dateSearchBar" onkeyup="filter('dateSearchBar')" placeholder="Jour/Mois/Année">
                    <input type="text" id="themeSearchBar" onkeyup="filter('themeSearchBar')" placeholder="Thème">
                    <input type="text" id="...SearchBar" onkeyup="" placeholder="...">
                    <input type="text" id="...SearchBar" onkeyup="" placeholder="...">
                </div>
            </div>
            
            <ul class="dirList" id="stock">
                
            <?php
                $dir = scandir("stock");
                for ($a = 2; $a < count($dir); $a++) {
            ?>
                <li class="info-dir" onclick='switchDirectory("<?php echo $dir[$a]; ?>", "stock")'>
                    <div class="fileName">
                        <p><?php echo explode('.',$dir[$a])[0];?></p>
                    </div>
                    <p class="nbDelib">Nombre de délibération: <?php echo count(scandir("stock/".$dir[$a]))-2;?></p>
                    <!--
                    <div>
                        <i class='bx bx-x'></i>
                        <i class='bx bxs-edit-alt' ></i>
                    </div>
                    -->

                </li>
            <?php        
                }
            ?>
            </ul>
            <?php

                for ($a = 2; $a < count($dir); $a++){
                    $files = scandir("stock/".$dir[$a]);
                    
            ?>
                    <div  class="PDFlist" id="<?php echo $dir[$a]; ?>">

                    <i class='bx bx-left-arrow-alt' onclick="switchDirectory('stock','<?php echo $dir[$a]; ?>')"></i>

                    <ul>
                        <li class="info-pdf-header" id="rowTitle">
                            <div class="fileName"><p>Nom</p></div>
                            <p>Conseil</p>
                            <p>Thème</p>
                            <p>Date d'importation</p>
                            <p>Tag</p>
                        </li>

            <?php
                    for ($b = 2; $b < count($files); $b++){
            ?>
                    
                        <li class="info-pdf">
                            <div class="fileName">
                                <p><?php echo explode('.',$files[$b])[0];?></p>
                            </div>

                            <p class="conseil"><?php echo $dir[$a] ?></p>

                            <p class="theme">#THEME</p>

                            <div><div class="dmY"><?php echo date("d/m/Y",filemtime("stock/".$dir[$a].'/'.$files[$b])); ?></div><div class="Hmin"><?php echo date("H:i",filemtime("stock/".$dir[$a].'/'.$files[$b])); ?></div></div>

                            <!--
                            <div>
                                <a class="downloadBtn" download="<?php echo $files[$b]; ?>" href="stock/<?php echo $files[$b]; ?>">
                                    <i class='bx bxs-download'></i> 
                                </a>
                                <i class='bx bx-x'></i>
                                <i class='bx bxs-edit-alt' ></i>
                            </div>
                            -->

                            <p class="tag">#TAGS</p>
                        </li>

            <?php
                    }
            ?>
                    </ul>
                    </div>
            <?php
                }
            ?>

        </div>

    </body>
</html>
