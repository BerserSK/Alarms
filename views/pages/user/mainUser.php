<?php include('includes/header.php'); ?>
<?php require_once "models/conexion.php"; ?>

<?php 

	$lectura = ControladorFormularios::ctrSeleccionar(null);

	if (!isset($_SESSION["validar"]) || $_SESSION["validar"] != "ok" ){
	    echo '<script> window.location = "index.php?pagina=login";</script>';
	    die;	
	}

	if (!isset(	$_SESSION["id_rol_FK"]) || $_SESSION["id_rol_FK"] != 2 ){
		echo '<script> 
		alert("No se puede ingresar a esta pagina!")
		window.location = "index.php?paginaGlobal=login";</script>';
	}
	$_SESSION['user_name'];
	foreach($lectura as $key=>$value);

	
?>


<?php require_once "models/conexion.php"; ?>
<link rel="stylesheet" href="src/style/dashboard.css">

<!-- SIDEBAR -->
<section id="sidebar">
	<a href="index.php?paginaUser=mainUser" class="brand">
		<img src="src/images/logo.svg" class="logo-sidebar" alt="Logo Diebold Nixdorf">
		<span class="text">Diebol Nixdorf</span>
	</a>
	<ul class="side-menu top">
		<li class="active">
			<a href="index.php?paginaUser=mainUser">
				<i class='bx bxs-dashboard'></i>
				<span class="text">Inicio</span>
			</a>
		</li>
		<li class="screen_admin">
			<a href="#">
				<i class='bx bxs-shopping-bag-alt'></i>
				<span class="text">Pantalla Administrativa</span>
			</a>
		</li>
		<li>
			<a href="index.php?paginaUser=record">
				<i class='bx bxs-message-dots'></i>
				<span class="text">Historial / Reportes</span>
			</a>
		</li>
		<li>
			<a href="index.php?paginaUser=managementAlarmsUser">
				<i class='bx bxs-group'></i>
				<span class="text">Informacion ATMs</span>
			</a>
		</li>
	</ul>
	<ul class="side-menu">
		<!--<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>-->
	</ul>
</section>

<!-- SIDEBAR -->



<!-- CONTENT -->
<section id="content">
	<div class="tables-admin">
		<a href="index.php?paginaUser=managementAlarmsUser">
			<i class='bx bxs-shopping-bag-alt'></i>
			<span class="text-tables">Panel Atm's</span>
		</a><br>
		<a href="index.php?paginaUser=record">
			<i class='bx bxs-shopping-bag-alt'></i>
			<span class="text-tables">Panel Historial</span>
		</a>
	</div>
	<!-- NAVBAR -->
	<nav>
		<i class='bx bx-menu'></i>
		<!--<a href="#" class="nav-link">Categories</a-->
		<form action="#">
			<!--<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>-->
		</form>
		<input type="checkbox" id="switch-mode" hidden>
		<label for="switch-mode" class="switch-mode"></label>
		<!--<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a-->
		<a href="#" class="profile">
			<img src="src/images/users.png">
		</a>
		<span class="triangulo"></span>
		<span class="menu" id="menu">
			<p class="menu-user"><?php
					echo $_SESSION['user_name'];
					echo $_SESSION["id_rol_FK"];

                ?></p>
			<p><?php 
					date_default_timezone_set("America/Bogota");
					echo date("d/m/Y | H:iA");
				?></p>
			<li>
				<a href="#" class="logout">
					<i class='bx bxs-log-out-circle'></i>
					<a href="index.php?pagina=logout"><span class="text">Logout</span></a>
				</a>
			</li>
		</span>

	</nav>
	<!-- NAVBAR -->

	<!-- MAIN -->
	<main>
		<div class="head-title">
			<div class="left">
				<h1>Inicio</h1>
				<ul class="breadcrumb">
					<li>
						<a href="#">Dashboard</a>
					</li>
					<li><i class='bx bx-chevron-right'></i></li>
					<li>
						<a class="active" href="#">Inicio</a>
					</li>
				</ul>
			</div>
			<!--<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a>-->
		</div>
		<br>
		<div class="welcome">
			<h3 class="welcome_hello">Hola, </h3>
			<h3 class="users"><?php
					echo $_SESSION['user_name'];
                ?></h3>
		</div>
		<ul class="box-info">
			<li>
				<div class="card">
					<div class="front">
						<p class="title-p">Alarmas</p>
						<i class='bx bxs-calendar-check calendar'></i>
						<span class="text">
							<h3>Gestion</h3>
						</span>
					</div>
					<div class="back">
						<p class="title-p">Alarmas</p>
						<i class='bx bxs-calendar-check'></i>
						<span class="text">
							<button class="btn-primary button-back">Ir a la gestion</button>
						</span>
					</div>
				</div>
			</li>

			<li>
				<div class="card">
					<div class="front">
						<p class="title-p">DocBase</p>
						<i class='bx bxs-group'></i>
						<span class="text">
							<h3>Asignacion</h3>
						</span>
					</div>
					<div class="back">
						<p class="title-p">DocBase</p>
						<i class='bx bxs-group'></i>
						<span class="text">
							<a href="https://docbase.dieboldnixdorf.com/WADocBase3/WFLogin.aspx" target="_blank"><button
									class="btn-primary button-back">Ir a DocBase</button></a>
						</span>
					</div>
				</div>
			</li>
			<li>
				<div class="card">
					<div class="front">
						<p class="title-p">Informacion</p>
						<i class='bx bxs-dollar-circle'></i>
						<h3>Empresa</h3>
						</span>
					</div>
					<div class="back">
						<p class="title-p">Informacion</p>
						<i class='bx bxs-dollar-circle'></i>
						<a href="#"><button class="btn-primary button-back">Ir a la informacion</button></a>
						</span>
					</div>
				</div>
			</li>
		</ul>
	</main>
	<!-- MAIN -->
</section>
<!-- CONTENT -->

<!--JS-->
<script src="src/js/dashboard.js"></script>
</body>

</html>