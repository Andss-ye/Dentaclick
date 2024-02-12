<?php
	session_start();
	if (!isset($_SESSION["acceso"])){
		header ("location: ../../login.php");
	}
	include_once "../../../MODELOS/conexion.php";

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Dentaclick</title>

	<!-- Normalize V8.0.1 -->
	<link rel="stylesheet" href="../css/normalize.css">

	<!-- Bootstrap styles 4 -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">

	<!-- Bootstrap material 4 -->
	<link rel="stylesheet" href="../css/bootstrap-material-design.min.css">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="../css/all.css">

	<!-- Sweet Alerts css -->
	<link rel="stylesheet" href="../css/sweetalert2.min.css">

	<!-- Sweet Alert js-->
	<script src="../js/sweetalert2.min.js" ></script>

	<!-- jQuery Custom Content Scroller -->
	<link rel="stylesheet" href="../css/jquery.mCustomScrollbar.css">
	
	<!-- General Styles -->
	<link rel="stylesheet" href="../css/style.css">

	

</head>
<body>
	
	<!-- Main container -->
	<main class="full-box main-container">
		<!-- Nav lateral -->
		<section class="full-box nav-lateral">
			<div class="full-box nav-lateral-bg show-nav-lateral"></div>
			<div class="full-box nav-lateral-content">
				<figure class="full-box nav-lateral-avatar">
					<i class="far fa-times-circle show-nav-lateral"></i>
					<?php if ($_SESSION["roles"] == "Administrador"){ ?>
					<img src="https://i.pinimg.com/564x/67/ae/0f/67ae0f0aba533510419c541bf8575c49.jpg" class="img-fluid" alt="Avatar">
					<?php } ?>
					<?php if ($_SESSION["roles"] == "Cliente"){ ?>
					<img src="https://i.pinimg.com/564x/87/67/64/8767644bc68a14c50addf8cb2de8c59e.jpg" class="img-fluid" alt="Avatar">
					<?php }?>
					<?php if ($_SESSION["roles"] == "Auxiliar_Odontologia"){ ?>
					<img src="https://i.pinimg.com/564x/27/9d/16/279d16432e81d5d701f28518d5c784fe.jpg" class="img-fluid" alt="Avatar">
					<?php }?>
					<?php if ($_SESSION["roles"] == "Odontologo"){ ?>
					<img src="https://i.pinimg.com/564x/3c/56/fb/3c56fbaccd9961a0e2a5c2e5b359c13c.jpg" class="img-fluid" alt="Avatar">
					<?php }?>
					<figcaption class="roboto-medium text-center">
						<?php echo ucwords($_SESSION["nombre"]);?> <br><small class="roboto-condensed-light"><?php echo ucwords($_SESSION["roles"]);?> </small>
					</figcaption>
				</figure>
				<div class="full-box nav-lateral-bar"></div>
				<nav class="full-box nav-lateral-menu">
					<ul>
						<li>
							<a href="home.php"><i class="fa fa-home"></i> &nbsp; Inicio</a>
						</li>
						<!-- ADMINISTRADOR -->
						<?php if($_SESSION["roles"] == 'Administrador'){ ?>
						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-calendar-alt"></i> &nbsp; Agendas <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="agenda-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar Agendas</a>
								</li>
								<li>
									<a href="agenda-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Agendas</a>
								</li>
								<li>
									<a href="agenda-eliminated.php"><i class="fas fa-ban fa-fw"></i> &nbsp; Agendas Eliminadas</a>
								</li>
								<li>
									<a href="agenda-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar Agendas</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-folder-open"></i> &nbsp; Citas Medicas <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="cita-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Nueva Cita Medica</a>
								</li>
								<li>
									<a href="cita-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Citas Medicas</a>
								</li>
								<li>
									<a href="cita-realized.php"><i class="fas fa-check fa-fw"></i> &nbsp; Lista de Citas realizadas</a>
								</li>
								<li>
									<a href="cita-canceled.php"><i class="fas fa-ban fa-fw"></i> &nbsp; Citas canceladas</a>
								</li>
								<li>
									<a href="cita-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar Citas Medicas</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas  fa-users fa-fw"></i> &nbsp; Usuarios <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="user-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Nuevos Usuarios</a>
								</li>
								<li>
									<a href="user-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Usuarios</a>
								</li>
								<li>
									<a href="user-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar Usuarios</a>
								</li>
								<li>
									<a href="user-inactivo.php"><i class="fas fa-book"></i> &nbsp; Lista de eliminados</a>
								</li>
							</ul>
						</li> <?php } ?>

						<!-- CLIENTE -->
						<?php if($_SESSION["roles"] == 'Cliente'){ ?>
						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-calendar-alt"></i> &nbsp; Agendas <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="agenda-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Agendas</a>
								</li>
								<li>
									<a href="agenda-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar Agendas</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-folder-open"></i> &nbsp; Citas Medicas <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="cita-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Nueva Cita Medica</a>
								</li>
								<li>
									<a href="cita-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de sus Citas Medicas</a>
								</li>
								<li>
									<a href="cita-realized.php"><i class="fas fa-check fa-fw"></i> &nbsp; Lista de sus Citas realizadas</a>
								</li>
								<li>
									<a href="cita-canceled.php"><i class="fas fa-ban fa-fw"></i> &nbsp; Sus citas canceladas</a>
								</li>
								<li>
									<a href="cita-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar sus Citas Medicas</a>
								</li>
							</ul>
						</li> <?php } ?>
						<!-- AUXILIAR -->
						<?php if($_SESSION["roles"] == 'Auxiliar_Odontologia'){ ?>
						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-calendar-alt"></i> &nbsp; Agendas <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="agenda-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar Agendas</a>
								</li>
								<li>
									<a href="agenda-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Agendas</a>
								</li>
								<li>
									<a href="agenda-eliminated.php"><i class="fas fa-ban fa-fw"></i> &nbsp; Agendas Eliminadas</a>
								</li>
								<li>
									<a href="agenda-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar Agendas</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-folder-open"></i> &nbsp; Citas Medicas <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="cita-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Nueva Cita Medica</a>
								</li>
								<li>
									<a href="cita-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Citas Medicas</a>
								</li>
								<li>
									<a href="cita-realized.php"><i class="fas fa-check fa-fw"></i> &nbsp; Lista de Citas realizadas</a>
								</li>
								<li>
									<a href="cita-canceled.php"><i class="fas fa-ban fa-fw"></i> &nbsp; Citas canceladas</a>
								</li>
								<li>
									<a href="cita-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar Citas Medicas</a>
								</li>
							</ul>
						</li> <?php } ?>
						<!-- ODONTOLOGO -->
						<?php if($_SESSION["roles"] == 'Odontologo'){ ?>
						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-calendar-alt"></i> &nbsp; Agendas <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="agenda-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar Agendas</a>
								</li>
								<li>
									<a href="agenda-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Agendas</a>
								</li>
								<li>
									<a href="agenda-eliminated.php"><i class="fas fa-ban fa-fw"></i> &nbsp; Agendas Eliminadas</a>
								</li>
								<li>
									<a href="agenda-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar Agendas</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-folder-open"></i> &nbsp; Citas Medicas <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="cita-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Nueva Cita Medica</a>
								</li>
								<li>
									<a href="cita-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Citas Medicas</a>
								</li>
								<li>
									<a href="cita-realized.php"><i class="fas fa-check fa-fw"></i> &nbsp; Lista de Citas realizadas</a>
								</li>
								<li>
									<a href="cita-canceled.php"><i class="fas fa-ban fa-fw"></i> &nbsp; Citas canceladas</a>
								</li>
								<li>
									<a href="cita-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar Citas Medicas</a>
								</li>
							</ul>
						</li> <?php } ?>

					</ul>
				</nav>
			</div>
		</section>
		<section class="full-box page-content">
			<nav class="full-box navbar-info">
				<a href="#" class="float-left show-nav-lateral">
					<i class="fas fa-exchange-alt"></i>
				</a>
				<a href="user-profile.php?upd=<?= $_SESSION["numero_doc"] ?> ">
					<i class="fas fa-user-cog"></i>
				</a>
				<a href="../../../CONTROLADORES/Destroy.php" onclick="return ConfirmarSalida();" class="btn-exit-system">
					<i class="fas fa-power-off"></i>
				</a>
			</nav>