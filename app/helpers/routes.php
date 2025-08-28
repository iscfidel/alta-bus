<?php
function assets($route) {
    // Elimina cualquier barra inicial para evitar dobles barras
    $route = ltrim($route, '/');
    $ext = strtolower(pathinfo($route, PATHINFO_EXTENSION));
    $base = "/alta_buses/public/";

    // Mapeo de extensiones a carpetas
    $folders = [
        'css'   => 'styles/',
        'js'    => 'js/',
        'jpg'   => 'img/',
        'jpeg'  => 'img/',
        'png'   => 'img/',
        'gif'   => 'img/',
        'svg'   => 'img/',
        'webp'  => 'img/',
        'php'   => 'views/',
        // Puedes agregar más extensiones y carpetas aquí
    ];

    // Si la extensión está mapeada, usa la carpeta correspondiente
    if (array_key_exists($ext, $folders)) {
        return $base . $folders[$ext] . $route;
    }
    // Si no, asume que es relativo a public
    return $base . $route;
}
?>