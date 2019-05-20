<?php
class MvcController
{
    #LLamamada a la plantilla
    #---------------------------
    public function pagina()
    {
        include "views/template.php";
    }

    public function enlacesPaginasController()
    {
        if (isset($_GET['action'])) {
            $enlacesController = $_GET['action'];
        } else {
            $enlacesController = "index";
        }
        $respuesta = Paginas::enlacesPaginasModel($enlacesController);
        include $respuesta;
    }

    #RegistrarUsuarios
    #----------------------------------
    public function registroUsuarioController(){
        if (isset($_POST["usuarioRegistro"])) {
            $datosController = array(
                "usuario" => $_POST["usuarioRegistro"],
                "password" => $_POST["passwordRegistro"],
                "email" => $_POST["emailRegistro"]
            );


            # con los :: accedemos a la herencia solo para acceder a los datos en este caso en la clase 
            #Datos y al metodo registroUsuarioModel()
            $respuesta = Datos::registroUsuarioModel($datosController, "usuarios");
            echo $respuesta;
            #con esta sentencia Forzamos a que solo se guarde una vez el mismo registro 
            if ($respuesta=="succes") {
                #si es suuces se queda en la paginma del formulario
                header("location:index.php?action=ok");
            } else {
                header("location:index.php");
            }
        }
    }

    public function ingresarUsuarioController(){
        if(isset($_POST["usuarioIngreso"])){
            $datosController = array("usuario"=>$_POST["usuarioIngreso"],
                            "password"=>$_POST["passwordIngreso"]);
            
            $respuesta = Datos::ingresarUsuarioModel($datosController,"usuarios");
            
            if ($respuesta["usuario"]==$_POST["usuarioIngreso"] &&
                $respuesta["password"]==$_POST["passwordIngreso"]){

                    header("location:index.php?action=usuarios");
            } else {
                header("location:index.php?action=fallo");
            }
            
        }
    }

    public function vistaUsuariosController(){
        $respuesta=Datos::vistaUsuarioModel("usuarios");
        foreach($respuesta as $fila =>$item){
        echo '<tr>
                    <td>'.$item["usuario"].'</dt>
                    <td>' .$item["password"].'</td>
                    <td>'.$item["email"].' </td>
                    <td><button>Editar</button></td>
                    <td> <button>Borrar</button></td>
                    
                    
                    </tr>';
        }
    }
}
