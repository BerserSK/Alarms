
<?php include('models/delete.php'); 

if (!isset(	$_SESSION["id_rol_FK"]) || $_SESSION["id_rol_FK"] != 1 ){
    echo '<script> 
    alert("No se puede ingresar a esta pagina!")
    window.location = "index.php?paginaGlobal=login";</script>';
}
?>
