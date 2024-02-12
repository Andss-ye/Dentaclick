<?php require_once "../vistas/parte_superior.php";?>
<?php
	include "../../../MODELOS/conexion.php";
	if(isset($_GET['upd']))  $id_cita = $_GET['upd'];
	$sql = ("SELECT * FROM cita_medica WHERE id_cita = :id_cita");
	$stmt = $conexion->prepare($sql);
	$stmt -> bindParam(":id_cita", $id_cita);
	$stmt -> execute();
	$count = $stmt -> rowCount();

	if ($count > 0){
		$datos = $stmt -> fetch();
	}

	$num_doc_session= $_SESSION["numero_doc"];
    $res = $conexion->query("SELECT * from usuario where Rol = 'Cliente'")->fetchall();
    $res1 = $conexion->query("SELECT * from usuario where Rol = 'Odontologo' and NumeroDoc = $num_doc_session")->fetchall();
    $res2 = $conexion->query("SELECT * from agenda where Estado = '1' and NumeroDoc = $num_doc_session")->fetchall();
?>

            <!-- Page header -->
            <div class="full-box page-header">
                <h3 class="text-left">
                    <i class="fas fa-sync-alt fa-fw"></i> &nbsp; ACTUALIZAR CITAS
                </h3>
                <p class="text-justify">
                    Aca se pueden actualizar citas medicas.
            </p>
            </div>
            <div class="container-fluid">
                <ul class="full-box list-unstyled page-nav-tabs">
                    <li>
                        <a href="cita-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVA CITA</a>
                    </li>
                    <li>
                        <a href="cita-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE CITAS</a>
                    </li>
					<li>
                        <a href="cita-realized.php"><i class="fas fa-check fa-fw"></i> &nbsp; CITAS REALIZADAS</a>
                    </li>
					<li>
                        <a href="cita-canceled.php"><i class="fas fa-ban fa-fw"></i> &nbsp; CITAS CANCELADAS</a>
                    </li>
                    <li>
                        <a href="cita-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR CITAS</a>
                    </li>
                </ul>
            </div>
   
            <!--CONTENT-->
            <div class="container-fluid">
            	<div class="container-fluid form-neon">
                    <div class="container-fluid">
                        
					<form method="post" action="/Proyecto/CONTROLADORES/Actualizacion_citas.php" autocomplete="off">
						<fieldset>
							<legend><i class="far fa-plus-square"></i> &nbsp; Información de la cita</legend>
							<div class="container-fluid">
								<div class="row">
                                <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="cita-id_cita" class="bmd-label-floating">id de la cita</label>
                                            <input value="<?= $datos['id_cita'] ?>" type="text" pattern="[0-9-]{1,20}" class="form-control" name="id_cita" id="id_cita" maxlength="20" required readonly>
                                        </div>
								    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="cita-Fecha1">Fecha</label>
                                            <input value="<?= $datos['Fecha'] ?>" type="date" class="form-control" name="Fecha1" id="Fecha1" required>
                                        </div>
                                    </div>
									<div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="cita-Descripcion1" class="bmd-label-floating">Descripción</label>
                                            <input value="<?= $datos['Descripcion'] ?>" type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ#- ]{1,150}" class="form-control" name="Descripcion1" id="Descripcion1" maxlength="150" required>
                                        </div>
								    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="cita-Hora1">Hora</label>
                                            <input value="<?= $datos['Hora'] ?>" type="time" class="form-control" name="Hora1" id="Hora1" required>
                                        </div>
								    </div>
                                    <div class="col-12 col-md-4">
	                                    <div class="form-group">
	                                        <label for="cita-Estado" class="bmd-label-floating">Estado de la cita</label>
	                                        <select class="form-control" name="Estado" id="Estado">
	                                            <option value="<?= $datos['Estado'] ?>" selected="" disabled="">Seleccione una opción</option>
	                                            <option value="Pendiente">Pendiente</option>
	                                            <option value="Se realizo">Se realizo</option>
	                                            <option value="Se cancelo">Se cancelo</option>
	                                        </select>
	                                    </div>
	                                </div>
	                                <div class="col-12 col-md-4">
	                                    <div class="form-group">
	                                        <label for="agenda-NumeroDocSolicitante1" class="bmd-label-floating">Cliente</label>
	                                        <select class="form-control" name="NumeroDocSolicitante1" id="NumeroDocSolicitante1" required>
	                                            <option value="" selected="" disabled="">Seleccione una opción</option>
												<?php foreach ($res as $cliente){ ?>
													<option value="<?php echo $cliente['NumeroDoc']?>"><?php echo $cliente['Nombre']?></option>  
												<?php  } ?>
											</select>
	                                    </div>
	                                </div>
                                    <div class="col-12 col-md-4">
	                                    <div class="form-group">
	                                        <label for="agenda-NumeroDocAtiende1" class="bmd-label-floating">Odontologo</label>
	                                        <select class="form-control" name="NumeroDocAtiende1" id="NumeroDocAtiende1" required>
	                                            <option value="" selected="" disabled="">Seleccione una opción</option>
												<?php foreach ($res1 as $odontologo){ ?>
													<option value="<?php echo $odontologo['NumeroDoc']?>"><?php echo $odontologo['Nombre']?></option>  
												<?php  } ?>
											</select>
	                                    </div>
	                                </div>
                                    <div class="col-12 col-md-4">
	                                    <div class="form-group">
	                                        <label for="agenda-id_agenda1" class="bmd-label-floating">Agenda disponible</label>
	                                        <select class="form-control" name="id_agenda1" id="id_agenda1" required>
	                                            <option value="" selected="" disabled="">Seleccione una opción</option>
												<?php foreach ($res2 as $agenda){ ?>
													<option value="<?php echo $agenda['id_agenda']?>"><?php echo $agenda['id_agenda']?></option>  
												<?php  } ?>
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
			</div>
        </section>

        <?php require_once "../vistas/parte_inferior.php"?>