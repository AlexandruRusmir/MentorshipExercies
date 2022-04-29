<?php
    include_once "help/helpers.php";
    $post = $_POST;

    echo appendToFile('mesaj', $post['path']);