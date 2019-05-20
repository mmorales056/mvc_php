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

    public function ingresarUsuarioModel($datosModel, $tabla){
        $stm=Conexion::conectar()->prepare("SELECT usuario,password From $tabla WHERE usuario = :usuario");
        $stm->bindParam(":usuario",$datosModel["usuario"],PDO::PARAM_STR);
        $stm->execute();

        return  $stm->fetch();
        
    }

    public function vistaUsuarioModel($tabla){
        $stm = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stm -> execute();
        return $stm->fetchAll();

    }
}

