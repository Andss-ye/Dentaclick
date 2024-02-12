<?php require_once "../vistas/parte_superior.php";?>
<?php 
	include "../../../MODELOS/conexion.php";
	$res = $conexion->query("SELECT Usu1.Nombre as 'Cliente', Cita_Medica.id_cita, Cita_Medica.Fecha, Cita_Medica.Descripcion, 
	Cita_medica.Hora, Cita_Medica.Estado, Cita_Medica.id_agenda, Usu2.Nombre as 'Doctor',
	Cita_Medica.id_cita from Usuario as Usu1 inner join Cita_Medica on Usu1.NumeroDoc = Cita_Medica.NumeroDocSolicitante 
	inner join Usuario as Usu2 on Cita_Medica.NumeroDocAtiende = Usu2.NumeroDoc and Cita_Medica.Estado = 'Se cancelo' order by Cita_Medica.id_cita;")->fetchall();
?>
            <!-- Page header -->
            <div class="full-box page-header">
                <h3 class="text-left">
                    <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE CITAS
                </h3>
                <p class="text-justify">
                    Aca podras ver tus citas 
                </p>
            </div>
            <div class="container-fluid">
                <ul class="full-box list-unstyled page-nav-tabs">
                    <li>
                        <a href="cita-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVA CITA </a>
                    </li>
                    <li>
                        <a href="cita-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE CITAS</a>
                    </li>
                    <li>
                        <a href="cita-realized.php"><i class="fas fa-check fa-fw"></i> &nbsp; CITAS REALIZADAS</a>
                    </li>
                    <li>
                        <a class="active" href="cita-canceled.php"><i class="fas fa-ban fa-fw"></i> &nbsp; CITAS CANCELADAS</a>
                    </li>
                    <li>
                        <a href="cita-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR CITAS</a>
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
							<th>id de cita</th>
							<th>Fecha</th>
							<th>Descripcion</th>
							<th>Hora</th>
							<th>Estado</th>
							<th>Solicitante</th>
							<th>Odontologo que atiende</th>
							<th>id de agenda</th>
						</tr>
						</thead>';
						foreach ($res as $fila){
							echo '<tbody> 
							<tr class="text-center">								
							<td>'.$fila['id_cita'].'</td>
							<td>'.$fila['Fecha'].'</td>
							<td>'.$fila['Descripcion'].'</td>
							<td>'.$fila['Hora'].'</td>
							<td>'.$fila['Estado'].'</td>
							<td>'.$fila['Cliente'].'</td>
							<td>'.$fila['Doctor'].'</td>
							<td>'.$fila['id_agenda'].'</td>
							</tr>';
						}
						?>
						</tbody>
					</table>
				</div>
			</div>
        </section>

		<?php require_once "../vistas/parte_inferior.php"?>