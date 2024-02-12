<?php require_once "../vistas/parte_superior.php";?>
<?php 
	include "../../../MODELOS/conexion.php";
	$res = $conexion->query("SELECT * FROM usuario where Estado = 0")->fetchall();
?>

			<!-- Page header -->
			<div class="full-box page-header">
				<h3 class="text-left">
					<i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE USUARIOS
				</h3>
				<p class="text-justify">
					Aca podras ver tus usuarios 
				</p>
			</div>
			
			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a href="user-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO USUARIO</a>
					</li>
					<li>
						<a href="user-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE USUARIOS</a>
					</li>
					<li>
						<a href="user-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR USUARIO</a>
					</li>
                    <li>
						<a class="active" href="user-inactivo.php"><i class="fas fa-book"></i> &nbsp; LISTA DE ELIMINADOS</a>
					</li>
				</ul>	
			</div>

			<!-- Content -->
			<div class="container-fluid">
				<div class="table-responsive">
					<table class="table table-dark table-sm">
						<?php
						echo '<thead>
						<tr class="text-center roboto-medium">
							<th>Numero de documento</th>
							<th>Nombre</th>
							<th>Contraseña</th>
							<th>Tipo de documento</th>
							<th>Fecha de nacimiento</th>
							<th>Telefono</th>
							<th>Correo</th>
							<th>Nombre de user</th>
							<th>Direccion</th>
							<th>Rol</th>
							<th>Titulo Universitario</th>
							<th>Fecha Entrega Titulo</th>
							<th>Nombre Universidad</th>
							<th>Años de experiencia</th>
							<th>Especializacion</th>
							<th>Activar</th>
						</tr>
						</thead>';
						foreach ($res as $fila){
							echo '<tbody> 
							<tr class="text-center">								
							<td>'.$fila['NumeroDoc'].'</td>
							<td>'.$fila['Nombre'].'</td>
							<td>'.$fila['Contrasena'].'</td>
							<td>'.$fila['TipoDoc'].'</td>
							<td>'.$fila['FechaNacimiento'].'</td>
							<td>'.$fila['Telefono'].'</td>
							<td>'.$fila['Correo'].'</td>
							<td>'.$fila['NombreUsuario'].'</td>
							<td>'.$fila['Direccion'].'</td>
							<td>'.$fila['Rol'].'</td>
							<td>'.$fila['TituloUniversitario'].'</td>
							<td>'.$fila['FechaEntregaTitulo'].'</td>
							<td>'.$fila['NombreUniversidad'].'</td>
							<td>'.$fila['AnosExperiencia'].'</td>
							<td>'.$fila['Especializacion'].'</td>
							<td>
									<a href="/Proyecto/CONTROLADORES/Activar_usuarios.php?act='.$fila["NumeroDoc"].'" type="button" class="btn btn-success">
	  									<i class="fas fa-user-plus"></i>
									</a>
							</td>
							</tr>';
						}
						?>
						</tbody>
					</table>
				</div>
			</div>

		</section>

		<?php require_once "../vistas/parte_inferior.php"?>