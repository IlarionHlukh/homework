<?php
$db = new mysqli("db", 'root', '', 'skillup');

$res = $db->query("SELECT distinct b.room_id FROM (SELECT a.room_id, COUNT(*) FROM roomates a WHERE a.user_id IN (1,2) GROUP BY a.room_id HAVING COUNT(*)=(SELECT COUNT(DISTINCT ad.user_id) FROM roomates ad WHERE ad.user_id IN (1,2))) b;");

$rooms = $res->fetch_all(MYSQLI_ASSOC);

print_r($rooms);
