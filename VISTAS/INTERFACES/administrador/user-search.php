<?php require_once "../vistas/parte_superior.php";
	include "../../../MODELOS/conexion.php";	
	?>


			<!-- Page header -->
			<div class="full-box page-header">
				<h3 class="text-left">
					<i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR USUARIO
				</h3>
				<p class="text-justify">
					Aca podras buscar tus usuarios
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
						<a class="active" href="user-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR USUARIO</a>
					</li>
					<li>
						<a href="user-inactivo.php"><i class="fas fa-book"></i> &nbsp; LISTA DE ELIMINADOS</a>
					</li>
				</ul>	
			</div>
			
			<!-- Content -->
			<div class="container-fluid">
					<div class="container-fluid">
						<div class="row justify-content-md-center">
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label for="inputSearch" class="bmd-label-floating">¿Qué usuario estas buscando? Pon el nombre</label>
									<input type="text" class="form-control" name="buscar" id="buscar" maxlength="30">
								</div>
							</div>
							<div class="col-12">
								<p class="text-center" style="margin-top: 40px;">
									<button onclick="buscar_ahora($('#buscar').val());" type="submit" class="btn btn-raised btn-info"><i class="fas fa-search"></i> &nbsp; BUSCAR</button>
								</p>
							</div>
						</div>
					</div>
			</div>

			
			<div class="container-fluid">
				<form action="">
					<input type="hidden" name="eliminar-busqueda" value="eliminar">
					<div class="container-fluid">
						<div class="row justify-content-md-center">
							<div class="col-12 col-md-6">
								<p class="text-center" style="font-size: 20px;">
									Resultados de la busqueda
								</p>
							</div>

							<div class="container-fluid">
								<div class="table-responsive">
									<table id="datos_buscador" class="table table-dark table-sm">
										</tbody>
									</table>
								</div>
							</div>
							
							<div class="col-12">
								<p class="text-center" style="margin-top: 20px;">
									<button type="submit" class="btn btn-raised btn-danger"><i class="far fa-trash-alt"></i> &nbsp; ELIMINAR BÚSQUEDA</button>
								</p>
							</div>
						</div>
					</div>
				</form>
			</div>


		</section>

		<script type="text/javascript">
        function buscar_ahora(buscar) {
        var parametros = {"buscar":buscar};
        $.ajax({
        data:parametros,
        type: 'POST',
        url: '../../../CONTROLADORES/Consulta_esp_usuarios.php',
        success: function(data) {
        document.getElementById("datos_buscador").innerHTML = data;
        }
        });
        }
		</script>

		<?php require_once "../vistas/parte_inferior.php"?>