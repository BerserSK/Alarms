<?php  
	if(!isset($_SESSION)) 
	{ 
			session_start(); 
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">

	<link rel="icon" href="src/images/logo.svg">

	<title>Diebold Nixdorf - Alarmas</title>
	<!--=====================================
	PLUGINS DE CSS
	======================================-->	

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
	<script src="sweetalert2.all.min.js"></script>

	<!--Css-->

	<!--Boxicons-->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

	<!--Fonts-->
	<link href="https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap" rel="stylesheet">

	<!-- DataTables -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />


	<!--=====================================
	PLUGINS DE JS
	======================================-->	

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<!-- DataTables  -->
	<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<!-- Latest compiled Fontawesome-->
	<script src="https://kit.fontawesome.com/00d346f3ba.js" crossorigin="anonymous"></script>
</head>
<body>


	<!--=====================================
	LOGOTIPO
	======================================

	<div class="container-fluid">
		
		<h3 class="text-center py-3"></h3>

	</div>-->

	<!--=====================================
	BOTONERA
	======================================-->


	<!--=====================================
	CONTENIDO
	======================================-->

	<div class="container-fluid" style="padding: 0;">
		
		<div class="">

			<?php 

				#ISSET: isset() Determina si una variable está definida y no es NULL

				if(isset($_GET["paginaAdmin"]) || isset($_GET["paginaUser"]) || isset($_GET["paginaGlobal"])) {
					error_reporting(0); 
					//Vistas de paginas globales 
					if($_GET["paginaGlobal"] == "logout" ||
						$_GET["paginaGlobal"] == "login" ||		
						$_GET["paginaGlobal"] == "excel" ||
						$_GET["paginaGlobal"] == "insertSelect" ||				
						//Vistas de Administrador
						$_GET["paginaAdmin"] == "mainAdmin" ||
						$_GET["paginaAdmin"] == "usersAdmin" ||
					   	$_GET["paginaAdmin"] == "editUsers" ||
						$_GET["paginaAdmin"] == "lunoId" ||
					   	$_GET["paginaAdmin"] == "deleteUsers" ||
					   	$_GET["paginaAdmin"] == "managementAlarmsAdmin" ||
					   	$_GET["paginaAdmin"] == "record" ||
						$_GET["paginaAdmin"] == "saveUser" ||
						$_GET["paginaAdmin"] == "updateUser"||	
					   //Vistas de Usuario
					   $_GET["paginaUser"] == "mainUser" ||
					   $_GET["paginaUser"] == "record" ||
					   $_GET["paginaUser"] == "updatePassword" ||
					   $_GET["paginaUser"] == "lunoId" ||
					   $_GET["paginaUser"] == "managementAlarmsUser" 
					){
						   
						include "pages/admin/".$_GET["paginaAdmin"].".php";
						include "pages/user/".$_GET["paginaUser"].".php";
						include "pages/global/".$_GET["paginaGlobal"].".php";
					}else{

						include "pages/global/error404.php";
			
					}


				}else{

					include "pages/global/login.php";

				}


			 ?>


		</div>

	</div>

  
	<!--JS-->
	<!--Jquery-->
	 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<!--dataTables-->
	 <script src="vistas/JS/jquery.dataTables.min.js"></script>
	<!-- JavaScript -->
	<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
	<!-- Boostrap-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.0/chart.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>