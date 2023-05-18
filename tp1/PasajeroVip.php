<?php
/*La clase "PasajeroVIP" tiene como atributos adicionales 
el número de viajero frecuente y cantidad de millas de pasajero*/
class PasajeroVip extends Pasajero{
    private $nroViajeroFrecuente;
    private $cantMillas;

    public function __construct($nombre,$apellido,$numeroDocumento,$telefono,$nroAsiento,$nroTicket,$nroViajeroFrecuente,$cantMillas){
        parent::__construct($nombre,$apellido,$numeroDocumento,$telefono,$nroAsiento,$nroTicket,$nroViajeroFrecuente,$cantMillas);
        $this->nroViajeroFrecuente=$nroViajeroFrecuente;
        $this->cantMillas=$cantMillas;
    }
    //GET
    public function getNroViajeroFrecuente(){
        return $this->nroViajeroFrecuente;
    }
    public function getCantMillas(){
        return $this->cantMillas;
    }
    //SET
    public function setNroViajeroFrecuente($nroViajeroFrecuente){
        $this->nroViajeroFrecuente=$nroViajeroFrecuente;
    }
    public function setCantMillas($cantMillas){
        $this->cantMillas=$cantMillas;
    }
    public function __toString(){
        $cadena=parent::__toString();
        $cadena.="Numero de Viajero Frecuente: ".$this->getNroViajeroFrecuente()."\n".
                 "Cantidad de Millas: ".$this->getCantMillas()."\n";
        return $cadena;
    }

    /*Para un pasajero VIP se incrementa el importe un 35% y si la cantidad de millas acumuladas 
    supera a las 300 millas se realiza un incremento del 30%.*/
    public function darPorcentajeIncremento(){
        $porcentajeIncremento=0;
        $millasAcumulasdas=$this->getCantMillas();
        if($millasAcumulasdas<300){
            $porcentajeIncremento=30;
        }
        return $porcentajeIncremento;
    }
    
}

?>