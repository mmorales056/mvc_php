<?php
class Conexion{
    public function conectar(){
        #esta variable cargara todo lo que lleva el parametro de la conexion
        $link= new PDO("mysql:host=localhost:3306;dbname=cursophp","mateo","Mateo12345");
        return $link;
    }


}

$a=new Conexion();
$a->conectar();

?>