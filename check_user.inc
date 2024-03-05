<?php
    session_start();

    if(isset($_SESSION['user_identified']) && $_SESSION['user_identified'] === true){
        $user_identified = true;
    } else {

    $user_identified = false;

    if(isset($_POST["login"])){

        if(isset($_POST["mdp"])){

            if($_POST['login']=='' || $_POST['mdp']==''){
                echo "<br/>Erreur : vous devez remplir tous les champs ! <br/>";
            } else {
                
                $sql = "SELECT * FROM users WHERE 
                    user_name="."'".$_POST['login']."'"." AND ".
                    "password="."'".$_POST['mdp']."'";

                require("db_connect.inc"); //-> fixe $mysql
                $resultat = mysqli_query($mysqli, $sql);
                if($resultat===FALSE) die("Erreur : sql n'as pas chargé");
                else {
                    if(mysqli_fetch_assoc($resultat) === NULL){
                        echo "Erreur d`identification";
                    } else {
                        $user_identified = true;
                        $_SESSION['user_identified'] = true;
                        $_SESSION['login'] = $_POST['login'];
                        $affiche_form = false;
                        echo "Vous êtes maintenant identifié";
                    }
                }
            }
        }
    }
    }

?>