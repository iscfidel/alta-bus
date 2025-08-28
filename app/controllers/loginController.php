<?php
session_start();
require_once __DIR__ . '/../../data/repositories/UsuarioRepository.php';
require_once __DIR__ . '/../../core/database.php';

$pdo = Database::getInstance()->pdo;
$usuarioRepo = new UsuarioRepository($pdo);

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['usuario'] ?? '';
    $password = $_POST['password'] ?? '';
    $usuario = $usuarioRepo->findByUsername($username);

    if ($usuario && password_verify($password, $usuario['password'])) {
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['username'] = $usuario['username'];
        $_SESSION['roles'] = $usuarioRepo->getRol($usuario['id']);
        $_SESSION['permisos'] = $usuarioRepo->getPermisos($usuario['id']);
        header('Location: /alta_buses/home');
        exit;
    } else {
        $error = 'Usuario o contraseña incorrectos.';
    }
}

include __DIR__ . '/../../public/views/login.php';
