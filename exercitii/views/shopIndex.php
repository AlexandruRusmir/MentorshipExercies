<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

    include "help/helpers.php";

    if(!isset($_COOKIE['userID']))
    {
        header('Location: loginPage.php');
    }

    $userID = $_COOKIE['userID'];
    $json = file_get_contents(__DIR__ . '\..\storage\users.json');
    $receivedUsers = json_decode($json);

    $currentUser = findELById($userID, $receivedUsers);
    if($currentUser->role == 'admin')
    {
        header('Location: adminViews/adminView.php');
    }
    else
    {
        header('Location: userViews/userView.php');
    }