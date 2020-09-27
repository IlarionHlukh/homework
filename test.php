<?php
$db = new mysqli("db", 'root', '', 'skillup');

$time = time();
$rand=rand(100,500);

function makeRandomDateInclusive($startDate,$endDate){
    return date("Y-m-d",strtotime("$startDate + ".rand(0,round((strtotime($endDate) - strtotime($startDate)) / (60 * 60 * 24)))." days"));
}
echo makeRandomDateInclusive('2020-06-01','2020-08-31');

$query = "INSERT INTO users (email, role_id, md5) VALUES ( 'user+$time@gmail.com', 0, 'asdas')";

$db->query($query);