<?php
    session_start();
    include 'ressources/db_connect.inc'; //Se connecte à la base de donnée et créer la variable $mysqli

    if (isset($_POST['user_name']) && isset($_POST['user_name'])) {

        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $user_name = validate($_POST['user_name']);
        $pw = $_POST['password'];
        //$pw = password_hash($_POST['password'], PASSWORD_DEFAULT);
        

        if (empty($user_name)) {
            header("Location: login_page.php?error=Identifiant requis");
            exit();
        }else if(empty($pw)){
            header("Location: login_page.php?error=Identifiant requis");
            exit();
        }else{

            $sql = "SELECT * FROM users WHERE user_name='$user_name'";

            $res = mysqli_query($mysqli, $sql);

            if($res===FALSE) die("Erreur : sql n'as pas chargé");
            else {
                if(mysqli_fetch_assoc($res) === NULL){
                    header("Location: login_page.php?error=Indentifiant incorrecte");
                    exit();
                } else {
                    $row = mysqli_fetch_assoc($res);
                    if($wd === $row['pass']){
                        $user_identified = true;
                        $_SESSION['user_identified'] = true;
                        header("Location: index.php");
                        exit();
                    } else {
                        header("Location: login_page.php?error=Mot de passe incorrecte");
                        exit();
                    }
                    
                }
            }

        }
    } else {
        header("Location: login_page.php");
        exit();
    }


?>