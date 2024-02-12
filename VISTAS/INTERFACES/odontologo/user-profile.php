<?php require_once "../vistas/parte_superior.php";?>
<?php
	include "../../../MODELOS/conexion.php";
	if(isset($_GET['upd']))  $NumeroDoc = $_GET['upd'];
	$sql = ("SELECT * FROM usuario WHERE NumeroDoc = :NumeroDoc");
	$stmt = $conexion->prepare($sql);
	$stmt -> bindParam(":NumeroDoc", $NumeroDoc);
	$stmt -> execute();
	$count = $stmt -> rowCount();

	if ($count > 0){
		$datos = $stmt -> fetch();
	}
?>

			<!-- Page header -->
			<div class="full-box page-header">
				<h3 class="text-left">
					<i class="fas fa-sync-alt fa-fw"></i> &nbsp; TU PERFIL
				</h3>
				<p class="text-justify">
					Aca podras actualizar tu perfil
				</p>
			</div>
			
			<!-- Content -->
			<div class="container-fluid">
				<form method="post" action="/Proyecto/CONTROLADORES/Actualizacion_usuarios.php" class="form-neon" autocomplete="off" enctype="multipart/form-data">
					<fieldset>
						<legend><i class="fas fa-user"></i> &nbsp; Información básica</legend>
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="usuario_Num" class="bmd-label-floating">Numero de documento</label>
										<input value="<?= $datos['NumeroDoc'] ?>" type="text" pattern="[0-9-]{1,20}" class="form-control" name="Num" id="Num" maxlength="27" required  readonly>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="usuario_Nombre" class="bmd-label-floating">Nombre</label>
										<input value="<?= $datos['Nombre'] ?>" type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control" name="Nombre" id="Nombre" maxlength="40" required>
									</div>
								</div>
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="usuario_Con" class="bmd-label-floating">Contraseña</label>
										<input value="<?= $datos['Contrasena'] ?>" type="password" class="form-control" name="Con" id="Con" maxlength="200" required>
									</div>
								</div>
								<div class="col-12 col-md-4">
	                                    <div class="form-group">
	                                        <label for="usuario_TipoDoc" class="bmd-label-floating">Tipo Documento</label>
	                                        <select value="<?= $datos['TipoDoc'] ?>" class="form-control" name="TipoDoc" id="TipoDoc" required>
	                                            <option value="" selected="" disabled="">Seleccione una opción</option>
	                                            <?php
												if($datos['TipoDoc'] == 'CC') { ?>
	                                            <option value="CC" selected>Cedula Ciudadania</option>
	                                            <option value="TI">Tarjeta Identidad</option>
	                                            <option value="CE">Cedula Extranjera</option>
												<option value="PASAPORTE">Pasaporte</option>
	                                            <option value="REGISTRO CIVIL">Registro Civil</option>
												<?php } ?>
												<?php
												if($datos['TipoDoc'] == 'TI') { ?>
	                                            <option value="CC">Cedula Ciudadania</option>
	                                            <option value="TI" selected>Tarjeta Identidad</option>
	                                            <option value="CE">Cedula Extranjera</option>
												<option value="PASAPORTE">Pasaporte</option>
	                                            <option value="REGISTRO CIVIL">Registro Civil</option>
												<?php } ?>
												<?php
												if($datos['TipoDoc'] == 'CE') { ?>
	                                            <option value="CC">Cedula Ciudadania</option>
	                                            <option value="TI">Tarjeta Identidad</option>
	                                            <option value="CE" selected>Cedula Extranjera</option>
												<option value="PASAPORTE">Pasaporte</option>
	                                            <option value="REGISTRO CIVIL">Registro Civil</option>
												<?php } ?>
												<?php
												if($datos['TipoDoc'] == 'PASAPORTE') { ?>
	                                            <option value="CC">Cedula Ciudadania</option>
	                                            <option value="TI">Tarjeta Identidad</option>
	                                            <option value="CE">Cedula Extranjera</option>
												<option value="PASAPORTE" selected>Pasaporte</option>
	                                            <option value="REGISTRO CIVIL">Registro Civil</option>
												<?php } ?>
												<?php
												if($datos['TipoDoc'] == 'REGISTRO CIVIL') { ?>
	                                            <option value="CC">Cedula Ciudadania</option>
	                                            <option value="TI">Tarjeta Identidad</option>
	                                            <option value="CE">Cedula Extranjera</option>
												<option value="PASAPORTE">Pasaporte</option>
	                                            <option value="REGISTRO CIVIL" selected>Registro Civil</option>
												<?php } ?>
	                                        </select>
	                                    </div>
	                                </div>
								<div class="col-12 col-md-4">
										<div class="form-group">
											<label for="usuario_FechaNac">Fecha de nacimiento</label>
											<input value="<?= $datos['FechaNacimiento'] ?>" type="date" class="form-control" name="FechaNac" id="FechaNac" required>
										</div>
									</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="usuario_Tele" class="bmd-label-floating">Teléfono</label>
										<input value="<?= $datos['Telefono'] ?>" type="text" pattern="[0-9()+]{1,20}" class="form-control" name="Tele" id="Tele" maxlength="20">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="usuario_Correo" class="bmd-label-floating">Correo electronico</label>
										<input value="<?= $datos['Correo'] ?>" type="email" class="form-control" name="Correo" id="Correo" maxlength="70" required>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="usuario_NombreU" class="bmd-label-floating">Nombre de usuario</label>
										<input value="<?= $datos['NombreUsuario'] ?>" type="text" class="form-control" name="NombreU" id="NombreU" maxlength="40" required>
									</div>
								</div>
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="usuario_Direccion1" class="bmd-label-floating">Dirección</label>
										<input value="<?= $datos['Direccion'] ?>" type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ#- ]{1,150}" class="form-control" name="Direccion1" id="Direccion1" maxlength="150" required>
									</div>
								</div>
								<div class="col-12 col-md-4">
	                                    <div class="form-group">
	                                        <label for="usuario_Rol1" class="bmd-label-floating">Rol</label>
	                                        <select class="form-control" name="Rol1" id="Rol1">
	                                            <option value="" selected="" disabled="">Seleccione una opción</option>
	                                            <option value="Odontologo">Odontologo</option>
	                                        </select>
	                                    </div>
	                                </div>
                                    <div class="col-12 col-md-4">
	                                    <div class="form-group">
	                                        <label for="usuario_TituloUniversitario" class="bmd-label-floating">Titulo universitario</label>
	                                        <select value="<?= $datos['TituloUniversitario'] ?>" class="form-control" name="TituloUniversitario1" id="TituloUniversitario1">
	                                            <option value="" selected="" disabled="">Seleccione una opción</option>
	                                            <?php 
												if($datos['TituloUniversitario'] == "Posee"){?>
	                                            <option value="Posee" selected>Posee</option>
	                                            <option value="No posee">No posee</option>
												<?php } ?>
												<?php 
												if($datos['TituloUniversitario'] == "No posee"){?>
	                                            <option value="Posee">Posee</option>
	                                            <option value="No posee" selected>No posee</option>
												<?php } ?>
												<?php 
												if($datos['TituloUniversitario'] == null){?>
	                                            <option value="Posee">Posee</option>
	                                            <option value="No posee">No posee</option>
												<?php } ?>
	                                        </select>
	                                    </div>
	                                </div>
								<div class="col-12 col-md-4">
										<div class="form-group">
											<label for="usuario_FechaEntregaTitulo1">Fecha de entrega del titulo</label>
											<input value="<?= $datos['FechaEntregaTitulo'] ?>" type="date" class="form-control" name="FechaEntregaTitulo1" id="FechaEntregaTitulo1">
										</div>
									</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="usuario_NombreUniversidad1" class="bmd-label-floating">Nombre de Universidad</label>
										<input value="<?= $datos['NombreUniversidad'] ?>" type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control" name="NombreUniversidad1" id="NombreUniversidad1" maxlength="40">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="usuario_AnosExperiencia1" class="bmd-label-floating">Años de Experencia</label>
										<input value="<?= $datos['AnosExperiencia'] ?>" type="text" class="form-control" name="AnosExperiencia1" id="AnosExperiencia1" maxlength="40">
									</div>
								</div>
								<div class="col-12 col-md-4">
	                                    <div class="form-group">
	                                        <label for="usuario_Especializacion1" class="bmd-label-floating">Especializacion</label>
	                                        <select value="<?= $datos['Especializacion'] ?>" class="form-control" name="Especializacion1" id="Especializacion1">
	                                            <option value="" selected="" disabled="">Seleccione una opción</option>
	                                            <?php 
												if($datos['Especializacion'] == "Posee"){?>
	                                            <option value="Posee" selected>Posee</option>
	                                            <option value="No posee">No posee</option>
												<?php } ?>
												<?php 
												if($datos['Especializacion'] == "No posee"){?>
	                                            <option value="Posee">Posee</option>
	                                            <option value="No posee" selected>No posee</option>
												<?php } ?>
												<?php 
												if($datos['Especializacion'] == null){?>
	                                            <option value="Posee">Posee</option>
	                                            <option value="No posee">No posee</option>
												<?php } ?>
	                                        </select>
	                                    </div>
	                            </div>
							</div>
						</div>
					</fieldset>
					<br><br><br>
					<p class="text-center" style="margin-top: 40px;">
						<button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp; ACTUALIZAR</button>
					</p>
				</form>
			</div>	
			

		</section>

		<?php require_once "../vistas/parte_inferior.php"?>