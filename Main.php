<?php

require_once "Controller.php";

$adController = new Controller();

if ($adController->isError()) {
    $adController->error();
    return;
}

try {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $adController->get();
    } else
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $adController->post();
        }
    $adController->close();
} catch (mysqli_sql_exception $e) {
    $adController->error();
}