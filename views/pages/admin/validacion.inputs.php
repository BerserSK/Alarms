<?php 
    include('db.php')

    $user = $_REQUEST['user_name'];

    //Verificando si existe algun cliente en bd ya con dicha cedula asignada
    //Preparamos un arreglo que es el que contendrá toda la información
    $jsonData = array();
    $selectQuery = ("SELECT user_name FROM users WHERE user_name='".$user."'");
    $query = mysqli_query($conn, $selectQuery);
    $totalUser = mysqli_num_rows($query);
    
    //Validamos que la consulta haya retornado información
    if($totalUser <= 0){
        $jsonData['success'] = 0;
        // $jsonData['message'] = 'No existe Cédula ' .$cedula;
        $jsonData['message'] = '';
    }else{
        //Si hay datos entonces retornas algo
        $jsonData['success'] = 1;
        $jsonData['message'] = '<p style="color:red;">Ya existe la Cédula <strong>(' .$cedula.')<strong></p>';
    }

    //Mostrando mi respuesta en formato Json
    header('Content-type: application/json; charset=utf-8');
    echo json_encode( $jsonData )
?>