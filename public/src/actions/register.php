<?php

require_once __DIR__ . '/../helpers.php';

// Вынесение данных из $_POST
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordConfirmation = $_POST['password_confirmation'];

// Validation

addOldValue('name', $name);
addOldValue('email', $email);

if (empty($name)) {

    addValidationError('name', 'Неверное имя');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    addValidationError('email', 'Указана неправильная почта');
}

if (empty($password)) {
    addValidationError('password', 'Пароль пустой');
}

if ($password !== $passwordConfirmation) {
    addValidationError('password', 'Пароли не совподают');
}

if (!empty($_SESSION['validation'])) {
    redirect('/register.php');
}

$pdo = getPDO();

$query = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
$params = [
    'name' => $name,
    'email' => $email,
    'password' => password_hash($password, PASSWORD_DEFAULT)
];
$stmt = $pdo->prepare($query);

try {
    $stmt->execute($params);

} catch (\Exception $e) {
    die($e->getMessage());
}


redirect('/login.php');