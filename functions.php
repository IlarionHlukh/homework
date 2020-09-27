<?php
    $db = new mysqli("db", 'root', '', 'skillup');

    $time = time();
    $rand = rand(100, 500);

    function makeRandomDateInclusive($startDate, $endDate)
    {
        return date("Y-m-d", strtotime("$startDate + " . rand(0, round((strtotime($endDate) - strtotime($startDate)) / (60 * 60 * 24))) . " days"));
    }

    function InputDatatoDB()
    {
        $db = new mysqli("db", 'root', '', 'skillup');

        $timeDB = makeRandomDateInclusive('2020-06-01', '2020-08-31');

        $rand = rand(0, 100);

        $time = time();

        $query = "INSERT INTO `test` SET `id`= '$rand',`email` = 'user+$time@gmail.com', `created_date` = '$timeDB'";
        $db->query($query);
    }



