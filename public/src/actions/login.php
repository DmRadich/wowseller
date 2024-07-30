<?php

require_once __DIR__ . '/../helpers.php';

$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;

$pdo = getPDO();

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    setOldValue('email', $email);
    setValidationError('email', 'Неверный формат электронной почты');
    setMessage('error', 'Ошибка валидации');
    redirect('/');
}

$user = findUser($email);

if (!$user) {
    setMessage('error', "Пользователь $email не найден");
    redirect("/../auth.php");
}


if (!password_verify($password, $user['password'])) {
    setMessage('error', "Неверный пароль");
    redirect("/../auth.php");
}

$_SESSION['user']['id'] = $user['id'];

redirect('/index.php');