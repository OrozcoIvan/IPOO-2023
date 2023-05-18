<?php
/* La clase Pasajeros con necesidades especiales se refiere a pasajeros que pueden requerir 
servicios especiales como sillas de ruedas, asistencia para el embarque o desembarque,
o comidas especiales para personas con alergias o restricciones alimentarias.*/
class PasajeroEspecial extends Pasajero{
    private $sillaRuedas;
    private $asistenciaEmbarque;
    private $comidaEspecial;

    public function __construct($nombre,$apellido,$numeroDocumento,$telefono,$nroAsiento,$nroTicket,$sillaRuedas,$asistenciaEmbarque,$comidaEspecial){
        parent::__construct($nombre,$apellido,$numeroDocumento,$telefono,$nroAsiento,$nroTicket,$sillaRuedas,$asistenciaEmbarque,$comidaEspecial);
        $this->sillaRuedas=$sillaRuedas;
        $this->asistenciaEmbarque=$asistenciaEmbarque;
        $this->comidaEspecial=$comidaEspecial;
    }
    //GET
    public function getSillaRuedas(){
        return $this->sillaRuedas;
    }
    public function getAsistenciaEmbarque(){
        return $this->asistenciaEmbarque;
    }
    public function getComidaEspecial(){
        return $this->comidaEspecial;
    }
    //SET
    public function setSillaRuedas($sillaRuedas){
        $this->sillaRuedas=$sillaRuedas;
    }
    public function setAsistenciaEmbarque($asistenciaEmbarque){
        $this->asistenciaEmbarque=$asistenciaEmbarque;
    }
    public function setComidaEspecial($comidaEspecial){
        $this->comidaEspecial=$comidaEspecial;
    }

    public function __toString(){
        $cadena=parent::__toString();
        $cadena.="Silla de Ruedas: ".$this->getSillaRuedas()."\n".
                 "Asistencia de Embarque: ".$this->getAsistenciaEmbarque()."\n".
                 "Comida Especial: ".$this->getComidaEspecial()."\n";
        return $cadena;
    }

    /*Si el pasajero tiene necesidades especiales y requiere silla de ruedas,
    asistencia y comida especial entonces el pasaje tiene un incremento del 30%; 
    si solo requiere uno de los servicios prestados entonces el incremento es del 15%. */
    public function darPorcentajeIncremento(){
        $porcentajeIncremento=0;
        $sillaRuedas=$this->getSillaRuedas();
        $asistenciaEmbarque=$this->getAsistenciaEmbarque();
        $comidaEspecial=$this->getComidaEspecial();
        if($sillaRuedas==true) {
            $porcentajeIncremento=15;
        }elseif($asistenciaEmbarque==true){
            $porcentajeIncremento=15;
        }elseif($comidaEspecial==true){
            $porcentajeIncremento=15;
        }elseif(($sillaRuedas==true)&&($asistenciaEmbarque==true)&&($comidaEspecial==true)){
            $porcentajeIncremento=30;
        }
        return $porcentajeIncremento;
    }
}

?>