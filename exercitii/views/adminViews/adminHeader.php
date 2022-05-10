<?php
include_once "../help/helpers.php";
$script_name = $_SERVER["SCRIPT_NAME"];
$currentPage = getLastItemFromStringBySeparator($script_name, "/");

echo '<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="adminView.php"><img src="../../styles/images/logo.png" style="width: 100px; height: auto" alt="Logo picture"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link ' . addStyleToCurrentPage($currentPage, "adminView.php", NAV_LINK_ACTIVE_CSS_CLASS) . '" href="adminView.php">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ' . addStyleToCurrentPage($currentPage, "addProduct.php", NAV_LINK_ACTIVE_CSS_CLASS) . '" href="addProduct.php">Add product</a>
                </li>
                <li class="nav-item mx-5">
                    <a style="background: #f2f2f2; border-radius: 5px; color: #3a3939" class="nav-link" href="' . logout().  '../loginPage.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>';
?>
