<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function addProductToCart(string $productID, array &$products, array $allProducts)
{
    $product = findELById($productID, $allProducts);
    if(findELById($productID, $products))
    {
        forEach($products as $product)
        {
            if($product->id == $productID)
            {
                $product->wantToBuy += 1;
            }
        }
    }
    else
    {
        $product->wantToBuy = 1;
        array_push($products, $product);
    }
    $_SESSION['products'] = $products;
}

function removeProductToCart(string $productID, array &$products)
{
    for($i=0; $i<sizeof($products); $i++)
    {
        if($products[$i]->id == $productID)
        {
            unset($products[$i]);
            $products = array_values($products);
        }
    }
    $_SESSION['products'] = $products;
}


    session_start();

    include_once "../help/helpers.php";

    if(!isset($_SESSION['products']))
    {
        $_SESSION['products'] = [];
    }
    $json = file_get_contents(__DIR__ . '\..\..\storage\products.json');
    $receivedProducts = json_decode($json);
    $sessionProducts = $_SESSION['products'];

    if(isset($_POST['addProduct']))
    {
        addProductToCart(getLastItemFromStringBySeparator($_POST['addProduct'], ':'), $sessionProducts, $receivedProducts);
    }
    if(isset($_POST['remove']))
    {
        removeProductToCart(getLastItemFromStringBySeparator($_POST['remove'], ':'), $sessionProducts);
    }
    if(isset($_POST['buy']))
    {
        $_SESSION['products'] = $sessionProducts;
        header("Location: orderConfirm.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../styles/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Shop</title>
</head>
<body>

<?php
    include_once "userHeader.php";
?>

<div class="container">
    <h1>
        VVelcome!
    </h1>
    <?php
    if($receivedProducts)
    {
        echo "<div class='row py-5'>";
        for($i=0; $i<sizeof($receivedProducts); $i++)
        {
            $product = $receivedProducts[$i];

            $id = $product->id;
            $picture = $product->pictureURL;
            $name = $product->name;
            $price = $product->price;
            $quantity = $product->quantity;


            echo "
                    <div class='col-sm-4'>
                        <div class='p-3 mb-2 custom-service'>
                            <h4>${name}</h4>
                            <img src='${picture}' height=80 width=80 style='border-radius:50%'/>
                            <br>
                            <p class='mt-3 mb-4'>Available: ${quantity}</p>
                            
                            <form method='post'>
                                <button type='submit'
                                        style='border-radius: 20px' class='btn-info'> Add to cart!
                                </button>
                                <input type='hidden' name='addProduct'
                                         value='${name}, id:${id}'/>
                            </form>
                        </div>
                    </div>
                    ";
        }
        echo "</div>";
    }

    if($sessionProducts)
    {
        echo '<table class="table-content">
            <tr>
                <th>Product</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>
            <tbody>';
        forEach($sessionProducts as $product)
        {
            $picture = $product->pictureURL;
            $name = $product->name;
            $price = $product->price;
            $id = $product->id;
            $wantToBuy = $product->wantToBuy;

            echo "
                        <tr>
                            <td><img src='${picture}' height=70 width=70 style='border-radius:50%'/></td>
                            <td>${name}</td>
                            <td>${price}$</td>
                            <td>${wantToBuy}</td>
                            <td>
                                <form method='post' style='width: 100%'>
                                    <button type='submit'
                                        style='border-radius: 20px' class='btn-danger'> Delete
                                    </button>
                                    <input type='hidden' name='remove'
                                             value='${name}, id:${id}'/>
                                </form>
                            </td>
                        </tr>
                        ";
        }
        echo "</tbody></table>
                        <form method='post' style='width: 100%'>
                            <input type='submit' name='buy'
                                style='border-radius: 20px; width: 200px; text-align: center' class='btn-success p-1 my-4' value='Buy products'/>
                        </form>";
    }
    ?>
</div>
<?php
    include "../footer.php";
?>
</body>
</html>