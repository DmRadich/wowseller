<?php

require_once __DIR__ . '/../helpers.php';

// Вынесение данных из $_POST
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordConfirmation = $_POST['password_confirmation'];

// Validation

$_SESSION['validation'] = [];

if (empty($name)) {
    $_SESSION['validation']['name'] = 'Неверное имя';
}

if (!empty($_SESSION['validation'])) {
    redirect('/register.php');
}