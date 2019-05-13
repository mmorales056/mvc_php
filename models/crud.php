<?php
require_once "conexion.php";

class Datos extends Conexion {
    #Metodo para registrar usuarios este metodo recibe 2 parametros lo que ingresan y  la tabla de  la db
    public function registroUsuarioModel($datosModel, $tabla){ 
        $stm=Conexion::conectar()->prepare
            ("INSERT INTO $tabla(usuario,password,email) VALUES (:usuario,:password,:email)");
        
        $stm -> bindParam(":usuario", $datosModel["usuario"],PDO::PARAM_STR);
        $stm -> bindParam(":password", $datosModel["password"],PDO::PARAM_STR);
        $stm -> bindParam(":email", $datosModel["email"],PDO::PARAM_STR);

        if($stm -> execute()){
            return "succes";

        }else{
            return "error";
        }


    }
}

