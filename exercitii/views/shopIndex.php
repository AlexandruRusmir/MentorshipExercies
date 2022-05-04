<?php

    include "help/helpers.php";

    if(!isset($_COOKIE['userID']))
    {
        header('Location: loginPage.php');
    }

    $userID = $_COOKIE['userID'];
    $json = file_get_contents(__DIR__ . '\..\storage\users.json');
    $receivedUsers = json_decode($json);

    $currentUser = findUserById($userID, $receivedUsers);
    if($currentUser->role == 'admin')
    {
        header('Location: adminViews/adminView.php');
    }
    else
    {
        include "userView.php";
    }