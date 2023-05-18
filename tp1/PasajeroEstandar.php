<?php
class PasajeroEstandar extends Pasajero{

    public function __construct($nombre,$apellido,$numeroDocumento,$telefono,$nroAsiento,$nroTicket){
        parent::__construct($nombre,$apellido,$numeroDocumento,$telefono,$nroAsiento,$nroTicket);
    }
    public function __toString(){
        $cadena=parent::__toString();
        return $cadena;
    }
    public function darPorcentajeIncremento(){
        $porcentajeIncremento=10;
        return $porcentajeIncremento;
    }
}

?>