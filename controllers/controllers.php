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
            #con esta sentencia Forzamos a que solo se guarde una vez el mismo registro 
            if ($respuesta == "succes") {
                #si es suuces se queda en la paginma del formulario
                header("location:index.php?action=ok");
            } else {
                header("location:index.php");
            }
        }
    }

    public function ingresarUsuarioController()
    {
        if (isset($_POST["usuarioIngreso"])) {
            $datosController = array(
                "usuario" => $_POST["usuarioIngreso"],
                "password" => $_POST["passwordIngreso"]
            );

            $respuesta = Datos::ingresarUsuarioModel($datosController, "usuarios");

            if (
                $respuesta["usuario"] == $_POST["usuarioIngreso"] &&
                $respuesta["password"] == $_POST["passwordIngreso"]
            ) {

                #validando variables de session
                #===================================
                session_start();
                $_SESSION["validar"] = true;

                header("location:index.php?action=usuarios");
            } else {
                header("location:index.php?action=fallo");
            }
        }
    }

    public function vistaUsuariosController()
    {
        $respuesta = Datos::vistaUsuarioModel("usuarios");
        foreach ($respuesta as $fila => $item) {
            echo '<tr>
                    <td>' . $item["usuario"] . '</dt>
                    <td>' . $item["password"] . '</td>
                    <td>' . $item["email"] . ' </td>
                    <td><a href="http:index.php?action=editar&id=' . $item["idUsuarios"] . '">
                    <button>Editar</button></a> </td>
                    <td><a href="index.php?action=usuarios&idBorrar='.$item["idUsuarios"].'"><button>Borrar</button> </a></td>                
                    </tr>';
        }
    }

    public function editarUsuarioController()
    {
        $datosController = $_GET["id"];
        #para comprobar que nos trae la variable get la imprimimos
        $respuesta = Datos::editarUsuariosModel($datosController, "usuarios");
        echo '
        <input type="hidden"   value="'.$respuesta["idUsuarios"].'" name="idEditar">
        <input type="text"   value="'.$respuesta["usuario"].'" name="usuarioEditar" require>
        <input type="password"  value="'.$respuesta["password"].'" name="passwordEditar" require>
        <input type="email" require value="'.$respuesta["email"].'" name="emailEditar" require>
        <input type="submit" value="Actualizar">';
    }

    public function actualizarDatosController(){
        if (isset($_POST["usuarioEditar"])) {
            $datosController=array(
                    "id"=>$_POST["idEditar"],
                    "usuario"=>$_POST["usuarioEditar"],
                    "password"=>$_POST["passwordEditar"],
                    "email"=>$_POST["emailEditar"]);
            $respuesta=Datos::actualizarDatosModel($datosController, "usuarios");        
            if($respuesta =="succes"){
                header("location:index.php?action=cambio");
            }else{
                echo "error";
            }

        }
    }

    public function borrarUsuariosController(){
        if(isset($_GET["idBorrar"])){
            $datosController= $_GET["idBorrar"];
            $respuesta=Datos::borrarUsuariosModel($datosController,"usuarios");
            if($respuesta=="Success"){
                header("location:index.php?action=usuarios");
            }else{
                echo "error";
            }

        }
    }
}
