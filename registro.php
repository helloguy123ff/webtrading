<?php
// Função para registrar um usuário
function registerUser($username, $email, $password) {
    $usersFile = 'users.txt';
    $userData = "$username|$email|$password\n";
    file_put_contents($usersFile, $userData, FILE_APPEND);
}

// Função para verificar se o usuário existe
function userExists($username) {
    $usersFile = 'users.txt';
    $users = file($usersFile, FILE_IGNORE_NEW_LINES);
    foreach ($users as $user) {
        $userInfo = explode('|', $user);
        if ($userInfo[0] === $username) {
            return true;
        }
    }
    return false;
}

// Função para verificar o login
function loginUser($username, $password) {
    $usersFile = 'users.txt';
    $users = file($usersFile, FILE_IGNORE_NEW_LINES);
    foreach ($users as $user) {
        $userInfo = explode('|', $user);
        if ($userInfo[0] === $username && password_verify($password, $userInfo[2])) {
            return true;
        }
    }
    return false;
}
?>
