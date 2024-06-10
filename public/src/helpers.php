<?php

session_start();

function redirect(string $path)
{
    header("Location: $path");
    die();
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