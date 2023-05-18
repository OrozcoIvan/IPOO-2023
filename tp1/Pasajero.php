<?php
/*nombre, apellido, numero de documento y teléfono 
 nombre, el número de asiento y el número de ticket del pasaje del viaje.*/
class Pasajero{
    private $nombre;
    private $apellido;
    private $numeroDocumento;
    private $telefono;
    private $nroAsiento;
    private $nroTicket;

    public function __construct($nombre,$apellido,$numeroDocumento,$telefono,$nroAsiento,$nroTicket)
    {   $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->numeroDocumento=$numeroDocumento;
        $this->telefono=$telefono;
        $this->nroAsiento=$nroAsiento;
        $this->nroTicket=$nroTicket;
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
    public function getNroAsiento(){
        return $this->nroAsiento;
    }
    public function getNroTicket(){
        return $this->nroTicket;
    }
    //SET
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
    public function setNroAsiento($nroAsiento){
        $this->nroAsiento=$nroAsiento;
    } 
    public function setNroTicket($nroTicket){
        $this->nroTicket=$nroTicket;
    }  

    public function __toString()
    {
        return ("Nombre: ".$this->getNombre()."\n".
                "Apellido: ".$this->getApellido()."\n".
                "Numero de Documento : ".$this->getNumeroDocumento()."\n".
                "Telefono: ".$this->getTelefono()."\n".
                "Numero de Asiento: ".$this->getNroAsiento()."\n".
                "Numero de Ticket: ".$this->getNroTicket()."\n");
    }
}
?>