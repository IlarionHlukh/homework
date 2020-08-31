<?php

function loginEndpoint()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        makeLogin($_POST['email'], $_POST['password']);
        die();
    }
    showLoginForm();
}

function showLoginForm()
{
    $form = ' ';

    $email = $_GET['email'] ?? '';

    if ($error = ($_GET['error'] ?? null)) {
        $form .= '<br><div class="alert alert-danger" role="alert">
                ' . $error . '
            </div>';
    }


    $form .= '<h2>Вхід</h2><form action="/?action=login" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="' . $email . '">
    <small id="emailHelp" class="form-text text-muted">We\'ll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>';

    echo sprintf(getSiteTemplate(), $form);
}

function logoutEndpoint()
{
    session_destroy();
    header("Location: /");
}

function registerEndpoint()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        makeRegistration($_POST['username'], $_POST['surname'], $_POST['email'], $_POST['password']);
        die();
    }

    showRegisterForm();
}

function makeLogin(string $email, string $password)
{
    $users = [];

    if (strlen($password) < 4) {
        header("Location: ?action=login&email=$email&error=Password should be at least 4 symbols!");
        return;
    }

    if (file_exists('users.json')) {
        $users = json_decode(file_get_contents('users.json'), true);
    }

    foreach ($users as $user) {
        if ($email === $user['email'] && md5($user['salt'] . $password . $user['salt']) === $user['password']) {
            $_SESSION['user'] = $user;
            header("Location: /");
            return;
        }
    }

    header("Location: /?action=login&email=$email&error=Credentials you entered were incorrect!");
}

function makeRegistration(string $username,string $surname,string $email, string $password)
{
    $users = [];

    if (file_exists('users.json')) {
        $users = json_decode(file_get_contents('users.json'), true);
    }

    foreach ($users as $user) {
        if ($user['email'] === $email) {
            header("Location: /?action=register&error=Email has been already taken!");
            return;
        }
    }

    $salt = getRandomSalt();

    $users[] = $user = [
        'username'=>$username,
        'surname'=>$surname,
        'email' => $email,
        'salt' => $salt,
        'password' => md5($salt . $password . $salt)
    ];

    file_put_contents('users.json', json_encode($users));

    header("Location: /?action=login&email=$email");
}

function showRegisterForm()
{

    $form = '';

    if ($error = ($_GET['error'] ?? null)) {
        $form .= '<br><div class="alert alert-danger" role="alert">
                ' . $error . '
            </div>';
    }

    $form .= '<h2>Реєстрація</h2><link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet" type="text/css"><form action="/?action=register" method="POST">
  <div class="main-signin__middle">
        <div class="middle__form">
                <i class="fa fa-user icon"></i>
                <input type="text" name="username" placeholder="Імя" position="align="><span></span><br>
                <input type="text"  name="surname" placeholder="Прізвище" pattern="^[А-Яа-яЁё]+$" required><span></span><br>
                <input type="email"  name="email" placeholder="Електрона пошта"><span></span><br>
                <input type="password" name="password" placeholder="Пароль" required pattern="[0-9]{7,}"><span></span><br>
                <br><button type="submit" class="btn btn-primary">Register</button></br>
                </div>
</form>';

    echo sprintf(getSiteTemplate(), $form);
}

function getSiteTemplate(): string
{
    $html = '<html>';
    $html .= '<head>';
    $html .= getBootstrapHead();
    $html .= '</head>';
    $html .= '<body>';


    $html .= '
<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="/">PHP</a>

';
    if ($user = getAuthUser()) {
        $html .= '
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <ul class="nav justify-content-end">
            <li class="nav-item dropdown">
                <span class="badge badge-danger" >Пользователь</span>
                <br><div class="btn btn-primary btn-lg" 
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                ' . $user . '
<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="Current color" xmlns="http://www.w3.org/2000/svg">
  <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
  <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
</svg>
            </a>
            </div>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/?action=logout">Вийти
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-square" fill="red" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
  <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>
  <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>
</svg></a>
            </div>
            </ul>
       ';
        '
        <li class="nav-item dropdown">';

}

     else {
        $html .= '
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
            <ul class="nav justify-content-end">
               <li class="nav-item">
                    <a class="btn btn-outline-primary" href="/?action=login">Вхід</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-primary" href="/?action=register">Реєстрація</a>
                </li>
            </ul>
';
    }

    $html .= '
    </ul>';
    $html .= ' 
  </div>
</nav>
<div 
';


    $html .= '<div class="container">';
    $html .= '%s';
    $html .= '</div>';
    $html .= '</body>';
    $html .= '</html>';

    return $html;
}

function mainEndpoint()
{
    $template = "<h6>Здраствуйте, %s</h6>";
    $html = sprintf($template, getAuthUser() ?? "ви не автризовані для редагування таблиці, будь-ласка увійдіть або зареєструйтесь!");

    echo sprintf(getSiteTemplate(), $html);

    if ($user = getAuthUser()) {
        showTableForm();
        showContactBook();
}
    else {
        $html  = '
    <head>
        <h5 align="center">Телефонна книга</h5>
    </head>
    <table border="1">
    <table mt-20>
          <style>
              table {
                  width: 700px; 
                  border: 2px solid darkorange; 
                  margin: auto; 
                  vertical-align: middle;
              }
              th {
                  border: 2px solid darkorange;
                  text-align: center; 
                  background-color: chocolate;
              }
              td {
                  border: 2px solid darkorange; 
                  text-align: center; 
              }
          </style>
    <thead>
        <th>Імя</th>    
        <th>Телефон</th>   
    </thead>
    <tbody>
  ';
        echo $html;
    }
}


function getBootstrapHead()
{
    return '

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    ';
}


function getRandomSalt(int $length = 32)
{
    $abc = array_merge(
        range('a', 'z'),
        range('A', 'Z'),
        [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, '!', '^', '$', '#', '*']
    );

    $hash = '';

    $absLen = count($abc);

    for ($i = 0; $i < $length; $i++) {
        $index = rand(0, $absLen - 1);
        $hash .= $abc[$index];
    }

    return $hash;
}

function getAuthUser(): ?string
{
    return $_SESSION['user']['username'] ?? null;

}
function mainEndpointfortable()
{

    $template = "";
    $html = sprintf($template, getAuthUser() ?? "Ви не автризовані, для редагування таблиці будь-ласка увійдіть або зареєструйтесь!");

    echo sprintf(getSiteTemplate(), $html);
}

