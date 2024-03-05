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
            <i id="closeLoginBtn" class='bx bx-x' onclick="closeElement('loginForm')"></i>
            <div class="loginWrapper">
                <form action="">
                    <h1>Connexion admin</h1>
                    <div class="inputBox">
                        <i id="userIcon" class='bx bxs-user'></i>
                        <input type="text" placeholder="Identifiant" required>
                    </div>
                    <div class="inputBox">
                        <i id="lockIcon" class='bx bxs-lock' ></i> 
                        <input type="password" placeholder="Mot de passe" required>
                    </div>

                    <button type="submit" class="loginBtn">Se connecter</button>
                </form>
            </div>
        </div>

        <div id="uploadFormWrapper">
            <div>
                <i id="closeUploadFormBtn" class='bx bx-x' onclick="closeElement('uploadFormWrapper')"></i>

                <form method="POST" enctype="multipart/form-data" action="upload.php" id="uploadForm">
                    <input type="file" id="file-input"  name="file" accept="application/pdf" multiple>
                    <label for="file-input" id="file-input-label"><p>Choisir un fichier</p><i class='bx bx-upload'></i></label>


                    <input type="submit" value="Confirmer" id="submitBtn">
                </form>
            </div>
        </div>

        <header>
            <div class="navbar">
                <img class="logo" src="logo_Standre.png" alt="Logo de Saint Andre">
                <h1 class="title">Dépot de délibérations</h1>
                <div class="adminButton">
                    <div onclick="showElement('loginForm')">
                        Login admin
                    </div>
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
                    <input type="text" id="...SearchBar" onkeyup="" placeholder="...">
                    <input type="text" id="...SearchBar" onkeyup="" placeholder="...">
                    <input type="text" id="...SearchBar" onkeyup="" placeholder="...">
                </div>
            </div>
            
            <ul class="PDFlist" id="PDFlist">
                <li class="info-pdf-header" id="rowTitle">
                    <div class="fileName"><p>Nom</p></div>
                    <p>Conseil</p>
                    <p>Thème</p>
                    <p>Date d'importation</p>
                    <p>Tag</p>
                </li>
            <?php
                if(!isset($_POST["directory"])){
                    $_POST["directory"] = "stock"
                    $files = scandir($_POST["directory"]);
                }
                for ($a = 2; $a < count($files); $a++) {
                    if(is_dir($_POST['directory'].'/'.$files[$a])){
            ?>
                <li class="info-pdf" onclick="<?php $directory = $files[$a]; header("Refresh:0");?>">
                    <div class="fileName">
                        <p><?php echo explode('.',$files[$a])[0]?></p>
                    </div>

                    <!--
                    <div>
                        <i class='bx bx-x'></i>
                        <i class='bx bxs-edit-alt' ></i>
                    </div>
                    -->

                    <p>Dossier</p>
                </li>

            <?php
                    } else {
            ?>
                <li class="info-pdf">
                    <div class="fileName">
                        <p><?php echo explode('.',$files[$a])[0]?></p>
                    </div>

                    <p class="conseil">#CONSEIL</p>

                    <p class="theme">#THEME</p>

                    <div><div class="dmY"><?php echo date("d/m/Y",filemtime("stock/".$files[$a])) ?></div><div class="Hmin"><?php echo date("H:i",filemtime("stock/".$files[$a])) ?></div></div>

                    <!--
                    <div>
                        <a class="downloadBtn" download="<?php echo $files[$a] ?>" href="stock/<?php echo $files[$a] ?>">
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
            }
            ?>

            </ul>

            <?php echo password_hash("rama", PASSWORD_DEFAULT) ?>
        </div>

    </body>
</html>
