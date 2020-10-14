<?php
$db = new mysqli("db", 'root', '', 'skillup');

$time = time();
$rand = rand(100, 500);

function InputDatatoDB()
{$db = new mysqli("db", 'root', '', 'skillup');
    $users_sql_query = "INSERT INTO users (EMAIL, PASSWORD, CREATED_AT_DATE) VALUES ";
    $users_array = array();
    $domains_array = ['ukr.net', 'gmail.com', 'mail.ru', 'bigmir.net'];
    for ($a = 1; $a < rand(500, 1000) + 1; $a++) {
        array_push($users_array,
            "('user{$a}@".$domains_array[rand(0, count($domains_array) - 1)]."', '".md5($a * 1000)."', '"
            .date('Y-m-d', strtotime('2020-06-01') + (86400 * rand(0, (strtotime('2020-08-31') - strtotime('2020-06-01'))/86400)))."')");
    }
    $users_sql_query .= implode(', ', $users_array).';';

    $db->query($users_sql_query);

    $products_sql_query = "INSERT INTO products (PRICE, NAME) VALUES ";
    $products_array = array();
    $companies = array('intel' => [700, 2500], 'amd' => [500, 2300], 'nvidia' => [150, 1000], 'zotac' => [10, 15],
        'kingston' => [150, 720], 'asus' => [800, 3200], 'lenovo' => [1, 100], 'gigabyte' => [2, 200], 'hp' => [800, 2100]);
    for ($a = 1; $a < rand(500, 1000) + 1; $a++) {
        $companie = array_keys($companies)[rand(0, count($companies) - 1)];
        array_push($products_array,
            "(".rand($companies[$companie][0], $companies[$companie][1]).", '{$companie}{$a}')");
    }
    $products_sql_query .= implode(', ', $products_array).';';

    $db->query($products_sql_query);
    header("Location:/");
}
function CreateRandomOrders()
{
    $db = new mysqli("db", 'root', '', 'skillup');
    $users_db = $db->query("SELECT ID, CREATED_AT_DATE FROM users");
    $users = $users_db->fetch_all(MYSQLI_ASSOC);
    $selected_users_id_array_keys = array_rand($users, 100);
    $products_db = $db->query("SELECT ID FROM products");
    $products = $products_db->fetch_all(MYSQLI_ASSOC);
    $orders_sql_query = "INSERT INTO orders (USER_ID, PRODUCT_ID, CREATED_AT_DATE) VALUES ";
    $orders_array = array();
    foreach ($selected_users_id_array_keys as $key => $value) {
        $random_products = array_rand($products, rand(2, 8));
        foreach ($random_products as $key => $product) {
            $user_cr_date = date('d.m.Y', strtotime($users[$value]['CREATED_AT_DATE']));
            $days_qty = date('d.m.Y') - $user_cr_date;
            array_push($orders_array, "({$users[$value]['ID']}, {$products[$product]['ID']}, 
                '".date('Y-m-d', strtotime($user_cr_date) + (86400 * rand(0, $days_qty)))."')");
        }
    }
    $orders_sql_query .= implode(', ', $orders_array).';';

    $db->query($orders_sql_query);
    header("Location:/");
}

function deleteDBdata() {

    $db = new mysqli("db", 'root', '', 'skillup');

    $query="SET foreign_key_checks = 0; call clear3();  begin truncate table users; truncate table products; truncate table orders; end; SET foreign_key_checks = 1";

    $db->multi_query($query);

    header("Location:/");
}
function ShowImportantUsers()
{
    global $smarty;

    $db = new mysqli("db", 'root', '', 'skillup');

    $query = "SELECT u.email,count(distinct o.id) as orders_qty, sum(p.price) as total_price, round(count(distinct o.id) * (sum(p.price)/count(distinct o.id))/10 + (sum(p.price)/count(distinct o.id)), 2) as formula_result FROM orders o join users u on u.id = o.user_id join products p on p.id = o.product_id group by u.email order by formula_result desc limit 15;";
    $res = $db->query($query);
    $users_im = $res->fetch_all(MYSQLI_ASSOC);

    $smarty->assign('users_imp', $users_im);

    $smarty->display('imp_users.tpl');
}
function ShowWeatherEndpoint() {
    global $smarty;

    $startDate = '13.10.2019 00:00:00';
    $sqlQuery = 'INSERT INTO weather (DATE, TIME, TEMPERATURE) VALUES ';
    $dataArray = [];
    for ($a = 0; $a < 8784; $a++) {
        $recDate = strtotime($startDate) + (3600 * $a);
        $dataArray[] = '(\''.date('Y-m-d', $recDate).'\',
                        \''.date('H:i:s', $recDate).'\',
                        '.(rand(10, 20) + rand(0, 9)/10).')';
    }
    $sqlQuery .= implode(', ', $dataArray).';';
    $db = new mysqli("db", 'root', '', 'skillup');
    $db->query($sqlQuery);

    $res = $db->query("select extract(year from a.date) as year_num, extract(month from a.date) as month_num, case extract(month from a.date) when 1 then 'Січень' when 2 then 'Лютий' when 3 then 'Березень'when 4 then 'Квітень' when 5 then 'Травень' when 6 then 'Червень' when 7 then 'Липень' when 8 then 'Серпень' when 9 then 'Вересень' when 10 then 'Жовтень' when 11 then 'Листопад' when 12 then 'Грудень' end month_txt,extract(hour from a.time) as hour_num, round(avg(a.temperature), 2) as avg_temperature from skillup.weather a where extract(hour from a.time) = 12 group by extract(year from a.date), extract(month from a.date), case extract(month from a.date) when 1 then 'Січень' when 2 then 'Лютий' when 3 then 'Березень' when 4 then 'Квітень' when 5 then 'Травень'when 6 then 'Червень' when 7 then 'Липень' when 8 then 'Серпень' when 9 then 'Вересень' when 10 then 'Жовтень' when 11 then 'Листопад' when 12 then 'Грудень' end, extract(hour from a.time) order by 1, 2;");

    $weather = $res->fetch_all(MYSQLI_ASSOC);
    $smarty->assign('weather_item', $weather);
    $smarty->display('weather.tpl');
}


function mainPageEndpoint() {
    global $smarty;

    $db = new mysqli("db", 'root', '', 'skillup');
    $res = $db->query("SELECT u.email, USER_ID, COUNT(DISTINCT o.ID) FROM orders o join users u on u.id = o.user_id GROUP BY o.user_id ORDER BY 3 DESC;");
    $users_orders = $res->fetch_all(MYSQLI_ASSOC);

    $smarty->assign('users_orders', $users_orders);

    $res_u = $db->query("select u.email,sum(p.price) as total_price from orders o join users u on u.id = o.user_id join products p on p.id = o.product_id group by u.email order by total_price desc;");

    $users_total = $res_u->fetch_all(MYSQLI_ASSOC);

    $smarty->assign('users_total', $users_total);

    $res_top = $db->query("select * from (select o.product_id, count(distinct o.id) from orders o group by o.product_id order by 2 desc) a join products p on p.id = a.product_id limit 3;");

    $users_top = $res_top->fetch_all(MYSQLI_ASSOC);

    $smarty->assign('users_top', $users_top);

    $res_date = $db->query("select distinct u.email, o.id, o.created_at_date from orders o join users u on u.id = o.user_id where o.created_at_date between '2020-07-01' and '2020-07-30' order by created_at_date asc;");

    $users_date = $res_date->fetch_all(MYSQLI_ASSOC);

    $smarty->assign('users_date', $users_date);

    $smarty->display('index.tpl');
}

