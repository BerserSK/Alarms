<?php 
    require 'formularios.modelos.php';
    require '../controllers/formularios.controlador.php';
    require_once 'conexion.php';

    $valor = "";
    $MG = new ModeloFormularios();
    $consulta = $MG -> mdlSeleccionarHistorialTest($valor);
    echo json_encode($consulta)
?>