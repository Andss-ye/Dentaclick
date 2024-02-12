<?php require_once "../vistas/parte_superior.php";?>


			<!-- Page header -->
			<div class="full-box page-header">
				<h3 class="text-left">
					<i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO USUARIO
				</h3>
				<p class="text-justify">
					Aca podras registrar tus nuevos usuarios
				</p>
			</div>
			
			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a class="active" href="user-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO USUARIO</a>
					</li>
					<li>
						<a href="user-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE USUARIOS</a>
					</li>
					<li>
						<a href="user-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR USUARIO</a>
					</li>
					<li>
						<a href="user-inactivo.php"><i class="fas fa-book"></i> &nbsp; LISTA DE ELIMINADOS</a>
					</li>
				</ul>	
			</div>
			
			<!-- Content here-->
			<div class="container-fluid">
				<form method="post" action="/Proyecto/CONTROLADORES/Registro_todos_usuarios.php" class="form-neon" autocomplete="off">
					<fieldset>
						<legend><i class="fas fa-user"></i> &nbsp; Información básica</legend>
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="usuario_Num" class="bmd-label-floating">Numero de documento</label>
										<input type="text" pattern="[0-9-]{1,20}" class="form-control" name="Num" id="Num" maxlength="27" required>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="usuario_Nombre" class="bmd-label-floating">Nombre</label>
										<input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control" name="Nombre" id="Nombre" maxlength="40" required>
									</div>
								</div>
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="usuario_Con" class="bmd-label-floating">Contraseña</label>
										<input type="password" class="form-control" name="Con" id="Con" maxlength="200" required>
									</div>
								</div>
								<div class="col-12 col-md-4">
	                                    <div class="form-group">
	                                        <label for="usuario_TipoDoc" class="bmd-label-floating">Tipo Documento</label>
	                                        <select class="form-control" name="TipoDoc" id="TipoDoc" required>
	                                            <option value="" selected="" disabled="">Seleccione una opción</option>
	                                            <option value="CC">Cedula Ciudadania</option>
	                                            <option value="TI">Tarjeta Identidad</option>
	                                            <option value="CE">Cedula Extranjera</option>
												<option value="PASAPORTE">Pasaporte</option>
	                                            <option value="REGISTRO CIVIL">Registro Civil</option>
	                                        </select>
	                                    </div>
	                                </div>
								<div class="col-12 col-md-4">
										<div class="form-group">
											<label for="usuario_FechaNac">Fecha de nacimiento</label>
											<input type="date" class="form-control" name="FechaNac" id="FechaNac" required>
										</div>
									</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="usuario_Tele" class="bmd-label-floating">Teléfono</label>
										<input type="text" pattern="[0-9()+]{1,20}" class="form-control" name="Tele" id="Tele" maxlength="20">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="usuario_Correo" class="bmd-label-floating">Correo electronico</label>
										<input type="email" class="form-control" name="Correo" id="Correo" maxlength="70" required>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="usuario_NombreU" class="bmd-label-floating">Nombre de usuario</label>
										<input type="text" class="form-control" name="NombreU" id="NombreU" maxlength="40" required>
									</div>
								</div>
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="usuario_Direccion1" class="bmd-label-floating">Dirección</label>
										<input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ#- ]{1,150}" class="form-control" name="Direccion1" id="Direccion1" maxlength="150" required>
									</div>
								</div>
								<div class="col-12 col-md-4">
	                                    <div class="form-group">
	                                        <label for="usuario_Rol1" class="bmd-label-floating">Rol</label>
	                                        <select class="form-control" name="Rol1" id="Rol1">
	                                            <option value="" selected="" disabled="">Seleccione una opción</option>
	                                            <option value="Cliente">Cliente</option>
	                                            <option value="Odontologo">Odontologo</option>
	                                            <option value="Administrador">Administrador</option>
												<option value="Auxiliar_Odontologia">Auxiliar de odontologia</option>
	                                        </select>
	                                    </div>
	                                </div>
									<div class="col-12 col-md-4">
	                                    <div class="form-group">
	                                        <label for="usuario_TituloUniversitario" class="bmd-label-floating">Titulo universitario</label>
	                                        <select class="form-control" name="TituloUniversitario1" id="TituloUniversitario1">
	                                            <option value="" selected="" disabled="">Seleccione una opción</option>
	                                            <option value="Posee">Posee</option>
	                                            <option value="No posee">No posee</option>
	                                        </select>
	                                    </div>
	                                </div>
								<div class="col-12 col-md-4">
										<div class="form-group">
											<label for="usuario_FechaEntregaTitulo1">Fecha de entrega del titulo</label>
											<input type="date" class="form-control" name="FechaEntregaTitulo1" id="FechaEntregaTitulo1">
										</div>
									</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="usuario_NombreUniversidad1" class="bmd-label-floating">Nombre de Universidad</label>
										<input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control" name="NombreUniversidad1" id="NombreUniversidad1" maxlength="40">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="usuario_AnosExperiencia1" class="bmd-label-floating">Años de Experencia</label>
										<input type="text" class="form-control" name="AnosExperiencia1" id="AnosExperiencia1" maxlength="40">
									</div>
								</div>
								<div class="col-12 col-md-4">
	                                    <div class="form-group">
	                                        <label for="usuario_Especializacion1" class="bmd-label-floating">Especializacion</label>
	                                        <select class="form-control" name="Especializacion1" id="Especializacion1">
	                                            <option value="" selected="" disabled="">Seleccione una opción</option>
	                                            <option value="Posee">Posee</option>
	                                            <option value="No posee">No posee</option>
	                                        </select>
	                                    </div>
	                            </div>
							</div>
						</div>
					</fieldset>
					<br><br><br>
					<p class="text-center" style="margin-top: 40px;">
						<button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp; LIMPIAR</button>
						&nbsp; &nbsp;
						<button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp; GUARDAR</button>
					</p>
				</form>
			</div>	
			

		</section>

		<?php require_once "../vistas/parte_inferior.php"?>