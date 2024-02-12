<?php
    $full = date("Y-m-d");
?>
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

    <title>Register</title>
</head>
<body>
    <?php
    include "menu.html"
    ?>
    <div class="container w-75 mt-3 shadow-lg mb-5 rounded">
            <div class="col p-3">
                <h2 class="fw-bold text-center py-5">
                    Crea tu cuenta <i class="fas fa-plus"></i> 
                </h2>

                <!-- Login -->
                <form action="../CONTROLADORES/Registro_usuarios.php" method="post" class="needs-validation" novalidate>
                    <div class="container px-4 text-center">
                        <div class="row gx-5">
                            <div class="col">
                                <div class="mb-4">
                                    <i class="fas fa-id-card"></i>                                    
                                    <label for="NumDoc" class="form-label">N° documento</label>
                                    <input type="number" class="form-control rounded-0" name="NumDoc" placeholder="N° documento" min="1" max="9999999999" required>
                                    <div class="valid-feedback"></div>
                                    <div class="invalid-feedback">Ponga su numero de documento (Numero hasta 10 digitos)</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-4">
                                    <i class="fas fa-user"></i>                                    
                                    <label for="Nombre" class="form-label">Nombre completo</label>
                                    <input type="text" class="form-control rounded-0" name="Nombre" placeholder="Nombre" required>
                                    <div class="valid-feedback"></div>
                                    <div class="invalid-feedback">Ponga su nombre</div>
                                </div>
                            </div>
                        </div>
                        <div class="row gx-5">
                            <div class="col">
                                <div class="mb-4">
                                    <i class="fas fa-at"></i>
                                    <label for="email" class="form-label">Correo electronico</label>
                                    <input type="email" class="form-control rounded-0" name="Correo" placeholder="email" required>
                                    <div class="valid-feedback"></div>
                                    <div class="invalid-feedback">Ponga su correo electronico</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-4">
                                    <i class="fas fa-key"></i>
                                    <label for="password" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control rounded-0" name="Contrasena" placeholder="password" required>
                                    <div class="valid-feedback"></div>
                                    <div class="invalid-feedback">Ponga una contraseña</div>
                                </div>
                            </div>
                        </div>
                        <div class="row gx-5">
                            <div class="col">
                                <div class="mb-4">
                                    <i class="fas fa-list"></i>                                    
                                    <label for="email" class="form-label">Tipo de documento</label>
                                    <select class="form-select rounded-0" aria-label="Default select example" name="a" required>
                                        <option value="" selected>Seleccione una opcion</option>
                                        <option value="CC" id="CC">Cedula de ciudadania</option>
                                        <option value="TI" id="TI">Tarjeta de identidad</option>
                                        <option value="CE" id="CE">Cedula extranjera</option>
                                        <option value="PASSPORT" id="PASSPORT">Pasaporte</option>
                                        <option value="RC" id="RC">Registro civil</option>
                                      </select>
                                    <div class="valid-feedback"></div>
                                    <div class="invalid-feedback">Ponga su tipo de documento</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-4">
                                    <i class="fas fa-calendar"></i>
                                    <label for="FechaNac" class="form-label">Fecha de nacimiento</label>
                                    <input type="date" class="form-control rounded-0" name="FechaNac" max=<?php echo $full ?> required>
                                    <div class="valid-feedback"></div>
                                    <div class="invalid-feedback">Ponga su fecha de nacimiento</div>
                                </div>
                            </div>
                        </div>
                        <div class="row gx-5">
                            <div class="col">
                                <div class="mb-4">
                                    <i class="fas fa-phone"></i>
                                    <label for="Telefono" class="form-label">Telefono</label>
                                    <input type="number" class="form-control rounded-0" name="Telefono" placeholder="Telefono" required>
                                    <div class="valid-feedback"></div>
                                    <div class="invalid-feedback">Ponga su numero de celular</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-4">
                                    <i class="fas fa-users"></i>
                                    <label for="NombreU" class="form-label">Nombre de usuario</label>
                                    <input type="text" class="form-control rounded-0" name="NombreU" placeholder="Nombre Usuario" minlength="5" maxlength="50" required>
                                    <div class="valid-feedback"></div>
                                    <div class="invalid-feedback">Ponga un nombre de usuario (Minimo 5 y maximo 50 caracteres)</div>
                                </div>
                            </div>
                        </div>
                        <div class="row gx-5">
                            <div class="col">
                                <div class="mb-4">
                                    <i class="fas fa-location-arrow"></i>
                                    <label for="Direccion" class="form-label">Direccion</label>
                                    <input type="text" class="form-control rounded-0" name="Direccion" placeholder="Direccion" required>
                                    <div class="valid-feedback"></div>
                                    <div class="invalid-feedback">Ponga su direccion</div>
                                </div>
                            </div>
                        </div>
                      </div>
                    <div class="d-grid mt-3">
                        <button type="submit" class="btn btn-dark rounded-0 boton-1">Registrarse</button>
                    </div>
                    <div class="my-3">
                        <span>¿Ya tienes cuenta? <a href="login.php">inicie sesión</a></span>
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