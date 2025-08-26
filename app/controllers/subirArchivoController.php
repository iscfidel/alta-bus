
<?php
$resultado = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['archivo'])) {
    require_once __DIR__ . '/../services/ArchivoService.php';
    $archivo = $_FILES['archivo'];
    if ($archivo['error'] === UPLOAD_ERR_OK) {
        $nombreTemporal = $archivo['tmp_name'];
        $nombreFinal = __DIR__ . '/../../data/uploads/' . basename($archivo['name']);
        if (!is_dir(__DIR__ . '/../../data/uploads/')) {
            mkdir(__DIR__ . '/../../data/uploads/', 0777, true);
        }
        move_uploaded_file($nombreTemporal, $nombreFinal);
        $datos = ArchivoService::procesarArchivo($nombreFinal);
        if ($datos && is_array($datos)) {
            $resultado = $datos;
        } else {
            $resultado = 'No se pudo procesar el archivo o el formato no es válido.';
        }
    } else {
        $resultado = 'Error al subir el archivo.';
    }
}
// Mostrar la vista principal y pasar el resultado
include __DIR__ . '/../../public/views/search-bus.php';
