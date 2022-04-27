<?php
    include_once "help/helpers.php";
    $country = null;

    if (!empty($_POST)) {
        $input = $_POST['subject'];
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $country = $_POST['country'];

        if($input === "noice") {
            $message = '<div class="row p-5">
                            <iframe src="https://giphy.com/embed/xF2YGkO6UMagU" width="200" height="auto" frameBorder="0" class="giphy-embed" allowFullScreen></iframe><p><a href="https://giphy.com/gifs/weird-that-70s-show-xF2YGkO6UMagU" target="_blank">via GIPHY</a></p>
                        </div>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Contact</title>
</head>
<body>

    <?php
        require "header.php";
    ?>

    <div class="container">
        <h1>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        </h1>

        <div class="form-container">
            <form action="" method="post" id="contact-form">

                <label for="fname">First Name</label>
                <input type="text" id="fname" name="firstname" placeholder="Your name" value="<?php echo $fname ?? "" ?>">
                <p>Suggestions: <span id="textHint"></span></p>

                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="lastname" placeholder="Your last name" value="<?php echo $lname ?? "" ?>">

                <label for="country">Country</label>
                <select id="country" name="country" selected="<?php echo $country ?? "" ?>">
                    <option value="Australia" <?= $country ==='Australia' ? ' selected="selected"' : '';?> >Australia</option>
                    <option value="Canada" <?= $country ==='Canada' ? ' selected="selected"' : '';?> >Canada</option>
                    <option value="USA" <?= $country ==='USA' ? ' selected="selected"' : '';?> >USA</option>
                    <option value="Germany" <?= $country ==='Germany' ? ' selected="selected"' : '';?> >Germany</option>
                    <option value="Romania" <?= $country ==='Romania' ? ' selected="selected"' : '';?> >Romania</option>
                </select>

                <label for="subject">Subject</label>
                <textarea id="subject" name="subject" placeholder="Write something" style="height:200px" ><?php echo $input ?? null ?></textarea>
                <input type="reset" class="btn btn-danger px-3" value="Clear"/>
                <input type="submit" name="sendFormButton" class="btn btn-success px-4 mx-4"/>

                <?php
                    echo $message ?? "";
                ?>

            </form>
        </div>
    </div>
    <?php
        include "footer.php";
    ?>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="../js/prevenSubmit.js" defer></script>
</body>
</html>