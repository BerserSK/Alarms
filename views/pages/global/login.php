<link rel="stylesheet" href="src/style/login.css">

<!-- partial:index.partial.html -->
<div class="container">
	<div class="logo_text">
		<h4 class="text-light"><img src="src/images/logo.svg" width="120px"></h4>
		<h2 class="welcome">Sistema de control de alarmas</h2>
		<button class="welcome_btn" id="abrirModal">Iniciar Sesion</button>
		<hr>
		<?php
        /*=============================================
        =            Llamado al controlador      	 =
        ==============================================*/                  
        $registro = new ControladorFormularios();
        $registro -> ctrIngreso();
    ?>
	</div>
	<div class="screen" id="ventanaModal">
		<div class="screen__content" id="contenidoModal">
			<form class="login" method="POST" id="frm-login">
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text" class="login__input" id="g-user" name="user_name" placeholder="Usuario" autocomplete="off">
					<span class="msn-errorS"></span>
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" class="login__input"  id="g-pass" name="user_password" placeholder="Contraseña" autocomplete="off">
					<span class="msn-errorI"></span>
				</div>

				<button class="button login__submit">
					<span class="button__text">Ingresar</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>
				<!--<p id="mensaje1" class="d-none">Por favor suministre bien los campos para hacer el registro correctamente.<i class="fa-solid fa-circle-exclamation"></i></p>-->	
			</form>
			<div class="social-login">
				<h3>Diebold Nixdorf</h3>
				<div class="social-icons">
					<a href="#" class="social-login__icon fab fa-instagram"></a>
					<a href="#" class="social-login__icon fab fa-facebook"></a>
					<a href="#" class="social-login__icon fab fa-twitter"></a>
				</div>
			</div>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>
	</div>

</div>
<!-- partial -->
<script src="src/js/modal.js"></script>
<script src="src/js/login.validation.js"></script>
