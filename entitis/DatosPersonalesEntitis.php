<?php


class DatosPersonalesEntities{

    private $nif;
    private $nombre;
    private $apellido;
    private $edad;

    /*
        @autor 'Enrique Arevalo'
        Metodos setter y getters
    */

    public function setNif($nif){
        $this->nif = $nif;
    }

    public function getNif(){
        return $this->nif;
    }

    public function setNombre ($nombre){
        $this->nomnre = $nombre;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function setEdad($edad){
        $this->edad = $edad;
    }

    public function getEdad(){
        return $this->edad;
    }

}





?>