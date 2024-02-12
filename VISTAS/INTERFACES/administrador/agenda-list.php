<?php require_once "../vistas/parte_superior.php";?>
<?php 
	include "../../../MODELOS/conexion.php";
	$res = $conexion->query("SELECT Usuario.Nombre, Agenda.Estado, Agenda.id_agenda, Agenda.FechaInicial, Agenda.FechaFinal,
	Agenda.HoraInicial, Agenda.HoraFinal from Usuario inner join 
	Agenda on Usuario.NumeroDoc = Agenda.NumeroDoc and Agenda.Estado = 1")->fetchall();
?>
            <!-- Page header -->
            <div class="full-box page-header">
                <h3 class="text-left">
                    <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE AGENDAS
                </h3>
                <p class="text-justify">
                    Aca podras ver las agendas de los doctores
                </p>
            </div>
            <div class="container-fluid">
                <ul class="full-box list-unstyled page-nav-tabs">
                    <li>
                        <a href="agenda-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR AGENDAS</a>
                    </li>
                    <li>
                        <a class="active" href="agenda-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE AGENDAS</a>
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
				<div class="table-responsive">
					<table class="table table-dark table-sm">
                    <?php
						echo '<thead>
						<tr class="text-center roboto-medium">
							<th>Id de agenda</th>
							<th>Fecha inicial</th>
							<th>Fecha final</th>
							<th>Hora inicial</th>
							<th>Hora final</th>
							<th>Odontologo</th>
							<th>Actualizar</th>
							<th>Eliminar</th>
						</tr>
						</thead>';
						foreach ($res as $fila){
							echo '<tbody> 
							<tr class="text-center">								
							<td>'.$fila['id_agenda'].'</td>
							<td>'.$fila['FechaInicial'].'</td>
							<td>'.$fila['FechaFinal'].'</td>
							<td>'.$fila['HoraInicial'].'</td>
							<td>'.$fila['HoraFinal'].'</td>
							<td>'.$fila['Nombre'].'</td>
							<td>
								<a href="agenda-update.php?upd='.$fila["id_agenda"].' class="btn btn-success">
	  								<i class="fas fa-sync-alt"></i>	
								</a>
							</td>
							<td>
                                <a href="/Proyecto/CONTROLADORES/Eliminar_agendas.php?del='.$fila["id_agenda"].'" onclick="return ConfirmarEliminacion();" type="button" class="btn btn-warning">
                                    <i class="far fa-trash-alt"></i>
                                </a>
							</td>
							</tr>';
						}
						?>
						</tbody>
					</table>
				</div>
				<p class="text-center" style="margin-top: 20px;">
					<a href="../../../CONTROLADORES/pdf-agenda.php">
					<button type="submit" class="btn btn-raised btn-info"><i class="far fa-file-word"></i> &nbsp; IMPRIMIR</button>
					</a>
				</p>
			</div>
        </section>
		
		<?php require_once "../vistas/parte_inferior.php"?>
