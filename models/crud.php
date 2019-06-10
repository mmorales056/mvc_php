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

    public function EditarUsuariosModel($datosModel,$tabla){
        $stmt = Conexion::conectar()->prepare("Select * FROM $tabla WHERE idUsuarios=:id");
        $stmt->bindParam(":id",$datosModel,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();

    }

    public function actualizarDatosModel($datosModel,$tabla){
        $stmt= Conexion::conectar()->prepare("UPDATE $tabla SET usuario=:usuario,password=:password, email=:email WHERE idUsuarios=:id");
        #ahora vamos a enlazar parametros
        $stmt->bindParam(":usuario",$datosModel["usuario"],PDO::PARAM_STR);
        $stmt->bindParam(":password", $datosModel["password"],PDO::PARAM_STR);
        $stmt->bindParam(":email",$datosModel["email"],PDO::PARAM_STR);
        #el where
        $stmt ->bindParam(":id",$datosModel["id"],PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "succes";
        } else {
            return "error";
        }
        $stmt->close();

    }

    public function borrarUsuariosModel($datosModel,$tabla){
        $stmt= Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idUsuarios=:id");
        $stmt->bindParam(":id",$datosModel,PDO::PARAM_INT);

        if($stmt->execute()){
            return "Success";
        }else{
            return "error";
        }
        $stmt->close();
    }
}

