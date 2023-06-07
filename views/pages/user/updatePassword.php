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
		<li class="">
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
	<ul class="side-menu bottom">
		<li class="active">
			<a href="index.php?paginaUser=updatePassword">
				<i class='bx bxs-cog' ></i>
				<span class="text">Cambiar Contraseña</span>
			</a>
		</li>
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
    
    <form action="" method="post">
        <?php
            if(isset($_POST['editar'])){
                require "db.php";

                $passActual = $mysqli->real_escape_string($_POST['passActual']);
                $pass1 = $mysqli->real_escape_string($_POST['pass1']);
                $pass2 = $mysqli->real_escape_string($_POST['pass2']);

                $passActual = md5($passActual);
                $pass1 = md5($pass1);
                $pass2 = md5($pass2);

                $sqlA = $mysqli->query("SELECT user_password FROM users WHERE id = '".$_SESSION['id_user']."'");
                $rowA = $sqlA -> fetch_array();

                if($rowA['user_password'] == $passActual){

                    if($pass1 == $pass2){
                        $update = $mysqli->query("UPDATE users SET user_password WHERE id = '".$_SESSION['id_user']."'");
                        if($update){echo "Se ha actualizado su contraseña";}
                    }else{ 
                        echo "Las dos contrasñeas con coinciden";
                    }

                }else{
                    echo "Tu contraseña actual no coincide";
                }
            }

        ?>
        <span>Contraseña Actual</span>
        <input type="text" placeholder="Ingrese la contraseña" name="passActual" autocomplete="off">
        <span>Contraseña Nueva</span>
        <input type="text" placeholder="Ingrese la contraseña" name="pass1">
        <span>Contraseña Verificacion</span>
        <input type="text" placeholder="Ingrese la contraseña" name="pass2">
        <button type="submit" value="ok" name="btnmodificar">Cambiar Contraseña</button>
    </form>

   

    <script src="src/js/dashboard.js"></script>