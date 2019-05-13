<?php
class Paginas{

  public function enlacesPaginasModel($enlaces){
    if($enlaces  == "ingresar" || 
        $enlaces == "usuarios" ||
        $enlaces == "editar" || 
        $enlaces== "salir" ){
            $module = "views/modulos/".$enlaces.".php";
        }else if ($enlaces == "index"){
            $module = "views/modulos/registro.php";
        }else if ($enlaces == "fallo"){
            $module = "views/modulos/ingresar.php";
        }else if ($enlaces== "cambio"){
            $module = "views/modulos/usuarios.php";
        }else if($enlaces == "ok"){
            $module = "views/modulos/registro.php";
        }
        else{
            $module = "views/modulos/registro.php";
        }
        return $module;
   } 
}
?>