<?php require_once "../vistas/parte_superior.php";?>
<?php
	include "../../../MODELOS/conexion.php";
	if(isset($_GET['upd']))  
	$id_agenda = $_GET['upd'];
	$sql = ("SELECT * FROM agenda WHERE id_agenda = :id_agenda");
	$stmt = $conexion->prepare($sql);
	$stmt -> bindParam(":id_agenda", $id_agenda);
	$stmt -> execute();
	$count = $stmt -> rowCount();

	if ($count > 0){
		$datos = $stmt -> fetch();
	}

	$res = $conexion->query("SELECT * from usuario where Rol = 'Odontologo'or Rol = 'Administrador'")->fetchall();
?>
            <!-- Page header -->
            <div class="full-box page-header">
                <h3 class="text-left">
                    <i class="fas fa-sync-alt fa-fw"></i> &nbsp; ACTUALIZAR AGENDAS
                </h3>
                <p class="text-justify">
					Aca podras actualizar las agendas.
				</p>
            </div>
            <div class="container-fluid">
                <ul class="full-box list-unstyled page-nav-tabs">
                    <li>
                        <a href="agenda-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR AGENDAS</a>
                    </li>
                    <li>
                        <a href="agenda-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE AGENDAS</a>
                    </li>
					<li>
                        <a href="agenda-eliminated.php"><i class="fas fa-ban fa-fw"></i> &nbsp; AGENDAS ELIMINADAS</a>
                    </li>
                    <li>
                        <a href="agenda-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR AGENDAS</a>
                    </li>
                </ul>
            </div>
        
            <!--CONTENT-->
            <div class="container-fluid">
				<form method="post" action="/Proyecto/CONTROLADORES/Actualizacion_agendas.php" class="form-neon" autocomplete="off">
					<fieldset>
						<legend><i class="far fa-plus-square"></i> &nbsp; Información de la agenda</legend>
						<div class="container-fluid">
							<div class="row">
							<div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="cita-id_agenda" class="bmd-label-floating">id de la agenda</label>
                                            <input value="<?= $datos['id_agenda'] ?>" type="text" pattern="[0-9-]{1,20}" class="form-control" name="id_agenda" id="id_agenda" maxlength="20" required readonly>
                                        </div>
								    </div>
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="agenda-FechaInicial1">Fecha inicial</label>
										<input value="<?= $datos['FechaInicial'] ?>" type="date" class="form-control" name="FechaInicial1" id="FechaInicial1" required>
									</div>
								</div>
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="agenda-FechaFinal1">Fecha final</label>
										<input value="<?= $datos['FechaFinal'] ?>" type="date" class="form-control" name="FechaFinal1" id="FechaFinal1" required>
									</div>
								</div>
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="agenda-HoraInicial1">Hora inicial</label>
										<input value="<?= $datos['HoraInicial'] ?>" type="time" class="form-control" name="HoraInicial1" id="HoraInicial1" min="06:00:00" required>
									</div>
								</div>
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="agenda-HoraFinal1">Hora final</label>
										<input value="<?= $datos['HoraFinal'] ?>" type="time" class="form-control" name="HoraFinal1" id="HoraFinal1" max="20:00:00" required>
									</div>
								</div>
								<div class="col-12 col-md-4">
	                                    <div class="form-group">
	                                        <label for="agenda-NumeroDoc1" class="bmd-label-floating">Odontologo</label>
	                                        <select class="form-control" name="NumeroDoc1" id="NumeroDoc1" required>
	                                            <option value="" selected="" disabled="">Seleccione una opción</option>
												<?php foreach ($res as $odontologo){ ?>
													<option value="<?php echo $odontologo['NumeroDoc']?>"><?php echo $odontologo['Nombre']?></option>  
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
        </section>
    
        <?php require_once "../vistas/parte_inferior.php"?>