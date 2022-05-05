<?php
    include_once "help/helpers.php";
    $script_name = $_SERVER["SCRIPT_NAME"];
    $currentPage = getLastItemFromStringBySeparator($script_name, "/");

    echo '<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="index.php"><img src="../styles/images/logo.png" style="width: 100px; height: auto" alt="Logo picture"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link ' . addStyleToCurrentPage($currentPage, "index.php", NAV_LINK_ACTIVE_CSS_CLASS) . '" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ' . addStyleToCurrentPage($currentPage, "blog.php", NAV_LINK_ACTIVE_CSS_CLASS) . '" href="blog.php">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ' . addStyleToCurrentPage($currentPage, "contact.php", NAV_LINK_ACTIVE_CSS_CLASS) . '" href="contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ' . addStyleToCurrentPage($currentPage, "services.php", NAV_LINK_ACTIVE_CSS_CLASS) . '" href="services.php">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ' . addStyleToCurrentPage($currentPage, "locations.php", NAV_LINK_ACTIVE_CSS_CLASS) . '" href="locations.php">Locations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ' . addStyleToCurrentPage($currentPage, "calendar.php", NAV_LINK_ACTIVE_CSS_CLASS) . '" href="calendar.php">Calendar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ' . addStyleToCurrentPage($currentPage, "fileForm.php", NAV_LINK_ACTIVE_CSS_CLASS) . '" href="fileForm.php">File Work</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ' . addStyleToCurrentPage($currentPage, "linkForm.php", NAV_LINK_ACTIVE_CSS_CLASS) . '" href="linkForm.php">Link work</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ' . addStyleToCurrentPage($currentPage, "classPractice.php", NAV_LINK_ACTIVE_CSS_CLASS) . '" href="classPractice.php">Classes</a>
                </li>
                <li class="nav-item" id="lastNavItemElement">
                    <a class="nav-link ' . addStyleToCurrentPage($currentPage, "loginPage.php", NAV_LINK_ACTIVE_CSS_CLASS) . '" href="loginPage.php">Shop</a>
                </li>'
                . addPageToHeaderIfItIsCurrentPage($currentPage, "easterEggPage.php", "Easter Egg Page")
                . addPageToHeaderIfItIsCurrentPage($currentPage, "fileReceive.php", "File Receive")
                . addPageToHeaderIfItIsCurrentPage($currentPage, "register.php", "Classes") . '
            </ul>
        </div>
    </nav>';
?>
