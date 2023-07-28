<?php
require_once __DIR__ . '/../Controllers/UserController.php';

use Controllers\UserController;

$name = $_POST['name'];
$password = $_POST['password'];
$passwordConfirmation = $_POST['password_confirmation'];
$email = $_POST['email'];

$errors = validate($name, $password, $passwordConfirmation, $email);
session_start();
if (count($errors) > 0) {
    $_SESSION['success'] = '';
    $_SESSION['errors'] = $errors;
    header('Location: /');
    exit();
}
else
{
  $_SESSION['errors'] = [];
  $new  = new UserController();
  $new->store($_POST);
}

function validate($name, $password, $passwordConfirmation, $email)
{
    $errors = [];

    if (!$name) {
        $errors[] = 'Name is required';
    }

    if (!$email) {
        $errors[] = 'Email is required';
    }

    if (!$password) {
        $errors[] = 'Password is required';
    }

    if ($password !== $passwordConfirmation) {
        $errors[] = 'Password confirmation does not match';
    }

    return $errors;
}