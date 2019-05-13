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
    public function registroUsuarioController()
    {
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
        }else {
            
        }
    }
}
