<?php

class Conexion{

    private $user;
    private $bd;
    private $host;
    private $cn;
    private $password;

    public function __construct($host, $user, $password, $bd){
        $this->cn = new mysqli($host, $user, $password);  //devolviendo conexion
        $this->bd = $bd;

        if ($this->cn->connect_errno) {  //si existe un error se ejecuta
            echo "Error en la conexion";
            exit();
        }else{
            //echo "Se pudo realizar la conexion";
        }

        $this->cn->select_db($this->bd ) or die("La base de datos no se puede localizar");

        $this->cn->set_charset("utf8");  //caracteres acentuados

    }

    public function getConexion(){
        if ($this->cn == null) {
            echo "No se puede realizar la conexion";
            exit();
        }else{
            return $this->cn;
        }

    }

}



?>