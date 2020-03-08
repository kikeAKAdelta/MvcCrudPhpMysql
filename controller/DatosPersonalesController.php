<?php

include("model/Conexion.php");



class DatosPersonalesController{

    private $conexion;
    private $resulSet;
    private $datos;

    public function getDatosPersonales($conexion){
        $sql = "SELECT nif, nombre, apellido, edad FROM DATOSPERSONALES";

    $this->conexion = $conexion->getConexion();
    $this->resulSet = mysqli_query($this->conexion, $sql); //select a la bd, devuelve rs
    
    return $this->resulSet;

    mysqli_close($this->conexion);


    }


    public function setDatosPersonales($nif, $nombre, $apellido, $edad, $conexion){
        $sql = "INSERT INTO DATOSPERSONALES (nif, nombre, apellido, edad) VALUES('" . $nif . "', '" . $nombre . "', '" . $apellido . "', '" . $edad . "')";

    $this->conexion = $conexion->getConexion();
     
    if(($this->conexion->query($sql)) == true){ //insert a la bd
        echo "Insertado correctamente";
    }else{
        echo "No se inserto correctamente";
    }

    

    mysqli_close($this->conexion);


    }



}


?>