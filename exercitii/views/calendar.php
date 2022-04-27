<?php

    date_default_timezone_set('Europe/Bucharest');

    if (isset($_GET['ym']))
        {
            $ym = $_GET['ym'];
        }
        else
        {
            $ym = date('Y-m');
        }

    $timestamp = strtotime($ym . '-01');  // the first day of the month
    if ($timestamp === false)
    {
        $ym = date('Y-m');
        $timestamp = strtotime($ym . '-01');
    }

    // Today (Format:2018-08-8)
    $today = date('Y-m-j');

    // Title (Format:August, 2018)
    $title = date('F, Y', $timestamp);

    // Create prev & next month link
    $prev = date('Y-m', strtotime('-1 month', $timestamp));
    $next = date('Y-m', strtotime('+1 month', $timestamp));

    // Number of days in the month
    $dayCount = date('t', $timestamp);

    // 1:Mon 2:Tue 3: Wed ... 7:Sun
    $str = date('N', $timestamp);
    echo $str;

    // Array for calendar
    $weeks = [];
    $week = '';

    // Add empty cell(s)
    $week .= str_repeat('<td></td>', $str - 1);

    for ($day = 1; $day <= $dayCount; $day++, $str++)
    {
        $date = $ym . '-' . $day;

        if ($today == $date)
        {
            $week .= '<td class="today">';
        }
        else
        {
            $week .= '<td>';
        }
        $week .= $day . '</td>';

        // Sunday OR last day of the month
        if ($str % 7 == 0 || $day == $dayCount)
        {
            // last day of the month
            if ($day == $dayCount && $str % 7 != 0)
            {
                // Add empty cell(s)
                $week .= str_repeat('<td></td>', 7 - $str % 7);
            }

            $weeks[] = '<tr>' . $week . '</tr>';

            $week = '';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Calendar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="../styles/css/calendarStyle.css" rel="stylesheet">
    <link href="../styles/css/style.css" rel="stylesheet">
</head>
<body>
    <?php
        require "header.php";
    ?>

    <div class="container">
        <ul class="list-inline">
            <li class="list-inline-item"><a href="?ym=<?= $prev; ?>" class="btn btn-success">&lt; prev</a></li>
            <li class="list-inline-item"><span class="title"><?= $title; ?></span></li>
            <li class="list-inline-item"><a href="?ym=<?= $next; ?>" class="btn btn-success">next &gt;</a></li>
        </ul>

        <p class="text-right"><a href="calendar.php">Today Date</a></p>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>L</th>
                <th>M</th>
                <th>M</th>
                <th>J</th>
                <th>V</th>
                <th>S</th>
                <th>D</th>
            </tr>
            </thead>
            <tbody>
            <?php
                foreach ($weeks as $week) {
                    echo $week;
            }
            ?>
            </tbody>
        </table>
    </div>

    <?php
        include "footer.php";
    ?>
</body>
</html>