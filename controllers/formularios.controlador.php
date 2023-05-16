<?php

    class ControladorFormularios{

        /*=============================================
        Seleccionar registro
        =============================================*/
        static public function ctrSeleccionar($valor){
            $respuesta = ModeloFormularios::mdlSeleccionar($valor);
            return $respuesta;
        }

        /*=============================================
        Seleccionar registro Lunos
        =============================================*/
        static public function ctrSeleccionarLunos($valor){
            $respuesta = ModeloFormularios::mdlSeleccionarLunos($valor);
            return $respuesta;
        }

        /*=============================================
        Seleccionar registro Historial
        =============================================*/
        static public function ctrSeleccionarHistorial($valor){
            $respuesta = ModeloFormularios::mdlSeleccionarHistorial($valor);
            return $respuesta;
        }


        /*=============================================
        Login
        =============================================*/
        static public function ctrIngreso(){
            if(isset($_POST["user_name"])){
                $usuario = $_POST["user_name"];
                $pass = $_POST["user_password"];

                $respuesta = ModeloFormularios::mdlIngreso($usuario);
                if(is_array($respuesta) && $usuario == $respuesta["user_name"] && $pass == $respuesta["user_password"] && $respuesta["id_rol_FK"] == 1){
                    $_SESSION["validar"] = "ok";
                    $_SESSION["user_name"] = $usuario;

                    $row = $query -> fetch(PDO::FETCH_NUM);
                        if($row == true){
                            // Validar Rol
                            $rol = $row[5];
                            $_SESSION['id_rol_FK'] = $rol;
                        }
                    

                    echo '<script>
                        
                        if(window.history.replaceState){
                            window.history.replaceState(null, null, window.location.href);
                        }
                        window.location = "index.php?paginaAdmin=mainAdmin";

                    </script>';
                    
                }else if(is_array($respuesta) && $usuario == $respuesta["user_name"] && $pass == $respuesta["user_password"] && $respuesta["id_rol_FK"] == 2){
                    $_SESSION["validar"] = "ok";
                    $_SESSION["user_name"] = $usuario;

                    $row = $query -> fetch(PDO::FETCH_NUM);
                        if($row == true){
                            // Validar Rol
                            $rol = $row[5];
                            $_SESSION['id_rol_FK'] = $rol;
                        }
                    

                    echo '<script>

                        if(window.history.replaceState){
                            window.history.replaceState(null, null, window.location.href);
                        }
                        window.location = "index.php?paginaUser=mainUser";

                    </script>';
                }else{
                    session_destroy();
                    echo '<script>
    
                    if ( window.history.replaceState ) {
    
                        window.history.replaceState( null, null, window.location.href );
    
                    }
                    
                </script>';

                    echo '<div class="alert alert-danger">usuario o Contraseña incorrectas</div>';
                }
                
            }
        }
    }
?>