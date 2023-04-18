<?php
/*nombre, apellido, numero de documento y teléfono */
class Pasajero{
    private $nombre;
    private $apellido;
    private $numeroDocumento;
    private $telefono;

    public function __construct($nombre,$apellido,$numeroDocumento,$telefono)
    {   $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->numeroDocumento=$numeroDocumento;
        $this->telefono=$telefono;
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getNumeroDocumento(){
        return $this->numeroDocumento;
    }
    public function getTelefono(){
        return $this->telefono;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function setApellido($apellido){
        $this->apellido=$apellido;
    }
    public function setNumeroDocumento($numeroDocumento){
        $this->numeroDocumento=$numeroDocumento;
    }
    public function setTelefono($telefono){
        $this->telefono=$telefono;
    } 

    public function __toString()
    {
        return ("Nombre: ".$this->getNombre()."\n".
                "Apellido: ".$this->getApellido()."\n".
                "Numero de Documento : ".$this->getNumeroDocumento()."\n".
                "Telefono: ".$this->getTelefono()."\n");
    }
}
?>