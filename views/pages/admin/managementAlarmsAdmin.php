<?php 
	if (!isset($_SESSION["validar"]) || $_SESSION["validar"] != "ok" ){
	    echo '<script> window.location = "index.php?pagina=login";</script>';
	    return;
	}

	$lectura = ControladorFormularios::ctrSeleccionarLunos(null);


	
?>

<?php include('includes/header.php'); ?>
<?php require_once "models/conexion.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="src/style/dashboard.css">

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
		<li>
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
		<li>
			<a href="index.php?paginaAdmin=record">
				<i class='bx bxs-message-dots'></i>
				<span class="text">Historial / Reportes</span>
			</a>
		</li>
		<li class="active">
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
							<a class="active" href="#">Panel ATM'S</a>
						</li>
					</ul>
				</div>
				<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download'></i>
					<span class="text">Download PDF</span>
				</a>
			</div>

			<ul class="box-info">
				<li>
					<form action="index.php?paginaAdmin=lunoId" method="POST" class="d-flex mt-3" role="search">
						<label for="palabra">Gestionar alarma:</label>
						<br>
						<input type="text" id="palabra" name="palabra" class="form-control me-2" type="search"
							placeholder="Buscar Alarma" aria-label="Search">
						<br>
						<button class="btn btn-outline-success" type="submit">Buscar</button>
					</form>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Lunos</h3>
						<i class='bx bx-search'></i>
						<i class='bx bx-filter'></i>
					</div>
					<div class="container">
						<table class=" container py-5 	" id="myTable">
							<thead class="">
								<tr>
									<th>Luno</th><br>
									<th>Cliente </th>
									<th>Site</th>
									<th>Ciudad</th>
									<th>Marca</th>
									<th>Centro Alarmas</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($lectura as $key=>$value) :?>
								<tr>
									<td><?php echo $value["atm"]; ?></td>
									<td><?php echo $value["name_client"]; ?></td>
									<td><?php echo $value["site_atm"]; ?></td>
									<td><?php echo $value["city_atm"]; ?></td>
									<td><?php echo $value["brand_atm"]; ?></td>
									<td><?php echo $value["name_alarm"]; ?></td>

									<!--<td>
					<div class="btn-group">
						<div class="px-1">
								<a href="index.php?pagina=edit&id=<?php echo $value["id_usuario"]; ?>" class="btn btn-warning"><i class="fas fa-exclamation-triangle"></i></a>
						</div>

						<form method="POST">

							<input type="hidden" name="id_usuario" value= "<?php echo $value["id_usuario"];?>">
							
							<button class=""><a href="index.php?pagina=delete&id=<?php echo $value['id_usuario']?>" class="btn btn-danger">
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

	<script>
		$(document).ready(function () {
			$('#myTable').DataTable({
				language: {
					search: "Buscar:",
					processing: "Traitement en cours...",
					lengthMenu: "Mostrar _MENU_ Elementos",
					info: "Mostrando _START_ a _END_ de _TOTAL_ Elementos",
					infoEmpty: "Mostrando 0 a 0 de 0 Elementos",
					infoFiltered: "(Filtrando de _MAX_ Elementos en Total)",
					infoPostFix: "",
					loadingRecords: "Carga en curso...",
					zeroRecords: "Ningun Elemento Encontrado",
					emptyTable: "Ningun Dato en la Tabla",
					paginate: {
						first: "Primero",
						previous: "Anterior",
						next: "Siguiente",
						last: "Anterior"
					},
					aria: {
						sortAscending: ": Activar para Ordenar la Columna en Orden Ascendente",
						sortDescending: ": Habilitar para Ordenar la Columna en Orden Descendente"
					}
				}
			});
		});
	</script>
	<script src="src/js/dashboard.js"></script>
</body>

</html>