<?php
    define("NAV_LINK_ACTIVE_CSS_CLASS", "custom-active");



    function getLastItemFromStringBySeparator(string $scriptName, string $separator) : string
    {
        $arr = explode($separator, $scriptName);
        $lastPart = $arr[count($arr)-1];

        return $lastPart;
    }

    function addStyleToCurrentPage(string $pageName, string $string, string $cssClass) : string
    {
        return $pageName === $string ? $cssClass : "";
    }

    function factorial(int $n) : int
    {
        if($n===0)
            return 1;
        return $n * factorial($n - 1);
    }

    function addPageToHeaderIfItIsCurrentPage(string $currentPageName, string $desiredPageDocument, string $desiredPageName) : string
    {
        return $currentPageName === $desiredPageDocument
                ? '<li class="nav-item">
                        <a class="nav-link ' . addStyleToCurrentPage($currentPageName, $desiredPageDocument, NAV_LINK_ACTIVE_CSS_CLASS) .
                                '" href=' . $desiredPageDocument . '>' . $desiredPageName .'</a>
                    </li>'
                : "";
    }
?>
