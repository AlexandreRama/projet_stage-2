<?php

session_start();

$_SESSION['user_identified']=false;

header("Location: index.php");


?>