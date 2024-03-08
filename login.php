<?php
    session_start();

    if (isset($_POST['user_name']) && isset($_POST['user_name'])) {

        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $user_name = $_POST['user_name'];
        $pw = $_POST['password'];
        //$pw = password_hash($_POST['password'], PASSWORD_DEFAULT);
        

        if (empty($user_name)) {
            header("Location: login_page.php?error=Identifiant requis");
            exit();
        }else if(empty($pw)){
            header("Location: login_page.php?error=Mot de passe requis");
            exit();
        }else{

            $sql = "SELECT * FROM users WHERE user_name="."'"."$user_name"."'";
            require("ressources/db_connect.inc"); //Se connecte à la base de donnée et créer la variable $mysqli

            $res = mysqli_query($mysqli, $sql);

            if($res===FALSE) die("Erreur : sql n'as pas chargé");
            else {
                while($row = mysqli_fetch_assoc($res)){
                    if(password_verify($pw, $row['pass'])){
                        $user_identified = true;
                        $_SESSION['user_identified'] = true;
                        header("Location: index.php");
                        exit();
                    }
                }
                header("Location: login_page.php?error=Identifiant ou mot de passe incorrecte");
                exit();
            }

        }
    } else {
        header("Location: login_page.php");
        exit();
    }


?>