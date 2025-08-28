
<?php
require_once __DIR__ . '/core/autoload.php';
$url = isset($_GET['url']) ? trim($_GET['url'], '/') : '';

switch ($url) {
    case 'subir-archivo':
        require_once 'app/controllers/subirArchivoController.php';
        break;
    case 'buscar':
        require_once 'app/controllers/buscarController.php';
        break;
    case 'login':
        require_once 'app/controllers/loginController.php';
        break;
    case 'logout':
        require_once 'app/controllers/logoutController.php';
        break;
    case 'search-bus':
        require_once 'public/views/search-bus.php';
        break;
    case 'home':
        require_once 'public/views/inicio.php';
        break;
    case 'create-password':
        require_once 'public/views/crear-contra.php';
        break;
    case '':
        require_once 'public/views/inicio.php';
        break;
    default:
        http_response_code(404);
        echo 'Página no encontrada.';
        break;
}
?>