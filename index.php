<?php

require_once "functions.php";

$action = $_GET['action'] ?? 'main';

switch ($action) {
    case "InputDate":
        InputDatatoDB();
        break;
    case "ToRandUsers":
        adminAddProductEndpoint();
        break;
    case "DeleteData":
        adminChangeRoleEndpoint();
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
    <h3 class="my-0 mr-md-auto font-weight-normal" href="/"><strong>PHP</strong></h3>
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
<a class="btn btn-warning">Вибір рандомних користувачів</a>
<a class="btn btn-danger">Видалення даних БД</a>
<div>
   ';
 echo $html;