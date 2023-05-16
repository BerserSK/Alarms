<?php 
    require_once "conexion.php";

    class ModeloFormularios{
 
        /*=============================================
		Seleccionar registro
		=============================================*/
        static public function mdlSeleccionar($valor){
            if($valor == null){
                $stmt = Conect::conectar()->prepare("CALL sp_usuarios_select_rol()");
                $stmt -> execute();
                return $stmt -> fetchAll();
            }else{
                $stmt = Conect::conectar()->prepare("CALL sp_usuarios_select_rol(:id_user)");
                $stmt -> bindParam(":id_user",$valor,PDO::PARAM_STR);
                return $stmt -> fetch();
            }
            $stmt -> close();
            $stmt = null;
        }

        /*=============================================
		                 LOGIN
		=============================================*/
        static public function mdlIngreso($usuario){
            $stmt = Conect::conectar()->prepare("CALL sp_usuarios_login(:user_name)");
            $stmt -> bindParam(":user_name",$usuario,PDO::PARAM_STR);

            if($stmt -> execute()){
                return $stmt -> fetch();
            }else{
                print_r(Conect::conectar()->errorInfo());
            }
            $stmt -> close();
            $stmt = null;
        }

        /*=============================================
		Seleccionar registro Lunos
		=============================================*/
        static public function mdlSeleccionarLunos($valor){
            if($valor == null){
                $stmt = Conect::conectar()->prepare("CALL sp_alarms_select_atm()");
                $stmt -> execute();
                return $stmt -> fetchAll();
            }else{
                $stmt = Conect::conectar()->prepare("CALL sp_alarms_select_atm(:atm)");
                $stmt -> bindParam(":atm",$valor,PDO::PARAM_STR);
                return $stmt -> fetch();
            }
            $stmt -> close();
            $stmt = null;
        }

        /*=============================================
		Seleccionar registro historial
		=============================================*/
        static public function mdlSeleccionarHistorial($valor){
            if($valor == null){
                $stmt = Conect::conectar()->prepare("CALL sp_usuarios_select_history()");
                $stmt -> execute();
                return $stmt -> fetchAll();
            }else{
                $stmt = Conect::conectar()->prepare("CALL sp_atm_select(:id_history)");
                $stmt -> bindParam(":id_history",$valor,PDO::PARAM_STR);
                return $stmt -> fetch();
            }
            $stmt -> close();
            $stmt = null;
        }

        /*=============================================
		Seleccionar registro Graficas
		=============================================*/
        static public function mdlSeleccionarHistorialParametros($valor, $fechainicio, $fechafin){
            if($valor == null){
                $stmt = Conect::conectar()->prepare("CALL sp_usuarios_select_history_parametros('$fechainicio', '$fechafin')");
                $stmt -> execute();
                return $stmt -> fetchAll();
            }else{
                $stmt = Conect::conectar()->prepare("CALL sp_atm_select(:id_history)");
                $stmt -> bindParam(":id_history",$valor,PDO::PARAM_STR);
                return $stmt -> fetch();
            }
            $stmt -> close();
            $stmt = null;
        }
    }
?>