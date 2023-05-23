<?php include('models/save_user.php'); 

if (!isset(	$_SESSION["id_rol_FK"]) || $_SESSION["id_rol_FK"] != 1 ){
    echo '<script> 
    alert("No se puede ingresar a esta pagina!")
    window.location = "index.php?paginaGlobal=login";</script>';
}
?>
