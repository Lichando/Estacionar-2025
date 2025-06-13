<!DOCTYPE html>
<html lang="es">

<head>
    <?= $head ?>
    <title> <?= $title ?></title>
</head>

<body class="bg-white d-flex justify-content-center align-items-center vh-100">
    <div class="container text-center p-4 shadow rounded bg-light" style="max-width: 400px;">
        <form action="" method="post">
            <div class="mb-2">
                <h1 class="mb-3" style="color:#0022b2; font-weight:500;">Registrarse</h1>
                <img src="../img/favicon.png" alt="branding-app" class="img-fluid" style="max-width: 100px;">
            </div>
            <div class="mb-2">
                <h2>Crear cuenta</h2>
                <p class="text-muted">Complete el formulario para crear una cuenta</p>
            </div>
            <div class="mb-2">
                <input type="text" name="nombre"  class="form-control"
                    placeholder="Nombre completo" autocomplete="off">
            </div>
            <div class="mb-2">
                <input type="email" name="mail"  class="form-control"
                    placeholder="email@dominio.com"  autocomplete="off">
            </div>
            <div class="mb-2">
                <input type="password" name="pass"  class="form-control"
                    placeholder="Contraseña"  autocomplete="off">
            </div>

            <?php if (!empty($error)): ?>
                <div class="position-relative mb-3">
                    <?php foreach ($error as $e): ?>
                        <output class="text-danger small fw-semibold d-block p-2 mt-1">
                            <?= htmlspecialchars($e) ?>
                        </output>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <div class="mb-4">
                <button class="btn btn-primary w-100" name="register" type="submit">Registrarse</button>
            </div>
            <div class="d-flex align-items-center mb-4">
                <hr class="flex-grow-1">
                <p class="mx-2 mb-0">¿Ya tienes cuenta?</p>
                <hr class="flex-grow-1">
            </div>
            <div class="mb-4">
                <a href="login"
                    class="btn btn-outline-secondary w-100 d-flex align-items-center justify-content-center">
                    Iniciar sesión
                </a>
            </div>
            <div class="text-muted text-sm">
                <p class="mb-0">
                    Al registrarte, aceptas nuestros
                    <a href="../privacy/policies" class="text-decoration-none">términos de servicio</a> y
                    <a href="../privacy/policies" class="text-decoration-none">políticas de privacidad</a>.
                </p>
            </div>
        </form>
    </div>
</body>

</html>
