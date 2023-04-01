<?php
/*La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información referente a sus viajes.
De cada viaje se precisa almacenar el código del mismo, destino, cantidad máxima de pasajeros y los pasajeros del viaje.
Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos
de dicha clase (incluso los datos de los pasajeros). 
Utilice un array que almacene la información correspondiente a los pasajeros.
Cada pasajero es un array asociativo con las claves “nombre”, “apellido” y “numero de documento”.
Implementar un script testViaje.php que cree una instancia de la clase Viaje 
y presente un menú que permita cargar la información del viaje, modificar y ver sus datos. */
class Viaje{
    //atributos
    private $codigoViaje;
    private $destinoViaje;
    private $cantMaxPasajero;
    private $coleccionPasajero=[];  //array

    public function __construct($codigo, $destino, $cantMaxP,$coleccionPasajero)
    {
        $this->codigoViaje=$codigo;
        $this->destinoViaje=$destino;
        $this->cantMaxPasajero=$cantMaxP;
        $this->coleccionPasajero=$coleccionPasajero;
    }

    //GET
    public function getCodigo(){
        return $this->codigoViaje;
    }
    public function getDestino(){
        return $this->destinoViaje;
    }
    public function getCantMaxPasajero(){
        return $this->cantMaxPasajero;
    }
    public function getColeccionPasajero(){
        return $this->coleccionPasajero;
    }
     
    //SET
    public function setCodigo($codigoViaje){
        $this->codigoViaje=$codigoViaje;
    }
    public function setDestino($destinoViaje){
        $this->destinoViaje=$destinoViaje;
    }
    public function setCantMaxPasajero($cantMaxPasajero){
        $this->cantMaxPasajero=$cantMaxPasajero;
    }
    public function setColeccionPasajero($coleccionPasajero){
        $this->coleccionPasajero=$coleccionPasajero;
    }

    public function __toString()
    {
        return ("Codigo: ".$this->getCodigo()."\n".
                "Destino: ".$this->getDestino()."\n".
                "Cantidad Maxima de Pasajero: ".$this->getCantMaxPasajero()."\n".
                "Datos De los Pasajeros: ".$this->ForColeccionPasajero())."\n";       
    }

    public function ForColeccionPasajero(){
        $coleccionPasajero=$this->getColeccionPasajero();
        $cadena ="";
        for($i=0 ; $i<count($coleccionPasajero); $i++){
            $cadena= $cadena." Pasajero N°:".$i."\n"."\n"."Nombre: ".$coleccionPasajero[$i]['Nombre']."\n"."Apellido: ".$coleccionPasajero[$i]['Apellido']."\n"."Numero Documento: ".$coleccionPasajero[$i]['DNI']."\n"."\n";           
        }
        return $cadena;
    }
    public function HayEspacio($numPasajero){
        $espacio=false;
        $coleccionPasajero=$this->getColeccionPasajero();
        $cantTotalPasajeros=count($coleccionPasajero);
        $cantMaxPasajero=$this->getCantMaxPasajero();
        $espacioSobrante=$cantMaxPasajero-$cantTotalPasajeros;
        if($numPasajero<=$espacioSobrante){
            $espacio=true;
        }
        return $espacio;
    }

    public function ModificarPasajero($numero){
        $coleccionPasajero=$this->getColeccionPasajero();
        for($i=0 ; $i<count($coleccionPasajero); $i++){      
            if($numero==$i){
                echo "Ingrese el nuevo Nombre: ";
                $nuevoNombre=trim(fgets(STDIN));
                echo "Ingrese el nuevo Apellido: ";
                $nuevoApellido=trim(fgets(STDIN));
                echo "Ingrese el nuevo DNI: ";
                $nuevoDNI=trim(fgets(STDIN));
                $coleccionPasajero[$i]=['Nombre'=>$nuevoNombre,
                                        'Apellido'=>$nuevoApellido,
                                        'DNI'=>$nuevoDNI];
                $this->setColeccionPasajero($coleccionPasajero);
            }
        }              
     
    }

    public function CargarNuevaPasajero($numPasajero)
    {
        $coleccionPasajero=$this->getColeccionPasajero();
        $count=1;
        do {
            echo "Ingrese el Nombre del nuevo Pasajero ";
            $nuevoNombre=trim(fgets(STDIN));
            echo "Ingrese el Apellido del nuevo Pasajero: ";
            $nuevoApellido=trim(fgets(STDIN));
            echo "Ingrese el Numero de Documento del nuevo Pasajero: ";
            $nuevoDNI=trim(fgets(STDIN));
            $count++;
            $pasajero= [
                'Nombre'=>$nuevoNombre,
                'Apellido'=>$nuevoApellido,
                'DNI'=>$nuevoDNI];
            array_push($coleccionPasajero,$pasajero);
        } while ($count<=$numPasajero);
        $this->setColeccionPasajero($coleccionPasajero);
    }

   
}

?>