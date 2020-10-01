<?php

require_once "functions.php";

$action = $_GET['action'] ?? 'main';

switch ($action) {
    case "InputDate":
        InputDatatoDB();
        break;
    case "MakeRandomOrders":
        CreateRandomOrders();
        break;
    case "DeleteData":
        deleteDBdata();
        break;
}

$html= '
<html lang="en">
<head><link rel="stylesheet"  media="screen" type="text/css" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>PHP сайт</title>
    <style>
        <div style="width: 100px; height: 100px;
        border: solid 1px #ccc; display: inline-block;">

                                           </div>

                                             <div style="width: 100px; height: 100px;
        border: solid 1px #ccc; display: inline-block;">
        <p>This is second div element.</p>
                                        </div>
    </style>
</head>
<body><link rel="stylesheet"  media="screen" type="text/css" />
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h3 class="my-0 mr-md-auto font-weight-normal" href="/"><strong>PHP & SQL</strong></h3>
</div>
<div
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </head>
<body>
<a class="btn btn-primary" href="/?action=InputDate">Внесення тестових даних</a>
<a class="btn btn-warning" href="/?action=MakeRandomOrders">Створення замовлень</a>
<a class="btn btn-danger" href="/?action=DeleteData">Видалення даних БД</a>';
echo $html;
$db = new mysqli("db", 'root', '', 'skillup');
$html='<table mt-10 width="460" height="49" border="0" cellpadding="0" cellspacing="2">';
$html .='<tr>';
$html .='<td height="19" valign="top">
<h7><strong>Користувачі+замовлення в порядку спадання</strong></h7>';
$res = $db->query("SELECT u.email, USER_ID, COUNT(DISTINCT o.ID) FROM orders o join users u on u.id = o.user_id GROUP BY o.user_id ORDER BY 3 DESC;");
$users = $res->fetch_all(MYSQLI_ASSOC);
$html.='<div class="container" align="center">';
$html .= '<table border="2" cellpadding="5" bordercolor="blue">';
$html .= '<thead>';
$html .= '<th>Користувач</th>';
$html .= '<th>ID користувача</th>';
$html .= '<th>Кількість замовлень</th>';
$html .= '</thead>';
$html .= '<tbody>';
foreach ($users as $user) {
    $html .= "<tr><td align='center'>" . $user['email'] . "</td><td align='center'>" . $user['USER_ID'] . "</td><td align='center'>" . $user['COUNT(DISTINCT o.ID)'] . "</td></tr>";
}
$html .= '</tbody>';
echo $html;

$res_u = $db->query("select u.email,sum(p.price) as total_price from orders o join users u on u.id = o.user_id join products p on p.id = o.product_id group by u.email order by total_price desc;");

$users_total = $res_u->fetch_all(MYSQLI_ASSOC);
$html.='<div class="container" align="center">';
$html = '<table border="2" cellpadding="5" bordercolor="orange">';
$html .= '</tbody>';
$html .= '<tbody>';
echo $html;
$html .= '</td>';
$html .='</tr>';
$html .='</table></td>';
$html .='<td valign="top"><table>';
$html .='<tr>';
$html .='<h7><strong>Загальна сумма витрачених коштів</strong></h7>';
$html .='<td height="48" valign="top">';
$html .= '<table width="230" height="50" border="2" cellpadding="5" bordercolor="orange">';
$html .='<thead>';
$html .= '<th>Користувач</th>';
$html .= '<th>Загальна сума $</th>';
$html .= '</thead>';
$html .= '<tbody>';
foreach ($users_total as $user) {
    $html .= "<tr><td align='center'>" . $user['email'] . "</td><td align='center'>" . $user['total_price'] . "</td></tr>";
}
$html .= '</tbody>';
$html .='</td>';
$html .='</tr>';
$html .='</table></td>';
$html .='</tr>';
$html .='</table>';
echo $html;

$res_top = $db->query("select * from (select o.product_id, count(distinct o.id) from orders o group by o.product_id order by 2 desc) a join products p on p.id = a.product_id limit 3;");

$users_top = $res_top->fetch_all(MYSQLI_ASSOC);

$html = '<table>';
$html .= '</tbody>';
$html .= '<tbody>';
echo $html;
$html .= '</td>';
$html .='</tr>';
$html .='</table></td>';
$html .='<td valign="top"><table>';
$html .='<tr>';
$html .='<h7><strong>ТОП 3 найпопулярніші товари</strong></h7>';
$html .='<td height="48" valign="top">';
$html.='<div class="container" align="center">';
$html .= '<table border="2" cellpadding="5" bordercolor="red">';
$html .='<thead>';
$html .= '<th>Назва товару</th>';
$html .= '<th>Ціна $</th>';
$html .= '<th>Кількість заказів</th>';
$html .= '</thead>';
$html .= '<tbody>';
foreach ($users_top as $user) {
    $html .= "<tr><td align='center'>" . $user['name'] . "</td><td align='center'>" . $user['price'] . "</td><td align='center'>" . $user['count(distinct o.id)'] . "</td></tr>";
}
$html .= '</tbody>';
$html .='</td>';
$html .='</tr>';
$html .='</table></td>';
$html .='</tr>';
$html .='</table>';
echo $html;
$res_date = $db->query("select distinct u.email, o.id, o.created_at_date from orders o join users u on u.id = o.user_id where o.created_at_date between '2020-07-01' and '2020-07-30' order by created_at_date asc;");

$users_date = $res_date->fetch_all(MYSQLI_ASSOC);

$html = '<table>';
$html .= '</tbody>';
$html .= '<tbody>';
echo $html;
$html .= '</td>';
$html .='</tr>';
$html .='</table></td>';
$html .='<td valign="top"><table>';
$html .='<tr>';
$html .='<h7><strong>Замовлення користувачів з 01.07.2020 по 30.07.2020</strong></h7>';
$html .='<td height="48" valign="top">';
$html.='<div class="container" align="center">';
$html .= '<table width="460" height="49" border="2" cellpadding="5" bordercolor="green">';
$html .='<thead>';
$html .= '<th>Користувач</th>';
$html .= '<th>ID замовлення</th>';
$html .= '<th>Дата</th>';
$html .= '</thead>';
$html .= '<tbody>';
foreach ($users_date as $user) {
    $html .= "<tr><td align='center'>" . $user['email'] . "</td><td align='center'>" . $user['id'] . "</td><td>" . $user['created_at_date'] . "</td></tr>";
}
$html .= '</tbody>';
$html .='</td>';
$html .='</tr>';
$html .='</table></td>';
$html .='</tr>';
$html .='</table>';
echo $html;






