<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_COOKIE['userID']))
{
    header('Location: shopIndex.php');
}

include_once "help/helpers.php";

$message = '';
$message2 = '';
if (isset($_POST['submit']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];


    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $message = '<p class="mt-4" style="color: #FF0000FF">That is not a valid e-mail. Try again.</p>';
    }
    else
    {
        try
        {
            $json = file_get_contents(__DIR__ . '\..\storage\users.json');
            $receivedUsers = json_decode($json);

            forEach($receivedUsers as $user)
            {
                if($user->email == $email)
                {
                    if($user->password == md5($password))
                    {
                        if(isset($_POST['remember']))
                        {
                            setcookie('userID', $user->id, time() + (86400 * 14), "/");
                        }
                        else
                        {
                            setcookie('userID', $user->id, time() + 3600, "/");
                        }
                        header('Location: shopIndex.php');
                    }
                    else
                    {
                        $message = '<p class="mt-4" style="color: #FF0000FF">A different password is linked to this account! Try again.</p>';
                    }
                }
            }

        }
        catch (Exception $e)
        {
            $message = 'error: ' . $e->getMessage() . ' in file ' . $e->getFile() . ' on line ' . $e->getLine();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Link form</title>
</head>
<body>

<?php
require "header.php";
?>

<div class="container">
    <h1>
        Login
    </h1>

    <div class="form-container">
        <form action="" method="post">
            <input type="text" id="email" name="email" placeholder="E-mail"/>
            <br>
            <input style="width: 100%" type="password" id="password" name="password" placeholder="Password"/>
            <br>
            <label class="mt-3">Remember me?</label>
            <input type="checkbox" name="remember">
            <p class="mt-3">Don't have an account? <a href="register.php">Register here!</a></p>
            <br>
            <?php
                echo $message;
            ?>
            <input type="submit" name='submit' style="margin: 0 auto" class="btn btn-success px-5 mt-3 mb-3"/>
        </form>
    </div>
</div>

<?php
include "footer.php";
?>

</body>
</html>