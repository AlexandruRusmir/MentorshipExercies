<?php

$message = '';

$json = file_get_contents(__DIR__ . '\..\..\storage\products.json');
$receivedProducts = json_decode($json);

$name = $_POST['name'];
$price = $_POST['price'];

if (isset($_POST['submit']))
{

    addUserToJSON($name, $email, $password, __DIR__ . '\..\storage\users.json', $receivedUsers);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../styles/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Link form</title>
</head>
<body>

<?php
require "adminHeader.php";
?>

<div class="container">
    <h1>
        Add a product
    </h1>

    <div class="form-container">
        <form action="" method="post">
            <input type="text" id="name" name="name" placeholder="Name" required/>
            <br>
            <input class="py-2 mb-3" type="number" style="width: 100%" id="price" name="price" placeholder="Price" required/>
            <br>
            <input type="text" id="quantity" name="quantity" placeholder="Quantity" required/>
            <br>
            <input type="text" id="picture" name="picture" placeholder="Picture URL" required/>
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