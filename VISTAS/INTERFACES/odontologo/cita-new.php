<?php require_once "../vistas/parte_superior.php";?>
<?php
	$num_doc_session= $_SESSION["numero_doc"];
    $res = $conexion->query("SELECT * from usuario where Rol = 'Cliente'")->fetchall();
    $res1 = $conexion->query("SELECT * from usuario where NumeroDoc = $num_doc_session and Rol = 'Odontologo'")->fetchall();
    $res2 = $conexion->query("SELECT * from agenda where NumeroDoc = $num_doc_session and Estado = '1'")->fetchall();

	$res4 = $conexion->query("SELECT Agenda.id_agenda, Cita_medica.Fecha, Cita_medica.Hora from agenda inner join 
	cita_medica on Agenda.id_agenda = Cita_medica.id_agenda inner join usuario on Agenda.NumeroDoc = $num_doc_session
    and usuario.NumeroDoc = $num_doc_session and agenda.Estado = 1 order by Agenda.id_agenda")->fetchall();
?>
 
            <!-- Page header -->
            <div class="full-box page-header">
                <h3 class="text-left">
                    <i class="fas fa-plus fa-fw"></i> &nbsp; CITAS MEDICA 
                </h3>
                <p class="text-justify">
                    Aca podras crear tus citas medicas.
                </p>
            </div>
            <div class="container-fluid">
                <ul class="full-box list-unstyled page-nav-tabs">
                    <li>
                        <a class="active" href="cita-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVAS CITAS</a>
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
					<p class="text-center roboto-medium">INFO DE LAS AGENDAS</p>
					<p class="text-center">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalItem"><i class="fas fa-book"></i> &nbsp; Agendas no disponibles</button>
                    </p>
                        
					<form method="post" action="/Proyecto/CONTROLADORES/Registro_citas_medicas.php" autocomplete="off">
						<fieldset>
							<legend><i class="far fa-plus-square"></i> &nbsp; Información de la cita</legend>
							<div class="container-fluid">
								<div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="cita-Fecha1">Fecha</label>
                                            <input type="date" class="form-control" name="Fecha1" id="Fecha1" required>
                                        </div>
                                    </div>
									<div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="cita-Descripcion1" class="bmd-label-floating">Descripción</label>
                                            <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ#- ]{1,150}" class="form-control" name="Descripcion1" id="Descripcion1" maxlength="150" required>
                                        </div>
								    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="cita-Hora1">Hora</label>
                                            <input type="time" class="form-control" name="Hora1" id="Hora1" required>
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
													<option value="<?php echo $agenda['id_agenda']?>"> <?php echo $agenda['id_agenda']?>
													</option>  
												<?php  } ?>
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
			</div>

			<!-- MODAL AGENDA -->

			<div class="modal fade" id="ModalItem" tabindex="-1" role="dialog" aria-labelledby="ModalItem" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalItem">Agendas no disponibles</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <br>
                            <div class="container-fluid">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered table-sm">
										<?php
										echo '<thead>
										<tr>
											<td>id agendas</td>
											<td>Fechas</td>
											<td>Horas ya ocupadas</td>
										<tr>
										</thead>';
										foreach($res4 as $fila){
                                        echo '<tbody>
                                            <tr class="text-center">
                                                <td>'.$fila['id_agenda'].'</td>
												<td>'.$fila['Fecha'].'</td>
												<td>'.$fila['Hora'].'</td>
                                            </tr>';
										}
											?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <?php require_once "../vistas/parte_inferior.php"?>