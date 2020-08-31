<?php

require_once "session.php";
require_once "functions.php";
require_once "telbooks.php";


$action = $_GET['action'] ?? 'main';

switch ($action) {
    case "login":
        loginEndpoint();
        break;
    case "register":
        registerEndpoint();
        break;
    case "logout":
        logoutEndpoint();
        break;
    case "session":
        print_r($_SESSION);
        break;
    case "create":
        mainEndpointfortable();
        if (empty($_POST['name']) || empty($_POST['phone'])) {
            die("Введіть контактні дані!!!!");
        }
        createContact($_POST['name'], $_POST['phone']);
            echo "<h5>Запис доданий!</h5>";
        break;
    case "delete":
        mainEndpointfortable();
        if ($user = getAuthUser()) {
            if (empty(getContacts())) {
                die("Записи відсутні, будь ласка уведіть контактні дані");
                }
            DeleteContact();
                echo "<h5>Запис видалений!</h5>";
            }
        break;
    case "main":
    default:
        mainEndpoint();

}

