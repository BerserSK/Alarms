<?php 
	if (!isset($_SESSION["validar"]) || $_SESSION["validar"] != "ok" ){
	    echo '<script> window.location = "index.php?pagina=login";</script>';
		
	    return;
	}

	if (!isset(	$_SESSION["id_rol_FK"]) || $_SESSION["id_rol_FK"] != 1 ){
	    echo '<script> window.location = "index.php?paginaGlobal=login";</script>';
	}

	$lectura = ControladorFormularios::ctrSeleccionar(null);
?>

<?php include('includes/header.php'); ?>
<?php require_once "models/conexion.php"; ?>
<?php include("models/db.php"); ?>
<?php include('models/edit.php'); ?>

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
		<li class="">
			<a href="index.php?paginaAdmin=mainAdmin">
				<i class='bx bxs-dashboard'></i>
				<span class="text">Inicio</span>
			</a>
		</li>
		<li class="screen_admin active">
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
		<a href="index.php?paginaAdmin=usersAdmin" class="active">
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
							<a class="active" href="#">Panel Usuario</a>
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
					<i class='bx bxs-calendar-check'></i>
					<span class="text">
						<h3>
							<?php
                                $con = Conect::conectar();
                                $count = current($con->query("select count(id_user) FROM users")->fetch());
                                echo $count;
                            ?>
						</h3>
						<p>Usuarios Registrados</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Usuarios Registrados</h3>
						<a href="#" id="abrirModal" class="btn-user">
							<i class='bx bxs-user'></i>
							<span class="text">Registrar Usuario</span>
						</a>
					</div>
					<div class="container">
						<table class="container py-5 " id="myTable">
							<thead class="">
								<tr>
									<th>ID</th>
									<th>Nombre</th>
									<th>Contraseña</th>
									<th>Created at</th>
									<th>Rol</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($lectura as $key=>$value) :?>
								<tr>
									<td><?php echo $value["id_user"]; ?></td>
									<td><?php echo $value["user_name"]; ?></td>
									<td><?php echo $value["user_password"]; ?></td>
									<td><?php echo $value["created_at"]; ?></td>
									<td><?php echo $value["rol_name"]; ?></td>
									<td>
										<div class="btn-group">
											<div class="px-1">
												<a href="index.php?paginaAdmin=editUsers&id=<?php echo $value["id_user"]; ?>"
													class="btn btn-warning"><i class="fas fa-edit"></i></a>
											</div>

											<form method="POST">

												<input type="hidden" name="id_user" value="<?php echo $value["id_user"];?>">

												<button class=""><a href="index.php?paginaAdmin=deleteUsers&id=<?php echo $value['id_user']?>"
													class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></button>
											</form>
										</div>
									</td>
								</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>

					<div id="ventanaModal" class="modal">
						<div class="contenidoModalUser form">
							<h2>Insertar Usuario</h2>
							<div class="container">
							<form method="POST" action="index.php?paginaAdmin=saveUser">
							<div class="grupo">
								<input type="text" class="" id="num2"  name="user_name" required><span class="barra"></span>
								<label for="num2" class="label">Insertar Nombre</label>
							</div>
								<div class="grupo">
									<input type="text" class="" id="num2"  name="user_pass" required><span class="barra"></span>
									<label for="num2" class="label_pass">Insertar Contraseña</label>
								</div>
								<div class="grupo">
									<select name="selec_rol" class="action " id="action" ><span class="barra"></span>
                                        <option value="" selected disabled>-- Seleccionar --</option>
                                        <?php 
                                                $v = mysqli_query($conn, "SELECT * FROM rol");
                                                while($actions = mysqli_fetch_row($v)){
                                            ?>
                                        	<option value="<?php echo $actions[0] ?>"><?php echo $actions[1] ?></option>
                                        <?php }?>
                                    </select>
								</div>
								<button class="submit" name="save_user">Guardar </button>
							</form>
							<div class="container">
								<a href="index.php?paginaAdmin=usersAdmin" class="btn btn-dark boton cerrarModalUser">Cerrar</a>
							</div>
							</div>
							<hr>
						</div>
				</div>
				<!--<button id="abrirModalUpdate">sflallapdla</button>-->
				<div id="ventanaModalUpdate" class="modal">
						<div class="contenidoModalUpdate form">
							<h2>Insertar Usuario</h2>
									<form method="POST" action="index.php?pagina=save_user">
										<div class="form-group">
										<input name="user_name" type="text" class="form-control" value="<?php echo $user_name; ?>" placeholder="Update Title">
										</div>
										<div class="form-group">
										<textarea name="user_password" class="form-control" cols="30" rows="10"><?php echo $user_password;?></textarea>
										</div>
										<button class="btn-success" name="update">
										Update </button>
									</form>
								</div>
							<div class="container">
								<a href="index.php?pagina=datos" class="btn btn-dark boton cerrarModalUser">Cerrar</a>
							</div>
							</div>
							<hr>
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

		/////////////////////////////////
/**Acceder al boton para abrir el modal */
let btnmodalUpdate=document.getElementById("abrirModalUpdate");


/** Acceder a la ventana modal */
let venmodalUpdate=document.getElementById("ventanaModalUpdate");

/**Acceder al boton cerrar de la ventana modal */
let cermodalUpdate=document.querySelector(".cerrarModalUser");
btnmodalUpdate.addEventListener('click',()=>{
    venmodalUpdate.style.display="block";
})

cermodalUpdate.addEventListener('click',()=>{
    venmodalUpdate.style.display="none"
})

window.addEventListener('click',(e)=>{
    if(e.target==venmodalUpdate){
        venmodalUpdate.style.display="none"
    }
})
	</script>
	<script src="src/js/dashboard.js"></script>
	<script src="src/js/modal.js"></script>

</body>

</html>