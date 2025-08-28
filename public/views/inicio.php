<?php
session_start();
if (!isset($_SESSION['permisos']) || !in_array('ver_contadores', $_SESSION['permisos'])) {
    header('Location: /alta_buses/login');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    <h1>Este es mi inicio.</h1>
</body>
</html>