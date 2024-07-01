<?php

session_start();

require_once __DIR__ . '/config.php';

function redirect(string $path)
{
    header("Location: $path");
    die();
}

function addValidationError(string $fieldName, string $message)
{
    $_SESSION['validation'][$fieldName] = $message;
}

function clearValidation()
{
    $_SESSION['validation'] = [];
}

function hasValidationError(string $fieldName): bool
{
    return isset($_SESSION['validation'][$fieldName]);
}
function validationError(string $fieldName)
{
    echo isset($_SESSION['validation'][$fieldName]) ? 'true' : '';
}

function validationErrorMessage(string $fieldName)
{
    echo $_SESSION['validation'][$fieldName] ?? '';
}

function addOldValue(string $key, mixed $value): void
{
    $_SESSION['old'][$key] = $value;
}

function old(string $key)
{
    $value = $_SESSION['old'][$key] ?? '';
    unset($_SESSION['key'][$key]);
    return $value;
}

function getPDO(): PDO
{
    try {
        return new \PDO('mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);
    } catch (\PDOException $e) {
        die("Connection error: {$e->getMessage()}");
    }
}
