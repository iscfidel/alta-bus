<?php include_once(__DIR__ . '/../../app/helpers/routes.php'); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo assets('login.css'); ?>">
</head>

<body>
    <div class="login-container">
        <div class="login-box">
            <div class="login-logo">
                <img src="<?php echo assets('logoblanco.jpg'); ?>" alt="Logo Metrorrey" style="border-radius: 50%; border: 2px solid #dee2e6; box-shadow: 0 2px 8px rgba(0,0,0,0.08); width: 90px; height: 90px; object-fit: cover;">
            </div>
            <div class="login-title">Inicio de Sesión</div>
            <?php if (!empty($error)): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
            <form action="/alta_buses/login" method="POST">
                <div class="mb-3">
                    <div class="form-floating mb-3">
                        <input type="text" name="usuario" class="form-control" id="floatingInput" placeholder="Usuario" required>
                        <label for="floatingInput">Usuario</label>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Contraseña" required>
                        <label for="floatingPassword">Contraseña</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-login mt-2">Ingresar</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>