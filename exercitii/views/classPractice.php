<?php
    include '../classes/BuildCar.php';
    include '../classes/TuningCar.php';
    include '../classes/Util.php';
    include '../classes/Rectangle.php';

    $car = new BuildCar('green', 1.4, 'Iron', 'Straight engine');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Locations</title>
    <link rel="stylesheet" href="../styles/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
    <?php
        require "header.php";
    ?>

    <div class="container">
        <h1>
            Classes practice
        </h1>
        <?php
            $car->color = 'red';
            $car->setWheelsMaterial('Steel');
            $car->setEngineType('V-engine');

            $carMessage = $car->customize();
            echo $carMessage;
            echo '<br>';

            $color = $car->color;
            echo "${color}";
            echo '<br>';
            $engine = $car->getEngineType();
            echo "${engine}";
            echo '<br>';


            echo BuildCar::SPEED_LIMIT;
            echo '<br>';

            $car2 = new BuildCar('blue', 1.9, 'Iron', 'Straight engine');
            $car2->whatIsThis();
            echo '<br>';

            $type = $car2->type();
            echo "${type}";
            echo '<br>';

            $seats = $car2->getSeatsNumber();
            echo "${seats}";
            echo '<br>';

            $tuningCar = new TuningCar();
            $tuningCarSeats = $tuningCar->numberOfSeats();
            echo $tuningCarSeats;
            echo '<br>';

            $carDescription = $car2->description();
            $upperCaseCarDescription = Util::switchCaseOfWords($carDescription, Util::UPPER_CASE);
            $lowerCaseCarDescription = Util::switchCaseOfWords($carDescription, Util::LOWER_CASE);
            echo $upperCaseCarDescription;
            echo '<br>';
            echo $lowerCaseCarDescription;
            echo '<br>';
            echo '<br>';

            $rect = new Rectangle(5, 8);
            $rect->setDimensions(13, 6);
            echo $rect;
            echo '<br>';
            $rect->moveRelative(0, 10);
            echo $rect;
            echo '<br>';
            $rect->scale(1.5);
            echo $rect;
            echo '<br>';
            $rect->moveRelative(10, 0);
            echo $rect;
            echo '<br>';
            $rect->scale(0.3);
            echo $rect;
            echo '<br>';
        ?>
    </div>

    <?php
        include "footer.php";
    ?>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
