<?php require_once "../vistas/parte_superior.php";?>
<?php 
	include "../../../MODELOS/conexion.php";
	$num_doc_session= $_SESSION["numero_doc"];

	$res = $conexion->prepare("SELECT COUNT(*) FROM usuario where Estado = 1");
	$res -> execute();
	$a = $res -> fetchall();

	$res2 = $conexion->prepare("SELECT COUNT(*) FROM agenda where Estado = 1 and NumeroDoc = $num_doc_session");
	$res2 -> execute();
	$b = $res2 -> fetchall();

	$res3 = $conexion->prepare("SELECT COUNT(*) FROM cita_medica where  Estado = 1 and NumeroDocAtiende = $num_doc_session");
	$res3 -> execute();
	$c = $res3 -> fetchall();

	$res4 = $conexion->prepare("SELECT COUNT(*) FROM cita_medica where  Estado = 'Se cancelo' and NumeroDocAtiende = $num_doc_session");
	$res4 -> execute();
	$e = $res4 -> fetchall();

	$res5 = $conexion->prepare("SELECT COUNT(*) FROM cita_medica where cita_medica.NumeroDocAtiende 
	= $num_doc_session and cita_medica.Estado = 'Se realizo'");
	$res5 -> execute();
	$f = $res5 -> fetchall();
?>

			<!-- Page header -->
			<div class="full-box page-header">
				<h3 class="text-left">
					<i class="fab fa-dashcube fa-fw"></i> &nbsp; Inicio
				</h3>
				<p class="text-justify">
					Bienvenid@ a DentaClick el sistema de agendamiento de citas web ;)
				</p>
			</div>
			
			<!-- Content -->
			<div class="full-box tile-container">

				<a href="agenda-list.php" class="tile">
					<div class="tile-tittle">Agendas</div>
					<div class="tile-icon">
						<i class="fas fa-calendar-alt"></i>
						<p><?php echo  $b [0][0]; ?> Registros</p>
					</div>
				</a>

				<a href="cita-list.php" class="tile">
					<div class="tile-tittle">Citas medicas</div>
					<div class="tile-icon">
						<i class="fas fa-folder-open"></i>
						<p><?php echo  $c [0][0]; ?> Registros</p>
					</div>
				</a>

				<a href="cita-canceled.php" class="tile">
					<div class="tile-tittle">Citas canceladas</div>
					<div class="tile-icon">
						<i class="fas fa-ban"></i>
						<p><?php echo  $e [0][0]; ?> Registros</p>
					</div>
				</a>

				<a href="cita-realized.php" class="tile">
					<div class="tile-tittle">Citas realizadas</div>
					<div class="tile-icon">
						<i class="fas fa-check"></i>
						<p><?php echo  $f [0][0]; ?> Registros</p>
					</div>
				</a>

				
			</div>
			

		</section>

<?php require_once "../vistas/parte_inferior.php"?>