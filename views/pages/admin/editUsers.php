<?php include('models/edit.php'); 

if (!isset(	$_SESSION["id_rol_FK"]) || $_SESSION["id_rol_FK"] != 1 ){
    echo '<script> 
    alert("No se puede ingresar a esta pagina!")
    window.location = "index.php?paginaGlobal=login";</script>';
}
?>
<link rel="stylesheet" href="src/style/dashboard.css">

<form class="form-ejercicios" method="POST" >
            <div class="form">
                <h1 class="edit-tilte">Editar Usuario</h1>
                <div class="grupo">
                    <input name="user_name" type="text" class="" id="num1" value="<?php echo $user_name; ?>" required><span class="barra"></span>
                    <label for="num1" class="">Nombre Usuario</label>
                </div>
                <div class="grupo">
                    <input name="user_password" class="" value="<?php echo $user_password;?>" class="" id="num2" required><span class="barra"></span>
                    <label for="num2" class="">Contraseña Usuario</label>
                </div>
                <div class="grupo" >
					<select name="rol_name" class="action " id="action" ><span class="barra"></span>
                        <option value="" selected disabled><?php echo $user_rol;?> </option>
                    </select>
				</div>
                <button type="submit" class="submit" id="submit" style="margin-left: 39px" name="update" onclick="return edit_alert()" <?php sleep(1) ?>>Guardar!</button><!-- onclick="calcular()"-->
            </div>
        </form>

<script>
    function edit_alert(){
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Datos guardados correctamente!',
            showConfirmButton: false,
            timer: 1500
        })
    }
</script>