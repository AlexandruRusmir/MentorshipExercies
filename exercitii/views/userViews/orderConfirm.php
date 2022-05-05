<?php

function decrementStock($path)
{
    $json = file_get_contents($path);
    $receivedProducts = json_decode($json);
    $cartProducts = $_SESSION['products'];

    for($i=0; $i<sizeof($receivedProducts); $i++)
    {
        for($j=0; $j<sizeof($cartProducts); $j++)
        {
            if($receivedProducts[$i]->id == $cartProducts[$j]->id)
            {
                $receivedProducts[$i]->quantity -= $cartProducts[$j]->wantToBuy;
            }
        }
    }

    $jsonData = json_encode($receivedProducts);
    file_put_contents($path, $jsonData);
}
    session_start();

    include_once "../help/helpers.php";



    if(isset($_POST['buy']))
    {
        decrementStock(__DIR__ . '\..\..\storage\products.json');
        unset($_SESSION['products']);
        header("Location: userView.php");
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
        VVelcome, let me take your $!
    </h1>
    <?php

    if($_SESSION['products'])
    {
        $sessionProducts = $_SESSION['products'];
        $totalPrice = 0.0;
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
            $wantToBuy = $product->wantToBuy;

            $totalPrice += $price * $wantToBuy;
            echo "
                        <tr>
                            <td><img src='${picture}' height=70 width=70 style='border-radius:50%'/></td>
                            <td>${name}</td>
                            <td>${price}$</td>
                            <td>${wantToBuy}</td>
                        </tr>
                        ";
        }
        echo "</tbody></table>
                        <form method='post' style='width: 100%; display: flex'>
                            <input type='submit' name='buy'
                                style='border-radius: 20px; width: 200px; margin: 0 auto' class='btn-success p-1 my-4' value='Buy products'/>
                        </form>";

        echo "<div>
                <h4>Total price: ${totalPrice}$</h4>
              </div>";
    }
    ?>

</div>
<?php
include "../footer.php";
?>
</body>
</html>