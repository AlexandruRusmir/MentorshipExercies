<?php
include_once "help/helpers.php";

$fileContent = '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Files</title>
</head>
<body>

<?php
require "header.php";
?>

<div class="container">
    <h1>
        Working with files.
    </h1>

    <div class="form-container">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" id="myFile" name="filename"/>
            <br>
            <input type="submit" name='submit' class="btn btn-success px-5 mt-5 mb-3"/>
        </form>
        <?php
            var_dump($_POST);
        ?>
    </div>
</div>

<?php
include "footer.php";
?>

</body>
</html>