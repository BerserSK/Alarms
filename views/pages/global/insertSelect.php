<?php
    include("models/db.php");
    include_once("models/conexion.php");

    if (!isset($_SESSION["validar"]) || $_SESSION["validar"] != "ok" ){
	    echo '<script> window.location = "index.php?paginaGlobal=login";</script>';
	}

    if (!isset($value["id_rol_FK"] ) || $value["id_rol_FK"] != 1 ){
	    echo '<script> window.location = "index.php?paginaUser=managementAlarmsUser";</script>';
	    return;
	}else{
        echo '<script> window.location = "index.php?paginaAdmin=managementAlarmsAdmin";</script>';
	    return; 
    }  

    $date = $_POST['date'];
    $person = $_POST['person'];
    $time = $_POST['time'];
    $idAction = $_POST['idAction'];
    $atm_FK = $_POST['atm_FK'];
    $user_fk = $_POST['user_fk'];
    $observation = $_POST['observation'];


    try{
        $ficha22 = "INSERT INTO history SET id_Action_fk = '$idAction', hora_fecha = '$date', nombre_persona_cierre = '$person', minutes_required = '$time', observation = '$observation', atm_FK = '$atm_FK', id_user_FK = '$user_fk' ";
        $ejecutar_insertar_ficha2k2 = mysqli_query($conn, $ficha22);

        //$ficha23 = "INSERT INTO history SET atm_FK = '$atm_FK'";
        //$ejecutar_insertar_ficha2k3 = mysqli_query($conn, $ficha23);
    }catch(mysqli_sql_exception $e){
        var_dump($e);
        exit;
    }

    

?>