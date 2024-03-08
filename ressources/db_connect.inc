<?php
    //code de connexion à la base de donner
    
    $db = parse_ini_file("config/db.ini");

    $mysqli = mysqli_connect("localhost",
                                     $db['login'],
                                     $db['pass'],
                                     $db['base']);
            
    if($mysqli===FALSE){
        die("Erreur : Connexion impossible");
    }
?>