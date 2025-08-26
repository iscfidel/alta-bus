
<?php
require_once __DIR__ . '/core/autoload.php';
session_start();
$url = isset($_GET['url']) ? trim($_GET['url'], '/') : '';

switch ($url) {
    case 'subir-archivo':
        require_once 'app/controllers/subirArchivoController.php';
        break;
    case 'buscar':
        require_once 'app/controllers/buscarController.php';
        break;
    case 'login':
        require_once 'public/views/login.php';
        break;
    case 'search-bus':
        require_once 'public/views/search-bus.php';
        break;
    case '':
        require_once 'public/views/search-bus.php';
        break;
    default:
        http_response_code(404);
        echo 'Página no encontrada.';
        break;
}
?>