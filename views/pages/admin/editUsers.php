<?php include('models/edit.php'); 

if (!isset(	$_SESSION["id_rol_FK"]) || $_SESSION["id_rol_FK"] != 1 ){
    echo '<script> window.location = "index.php?paginaGlobal=login";</script>';
}
?>
<link rel="stylesheet" href="src/style/dashboard.css">

<form class="form-ejercicios" method="POST">
            <div class="form">
                <h1 class="edit-tilte">Editar Usuario</h1>
                <div class="grupo">
                    <input name="user_name" type="text" class="" id="num1" value="<?php echo $user_name; ?>" required><span class="barra"></span>
                    <label for="num1" class="">Ingrese un numero</label>
                </div>
                <div class="grupo">
                    <input name="user_password" class="" value="<?php echo $user_password;?>" class="" id="num2" required><span class="barra"></span>
                    <label for="num2" class="">Ingrese otro numero</label>
                </div>
                <!--<div class="grupo">
									<select name="selec_rol" class="action " id="action" ><span class="barra"></span>
                      <option value="<?php echo $id_rol_FK;?>" selected disabled>-- Seleccionar --</option>
                      <?php 
                              $v = mysqli_query($conn, "SELECT * FROM rol");
                              while($actions = mysqli_fetch_row($v)){
                          ?>
                        <option value="<?php echo $actions[0] ?>"><?php echo $actions[1] ?></option>
                      <?php }?>
                  </select>
								</div>-->
                <button type="submit" class="submit" id="submit" style="margin-left: 39px" name="update">Calcular</button><!-- onclick="calcular()"-->
            </div>
        </form>