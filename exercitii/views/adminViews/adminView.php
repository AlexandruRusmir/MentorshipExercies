<?php
$json = file_get_contents(__DIR__ . '\..\..\storage\products.json');
$receivedProducts = json_decode($json);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../styles/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Admin Page</title>
</head>
<body>

    <?php
        require "adminHeader.php";
    ?>

    <div class="container">
        <h1>
            Products list
        </h1>
        <table class="table-content">
            <tr>
                <th>Product</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>
            <tbody>
            <?php
                if($receivedProducts)
                {
                    forEach($receivedProducts as $product)
                    {
                        $picture = $product->pictureURL;
                        $name = $product->name;
                        $price = $product->price;
                        $quantity = $product->quantity;

                        echo "
                        <tr>
                            <td><img src='${picture}' height=100 width=100 style='border-radius:50%'/></td>
                            <td>${name}</td>
                            <td>${price}$</td>
                            <td>${quantity}</td>
                        </tr>
                        ";
                    }
                }
            ?>
            </tbody>
        </table>
    </div>
    <?php
        include "../footer.php";
    ?>
</body>
</html>