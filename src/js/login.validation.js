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