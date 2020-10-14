<?php
require_once "functions.php";
require_once "libs/Smarty.class.php";

$smarty = new Smarty();

$smarty->setTemplateDir('templates');

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
    case "ShowWeather":
        ShowWeatherEndpoint();
        break;
    case "ShowImportantUsers":
        ShowImportantUsers();
        break;
    default:
        mainPageEndpoint();
        break;
}


