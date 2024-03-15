<?php
    $dir = $_POST['directoryName-input'];

    mkdir("stock/".$dir, 0755, true);

    header("Location: index.php")
?>