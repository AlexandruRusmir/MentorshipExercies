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
        <div class="form-container">
            <form action="" id="locationForm">

                <label for="location">Location</label>
                <input type="text" id="location" name="loc" placeholder="Your location">

                <input type="submit" class="btn btn-success" value="Submit">
            </form>
        </div>

        <div class="row">
            <div class="col-6-md" style="display: flex">
                <div class="card p-3 m-5" style="width: 23rem; justify-content: center;">
                    <img class="card-img-top" src="../styles/images/map.svg" alt="Map image">
                    <div class="card-body">
                        <h5 class="card-title">Locations</h5>
                        <ul id="locations-list">

                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-6-md" style="display: flex">
                <div class="card p-3 m-5" style="width: 23rem; justify-content: center;">
                    <img class="card-img-top" src="../styles/images/calendar.svg" alt="Calendar image">
                    <div class="card-body">
                        <h5 class="card-title">Events</h5>
                        <ul id="events-list">

                        </ul>
                    </div>
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

    <script src="../js/locationSearch.js"></script>

</body>
</html>