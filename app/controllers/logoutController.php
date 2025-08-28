<?php
// Controlador de logout seguro
session_start();
session_unset();
session_destroy();
header('Location: /alta_buses/login');
exit;
