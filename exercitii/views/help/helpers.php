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
        curl_setopt($ch,CURLOPT_HEADER, 0);

        $output = curl_exec($ch);

        if($output === FALSE)
        {
            echo "cURL error: " . curl_error($ch);
        }

        curl_close($ch);

        return $output;
    }

    function readFromFile(string $filePath)
    {
        $myfile = fopen($filePath, "r") or die("Unable to open file!");
        $message = fread($myfile,filesize($filePath));
        fclose($myfile);

        return $message;
    }

    function appendToFile(string $content, string $filePath)
    {
        $myfile = fopen($filePath, "a+") or die("Unable to open file!");
        fwrite($myfile, $content);
        fclose($myfile);

        return readFromFile($filePath);
    }

    function addUserToJSON(string $name, string $email, string $password, string $path, $currentArray)
    {
        $user = (object) array('name' => $name, 'email' => $email, 'password' => $password,
            'id' => $currentArray!=null ? sizeof($currentArray)+1 : 1, 'role' => 'user');
        if($currentArray)
        {
            array_push($currentArray, $user);
        }
        else
        {
            $currentArray = array($user);
        }
        $jsonData = json_encode($currentArray);
        file_put_contents($path, $jsonData);
    }

    function addProductToJSON(string $name, float $price , int $quantity, string $pictureURL,string $path, array $currentArray)
    {
        $product = (object) array('id' => $currentArray!=null ? sizeof($currentArray)+1 : 1, 'name' => $name,
            'price' => $price, 'quantity' => $quantity, 'pictureURL' => $pictureURL);

        if($currentArray)
        {
            array_push($currentArray, $product);
        }
        else
        {
            $currentArray = array($product);
        }
        $jsonData = json_encode($currentArray);
        file_put_contents($path, $jsonData);
    }

    function findIdByEmail(string $email, array $usersArray)
    {
        forEach ($usersArray as $user)
        {
            $user->id +=100;
            if($user->email == $email)
                return $user->id;
        }
        return null;
    }

    function findELById(string $id, array $array)
    {
        forEach($array as $el)
        {
            if($el->id == $id)
                return $el;
        }
        return null;
    }

    function logout()
    {
        setcookie('userID', '', time() - (86400 * 14), "/");
        return "";
    }
?>
