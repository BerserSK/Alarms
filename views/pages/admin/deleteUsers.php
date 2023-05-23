
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php include('models/delete.php'); 

if (!isset(	$_SESSION["id_rol_FK"]) || $_SESSION["id_rol_FK"] != 1 ){
    alert("No se puede ingresar a esta pagina!")
    echo '<script> window.location = "index.php?paginaGlobal=login";</script>';
}
?>
