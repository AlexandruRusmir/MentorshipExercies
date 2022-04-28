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
        if($n === 0)
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

    function curlPostContent($content, string $url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $content);

        $output = curl_exec($ch);

        if($output === FALSE)
        {
            echo "cURL error: " . curl_error($ch);
        }

        curl_close($ch);

        return $output;
    }

    function curlGetContent(string $url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt(CURLOPT_HEADER, 0);

        $output = curl_exec($ch);

        if($output === FALSE)
        {
            echo "cURL error: " . curl_error($ch);
        }

        curl_close($ch);

        return $output;
    }

    function appendToFile(string $content, string $filePath)
    {
        chmod($filePath, 0666);
        $myfile = fopen($filePath, "a") or die("Unable to open file!");
        fwrite($myfile, $content);
        fclose($myfile);
    }

    function readFromFile(string $filePath)
    {
        $myfile = fopen($filePath, "r") or die("Unable to open file!");
        $message = fread($myfile,filesize($filePath));
        fclose($myfile);

        return $message;
    }

?>
