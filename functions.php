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

