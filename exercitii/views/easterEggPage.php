<?php
    include_once "help/helpers.php";


    $message = "";
    if(isset($_POST['MakeFactorialButton']))
    {
        $input = $_POST['inputNumber'];
        $fact = factorial(intval($input));
        $message = "The factorial for $input is: " . '<b><em>' . $fact . '</b></em>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>EasterEgg</title>
</head>
<body>

    <?php
        require "header.php";
    ?>

    <div class="container">
        <h1>
            Easter Egg page.
        </h1>

        <div class="form-container">
            <div class="row">
                <div class="col-md">
                    <form action="" method="post" style="margin-bottom: 2rem">
                        <p>Introduce an integer!</p>
                        <input type="number" name="inputNumber"/>
                        <input type="submit" name="MakeFactorialButton"/>
                    </form>
                    <?php
                        echo $message;
                    ?>
                </div>
                <div class="col-md">
                    <img style="width: 100%; height: auto;" src="../styles/images/calculator.svg" alt="Calculator image">
                </div>
            </div>
        </div>
    </div>
    <?php
        include "footer.php";
    ?>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
