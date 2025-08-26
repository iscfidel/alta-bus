<!-- filepath: c:\xampp\htdocs\report\public\views\login.php -->
<?php include_once(__DIR__ . '/../../../app/helpers/routes.php'); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: #f8f9fa;
        }

        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-box {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 16px rgba(0, 0, 0, 0.07);
            padding: 2.5rem 2rem;
            max-width: 400px;
            width: 100%;
        }

        .login-logo {
            display: flex;
            justify-content: center;
            margin-bottom: 1.5rem;
        }

        .login-logo img {
            width: 90px;
            height: auto;
        }

        .form-label {
            color: #495057;
        }

        .form-control {
            background: #f1f3f5;
            border: 1px solid #dee2e6;
        }

        .btn-login {
            background: #1a1085ff;
            color: #fff;
            border-radius: 6px;
            width: 100%;
        }

        .btn-login:hover {
            background: #2326d3ff;
        }

        .login-title {
            text-align: center;
            font-weight: 600;
            color: #343a40;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-box">
            <div class="login-logo">
                <img src="<?php echo assets('logoblanco.jpg'); ?>" alt="Logo Metrorrey" style="border-radius: 50%; border: 2px solid #dee2e6; box-shadow: 0 2px 8px rgba(0,0,0,0.08); width: 90px; height: 90px; object-fit: cover;">
            </div>
            <div class="login-title">Inicio de Sesión</div>
            <form action="" method="post">
                <div class="mb-3">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Usuario</label>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
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