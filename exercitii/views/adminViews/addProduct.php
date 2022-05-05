<?php
include_once "../help/helpers.php";
$message = '';

$json = file_get_contents(__DIR__ . '\..\..\storage\products.json');
$receivedProducts = json_decode($json);

if (isset($_POST['submit']))
{
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $pictureURL = $_POST['picture'];

    $foundName = false;
    forEach($receivedProducts as $product)
    {
        if($product->name == $name)
        {
            $message = '<p class="mt-4" style="color: #FF0000FF">A product with this name already exists!</p>';
            $foundName = true;
        }
    }
    if(!$foundName)
    {
        addProductToJSON($name, $price, $quantity, $pictureURL, __DIR__ . '\..\..\storage\products.json', $receivedProducts);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../styles/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Add product</title>
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
            <input class="py-2 mb-3" type="text" style="width: 100%" id="price" name="price" placeholder="Price" required/>
            <br>
            <input type="text" type="number" id="quantity" name="quantity" placeholder="Quantity" required/>
            <br>
            <input type="url" class="mt-2 py-2 mb-3" id="picture" style="width: 100%" name="picture" placeholder="Picture URL" required/>
            <br>

            <?php
                echo $message;
            ?>
            <input type="submit" name='submit' class="btn btn-success px-5 mt-5 mb-3"/>
        </form>
    </div>
</div>

<?php
    include "../footer.php";
?>

</body>
</html>