<?php
include_once "help/helpers.php";

$cities = '';
$appearances = '';
if (isset($_POST['submit']))
{
    $link = $_POST['linkname'];
    $query = 'search';
    $param = $_POST['param'];

    $pattern = '/^http:|^https:/';
    $match = preg_match($pattern, $link);

    if(!$match)
    {
        $cities = 'Please enter a valid link.';
    }
    else
    {
        try
        {
            $requestContent = curlGetContent($link . '?'. $query . '=' . $param);
            $received = json_decode($requestContent);
            $ob = 'city:search-results';
            $receivedCities = $received->_embedded-> $ob;

            $citiesArray = [];
            forEach($receivedCities as $city)
            {
                array_push($citiesArray, $city->matching_full_name);
            }

            $cities = '<table class="table-content mt-5" >
                <tr>
                    <th>Results</th>
                </tr>';

            $appearancesOfA = 0;
            forEach($citiesArray as $city)
            {
                $k  = preg_match_all('/a/i', $city);
                $appearancesOfA += $k;
                $cities .= "<tr>
                                            <td>
                                                ${city}
                                            </td>
                                       </tr>";
            }
            $cities .= '</table';

            $appearances = "<p>Appearances of a/A: ${appearancesOfA}</p>";
        }
        catch (Exception $e)
        {
            $cities = 'error: ' . $e->getMessage() . ' in file ' . $e->getFile() . ' on line ' . $e->getLine();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Link form</title>
</head>
<body>

<?php
    require "header.php";
?>

<div class="container">
    <h1>
        Working with links.
    </h1>

    <div class="form-container">
        <form action="" method="post">
            <input type="text" id="myLink" name="linkname" placeholder="Link to search"/>
            <br>
            <input type="text" id="param" name="param" placeholder="City"/>
            <br>
            <input type="submit" name='submit' class="btn btn-success px-5 mt-5 mb-3"/>
        </form>

        <?php
            echo $appearances;
        echo $cities;
        ?>
    </div>
</div>

<?php
    include "footer.php";
?>

</body>
</html>