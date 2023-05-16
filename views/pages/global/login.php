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
					<input type="text" class="login__input" id="g-user" name="user_name" placeholder="Usuario">
					<span class="msn-errorS"></span>
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" class="login__input"  id="g-pass" name="user_password" placeholder="Contraseña">
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

<script>

const formulario = document.getElementById("frm-login");
        const nombre = document.getElementById("g-user");
		const passw = document.getElementById("g-pass"); 
        const NombrePattern = /^[a-zA-Z]{2,20}[.][a-zA-Z]{2,20}$/;
		const passwordPattern = /^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$/;
        let mensaje = document.getElementById("mensaje1");
        formulario.addEventListener('submit', (e) => {
            if (!nombre.value.match(NombrePattern) || !passw.value.match(passwordPattern)) {
                mensaje.classList.remove("d-none");
                mensaje.style.color = "#ff0000";
                mensaje.style.background = "#F5C2C2";
                mensaje.style.padding = "20px";
                mensaje.style.width = "100%";
                e.preventDefault();
            }
        });




		passw.addEventListener('input', () => {
            const gruponombree = document.querySelector(".login__field");
            const passText = document.querySelector(".msn-errorI");
            // Letras y espacios, pueden llevar acentos.
            if (passw.value.match(passwordPattern)) {
                gruponombree.classList.add('valid');
                gruponombree.classList.remove('invalid');
                passText.innerHTML = `<i class="fas fa-check icon-valid"></i>`;
                passText.style.color = "#01fa16";
                passText.style.marginLeft = "18px";
                passText.style.display = "block";
            } else {
                gruponombree.classList.add('invalid');
                gruponombree.classList.remove('valid');
                passText.innerHTML = `<i class="fas fa-times icon-valid"></i>`;
                passText.style.color = "#ff0000";
                passText.style.marginLeft = "18px";
                passText.style.display = "block";
            }
        });

        
		nombre.addEventListener('input', () => {
            const gruponombre = document.querySelector(".login__field");
            const nombreText = document.querySelector(".msn-errorS");
            // Letras y espacios, pueden llevar acentos.
            if (nombre.value.match(NombrePattern)) {
                gruponombre.classList.add('valid');
                gruponombre.classList.remove('invalid');
                nombreText.innerHTML = `<i class="fas fa-check icon-valid"></i>`;
                nombreText.style.color = "#01fa16";
                nombreText.style.position = "relative";

            } else {
                gruponombre.classList.add('invalid');
                gruponombre.classList.remove('valid');
                nombreText.innerHTML = `<i class="fas fa-times icon-valid"></i>`;
                nombreText.style.color = "#ff0000";
                nombreText.style.marginLeft = "18px";
                nombreText.style.display = "block";
            }
        });

</script>