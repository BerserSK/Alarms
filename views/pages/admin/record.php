<?php 
	if (!isset($_SESSION["validar"]) || $_SESSION["validar"] != "ok" ){
	    echo '<script> window.location = "index.php?pagina=login";</script>';
	    return;
	}

	if (!isset(	$_SESSION["id_rol_FK"]) || $_SESSION["id_rol_FK"] != 1 ){
	    echo '<script> 
		alert("No se puede ingresar a esta pagina!")
		window.location = "index.php?paginaGlobal=login";</script>';
	}

	$lectura = ControladorFormularios::ctrSeleccionarHistorial(null);
?>

<?php include('includes/header.php'); ?>
<?php require_once "models/conexion.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- My CSS -->
	<link rel="stylesheet" href="src/style/dashboard.css">
	<link rel="stylesheet" href="src/style/pdf.css" media="print">

	<title>AdminHub</title>

</head>

<body>


<!-- SIDEBAR -->
<section id="sidebar">
	<a href="#" class="brand">
		<img src="src/images/logo.svg" class="logo-sidebar" alt="Logo Diebold Nixdorf">
		<span class="text">Diebol Nixdorf</span>
	</a>
	<ul class="side-menu top">
		<li >
			<a href="index.php?paginaAdmin=mainAdmin">
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
		<li class="active">
			<a href="index.php?paginaAdmin=record">
				<i class='bx bxs-message-dots'></i>
				<span class="text">Historial / Reportes</span>
			</a>
		</li>
		<li>
			<a href="index.php?paginaAdmin=managementAlarmsAdmin">
				<i class='bx bxs-group'></i>
				<span class="text">Informacion ATM'S</span>
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
		<a href="index.php?paginaAdmin=usersAdmin">
			<i class='bx bxs-shopping-bag-alt'></i>
			<span class="text-tables">Panel Usuarios</span>
		</a><br>
		<a href="index.php?paginaAdmin=managementAlarmsAdmin">
			<i class='bx bxs-shopping-bag-alt'></i>
			<span class="text-tables">Panel Atm's</span>
		</a><br>
		<a href="index.php?paginaAdmin=record">
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
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="#">Panel Historial</a>
						</li>
					</ul>
				</div>
				<a href="#" id="abrirModal" class="btn-download">
					<i class='bx bxs-cloud-download'></i>
					<span class="text">Descargar Reporte</span>
				</a>
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check'></i>
					<span class="text">
						<h3>
							<?php
                                $con = Conect::conectar();
                                $count = current($con->query("select count(id_history) FROM history")->fetch());
                                echo $count;
                            ?>
						</h3>
						<p>Movimientos realizados</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Historial</h3>
						<a href="#" id="abrirModalGrafico" class="btn-download">
							<i class='bx bxs-cloud-download'></i>
							<span class="text">Descargar Grafico</span>
						</a>
					</div>
					<div class="container">
						<table class="container py-5 stripe hover row-border order-column" id="myTable">
							<thead class="">
								<tr>
									<th>Hora y fecha</th>
									<th>Persona Confirma Cierre</th>
									<th>Minutos</th>
									<th>Observaciones</th>
									<th>Accion realizada</th>
									<th>Atm</th>
									<th>Usuario</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($lectura as $key=>$value) :?>
								<tr>
									<td><?php echo $value["hora_fecha"]; ?></td>
									<td><?php echo $value["nombre_persona_cierre"]; ?></td>
									<td><?php echo $value["minutes_required"]; ?></td>
									<td><?php echo $value["observation"]; ?></td>
									<td><?php echo $value["estado_action"]; ?></td>
									<td><?php echo $value["atm"]; ?></td>
									<td><?php echo $value["id_user_FK"]; ?></td>
									<!--<td>
						<div class="btn-group">
							<div class="px-1">
									<a href="index.php?pagina=edit&id=<?php echo $value["id_user"]; ?>" class="btn btn-warning"><i class="fas fa-exclamation-triangle"></i></a>
							</div>

							<form method="POST">

								<input type="hidden" name="id_user" value= "<?php echo $value["id_user"];?>">
								
								<button class=""><a href="index.php?pagina=delete&id=<?php echo $value['id_user']?>" class="btn btn-danger">
					<i class="far fa-trash-alt"></i></a></button>
							</form>
						</div>
					</td>-->
								</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

	<div id="ventanaModal" class="modal">
		<div class="contenidoModal">
			<h2>Reporte Historial</h2>
			<div class="container">
				<table class="container py-5 table table-striped" id="myTable">
					<thead class="">
						<tr>
							<th>Hora y fecha</th>
							<th>Persona Confirma Cierre</th>
							<th>Minutos requeridos</th>
							<th>Accion realizada</th>
							<th>Atm</th>
							<th>Usuario</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($lectura as $key=>$value) :?>
						<tr>
							<td><?php echo $value["hora_fecha"]; ?></td>
							<td><?php echo $value["nombre_persona_cierre"]; ?></td>
							<td><?php echo $value["minutes_required"]; ?></td>
							<td><?php echo $value["estado_action"]; ?></td>
							<td><?php echo $value["atm"]; ?></td>
							<td><?php echo $value["id_user_FK"]; ?></td>
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
			<hr>
			<div class="container">
				<a href="#" class="btn btn-info boton cerrarModal">Cerrar</a>
				<a href="index.php?paginaGlobal=excel" class="btn btn-success boton">Generar Excel</a>
				<a href="" class="btn btn-danger boton" onclick="window.print()">Generar PDF</a>
			</div>
		</div>
	</div>
	<div id="ventanaModalGrafico" class="modalGrafico">
		<div class="contenidoModalGrafico">
			<h2>Reporte Graficos</h2>
			<div class="container graficas">
				<div class="col-lg-4">
					<canvas id="graficoBar" width="400" height="400"></canvas>
				</div>
				<div class="col-lg-4">
					<canvas id="graficoHorizontalBar" width="400" height="400"></canvas>
				</div>
				<div class="col-lg-4">
					<canvas id="graficoPie" width="400" height="400"></canvas>
				</div>
				<hr>
				<div class="container">
					<a href="#" class="btn btn-dark boton cerrarModalGrafico">Cerrar</a>
				</div>
			</div>
			<div class="container grafico-parametros">
				<div class="col-lg-5">
					<label for="">Fecha Inicio</label><br> 
					<input type="datetime" class="form-control" name="" id="select_finicio">
				</div>
				<div class="col-lg-5">
					<label for="">Fecha Fin</label><br> 
					<input type="datetime"  class="form-control" name="" id="select_ffin">
				</div>
				<div class="col-lg-2">
					<label for="">&nbsp;</label><br> 
					<button class="btn btn-danger" onclick="CargarDatosGraficoDoughnut()">Buscar</button>
				</div>
				<div class="col-lg-4">
					<canvas id="graficoDoughnut_parametros" width="400" height="400"></canvas>
				</div>
				<hr>
			</div>
		</div>





		<div id="ventanaModalGrafico" class="modalGrafico">
			<div class="contenidoModalGrafico">
			<h2>Reporte Historial - Parametros</h2>
			<div class="container">
				<div class="col-lg-5">
					<label for="">Fecha Inicio</label><br> 
					<input type="datetime-local" class="form-control" name="" id="select_finicio">
				</div>
				<div class="col-lg-5">
					<label for="">Fecha Fin</label><br> 
					<input type="datetime-local" class="form-control" name="" id="select_ffin">
				</div>
				<div class="col-lg-2">
					<label for="">&nbsp;</label><br> 
					<button class="btn btn-danger">Buscar</button>
				</div>
				<div class="col-lg-4">
					<canvas id="graficoBar_parametros" width="400" height="400"></canvas>
				</div>
				<div class="col-lg-4">
					<canvas id="graficoHorizontalBar_parametros" width="400" height="400"></canvas>
				</div>
				<div class="col-lg-4">
					<canvas id="graficoPie_parametros" width="400" height="400"></canvas>
				</div>
				<hr>
				<div class="container">
					<a href="#" class="btn btn-dark boton cerrarModalGrafico">Cerrar</a>
				</div>
			</div>
		</div>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.0/chart.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
		<script src="src/js/record.js"></script>

		<script src="src/js/dashboard.js"></script>
</body>

</html>