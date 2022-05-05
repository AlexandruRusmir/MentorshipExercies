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
    $name = $_POST['name'];
    $password = md5($_POST['password']);
    $confirmPassword = md5($_POST['confirmPassword']);

    if($password == $confirmPassword)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $message = '<p class="mt-4" style="color: #FF0000FF">That is not a valid e-mail. Try again.</p>';
        } else
        {
            try {
                $json = file_get_contents(__DIR__ . '\..\storage\users.json');
                $receivedUsers = json_decode($json);

                $takenEmail = false;
                if ($receivedUsers)
                {
                    foreach ($receivedUsers as $user)
                    {
                        if ($user->email == $email)
                        {
                            $message = '<p style="color: #FF0000FF">This e-mail is already linked to another account!</p>';
                            $takenEmail = true;
                        }
                    }
                }
                if(!$takenEmail)
                {
                    addUserToJSON($name, $email, $password, __DIR__ . '\..\storage\users.json', $receivedUsers);
                    if(isset($_POST['remember']))
                    {
                        setcookie('userID', findIdByEmail($email, $receivedUsers), time() + (86400 * 14), "/");
                    }
                    else
                    {
                        setcookie('userID', findIdByEmail($email, $receivedUsers), time() + 3600, "/");
                    }
                    header('Location: shopIndex.php');
                }

            } catch (Exception $e)
            {
                $message = 'error: ' . $e->getMessage() . ' in file ' . $e->getFile() . ' on line ' . $e->getLine();
            }
        }
    }
    else
    {
        $message = '<p style="color: #FF0000FF">Confirmed password is not the same as the password</p>';
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
        Register
    </h1>

    <div class="form-container">
        <form action="" method="post">
            <input type="text" id="name" name="name" placeholder="Name" required/>
            <br>
            <input type="text" id="email" name="email" placeholder="E-mail" required/>
            <br>
            <input style="width: 100%" type="password" id="password" name="password" placeholder="Password" required/>
            <br>
            <input style="width: 100%" class="mt-3" type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm password" required/>
            <br>
            <label class="mt-3">Remember me?</label>
            <input type="checkbox" name="remember">
            <br>
            <?php
            echo $message;
            ?>
            <input type="submit" name='submit' class="btn btn-success px-5 mt-5 mb-3"/>
        </form>
    </div>
</div>

<?php
include "footer.php";
?>

</body>
</html>