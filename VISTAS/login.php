<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap 5.2 -->
	<link rel="stylesheet" href="BS-index/css/bootstrap.min.css">
    <!-- diseño basico -->
    <link rel="stylesheet" href="BS-index/css/main.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="INTERFACES/css/all.css">

    <title>Login</title>
</head>
<body>
    <?php
    include"menu.html";
    ?>
    <div class="container w-75 mt-3 shadow-lg mb-5 bg-body rounded">
        <div class="row align-items-stretch">
            <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6">

            </div>
            <div class="col p-5">
                <h2 class="fw-bold text-center py-5">
                    <i class="fas fa-heart"></i> Bienvenido
                </h2>

                <!-- Login -->
                <form action="../CONTROLADORES/Login.php" method="post" class="needs-validation" novalidate>
                    <div class="mb-4">
                        <i class="fas fa-at"></i>
                        <label for="email" class="form-label">Correo electronico</label>
                        <input type="email" class="form-control rounded-0" name="Correo" placeholder="email" required>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Pon tu correo electronico</div>
                    </div>
                    <div class="mb-4">
                        <i class="fas fa-key"></i>
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control rounded-0" name="Password" placeholder="password" required>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Pon tu contraseña</div>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark rounded-0 boton-1">Iniciar Sesión</button>
                    </div>
                    <div class="my-3">
                        <span>¿No tienes una cuenta? <a href="register.php">Regístrate</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
            }, false)
        })
        })()    
    </script>


    <!-- js bootstrap -->

	<!-- popper -->
	<script src="BS-index/js/popper.js"></script>

    <!-- Bootstrap V5.2 -->
    <script src="BS-index/js/bootstrap.min.js"></script>
</body>
</html>