<?php 

$file = $_FILES["file-input"];

$conseil = $_POST['conseil-input'];

move_uploaded_file($file["tmp_name"], "stock/" . $conseil . "/" . $file["name"]);

header("Location: index.php");

?>