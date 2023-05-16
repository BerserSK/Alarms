<?php 
    require 'formularios.modelos.php';
    require '../controllers/formularios.controlador.php';
    require_once 'conexion.php';

    $valor = "";
    $fechainicio = $_POST['inicio'];
    $fechafin = $_POST['fin'];
    $MG = new ModeloFormularios();
    $consulta = $MG -> mdlSeleccionarHistorialParametros($valor, $fechainicio, $fechafin);
    echo json_encode($consulta)
?>