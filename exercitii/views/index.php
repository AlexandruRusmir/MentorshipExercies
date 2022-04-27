<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Home</title>
</head>
<body>
        <?php
            require "header.php";
        ?>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </h1>
                </div>
            </div>

            <div class="row pt-5 pb-3">
                <div class="col-md p-5">
                    <?php
                        echo "<em>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed volutpat dapibus condimentum. Nullam ornare pulvinar tellus, quis faucibus lacus finibus.</em>";
                    ?>
                </div>
                <div class="col-md">
                    <img style="width: 100%; height: auto;" src="../styles/images/static_website.svg" alt="Static website picture">
                </div>
            </div>

            <div class="row general">
                <div class="col-12">
                    <h3>
                        General information
                    </h3>
                </div>
                <?php
                    echo "<p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ultrices purus nisl, quis tincidunt mauris tempus eu. Integer auctor justo nisl, nec vestibulum massa commodo sed. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vivamus convallis placerat rutrum. Pellentesque nec iaculis nibh. In ut neque lorem. Vestibulum orci tortor, laoreet viverra tempus in, bibendum in sem. Fusce vitae lobortis tortor, condimentum pretium massa.
                </p>";
                ?>
                <p>
                    Quisque quis congue nulla. Vestibulum lobortis orci vel est cursus pretium. Praesent ultricies interdum imperdiet. Nullam ornare mattis maximus. Maecenas laoreet eu arcu at tincidunt. Praesent dui quam, sagittis vel feugiat in, facilisis at enim. Nullam id ultrices felis. Nullam id rutrum arcu, fringilla viverra ipsum. Aliquam iaculis sem quis quam tempus, non viverra nisl malesuada. Donec accumsan libero quis lectus hendrerit, vitae cursus mauris rhoncus. Fusce suscipit, ligula in hendrerit aliquet, risus neque placerat magna, ac pulvinar elit tellus at magna.
                </p>
                <p>
                    Cras eu justo eget ipsum euismod dapibus at a nulla. Proin et blandit felis. Maecenas placerat turpis erat, eget fringilla risus tristique quis. Nunc eu turpis vitae diam imperdiet ultricies. Duis facilisis, tortor at bibendum fermentum, sem mauris ultrices nibh, sed luctus ante tortor a odio. Donec est neque, fringilla eu nibh sodales, blandit malesuada mauris. Fusce a convallis lectus. Nunc eu mattis dui, eu bibendum massa. Mauris et egestas magna. Sed magna quam, commodo ut faucibus nec, posuere sed massa. Phasellus egestas euismod erat id cursus. Vivamus volutpat consequat molestie. Etiam laoreet libero libero, quis pretium eros pretium at. Nullam id nulla nec massa semper lobortis at vitae mi.
                </p>
            </div>

            <table class="table-content">
                <tr>
                    <th>Lorem</th>
                    <th>Ipsum</th>
                    <th>Dolor</th>
                </tr>
                <tr>
                    <td>Lorem ipsum.</td>
                    <td>Lorem ipsum.</td>
                    <td>Lorem ipsum dolor.</td>
                </tr>
                <tr>
                    <td>Lorem ipsum.</td>
                    <td>Lorem ipsum.</td>
                    <td>Lorem ipsum dolor.</td>
                </tr>
                <tr>
                    <td>Lorem ipsum.</td>
                    <td>Lorem ipsum.</td>
                    <td>Lorem ipsum dolor.</td>
                </tr>
                <tr>
                    <td>Lorem ipsum.</td>
                    <td>Lorem ipsum.</td>
                    <td>Lorem ipsum dolor.</td>
                </tr>
                <tr>
                    <td>Lorem ipsum.</td>
                    <td>Lorem ipsum dolor.</td>
                    <td>Lorem ipsum.</td>
                </tr>
                <tr>
                    <td>Lorem ipsum.</td>
                    <td>Lorem ipsum.</td>
                    <td>Lorem ipsum dolor.</td>
                </tr>
                <tr>
                    <td>Lorem ipsum.</td>
                    <td>Lorem ipsum.</td>
                    <td>Lorem ipsum dolor.</td>
                </tr>
                <tr>
                    <td>Lorem ipsum.</td>
                    <td>Lorem ipsum.</td>
                    <td>Lorem ipsum dolor.</td>
                </tr>
                <tr>
                    <td>Lorem ipsum.</td>
                    <td>Lorem ipsum.</td>
                    <td>Lorem ipsum dolor.</td>
                </tr>
            </table>
        </div>

        <?php
            include "footer.php";
        ?>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <script src="../js/popup.js" defer></script>
</body>
</html>