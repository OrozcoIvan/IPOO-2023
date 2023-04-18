<?php
/*La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información referente a sus viajes.
De cada viaje se precisa almacenar el código del mismo, destino, cantidad máxima de pasajeros y los pasajeros del viaje.
Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos
de dicha clase (incluso los datos de los pasajeros). 
Utilice un array que almacene la información correspondiente a los pasajeros.
Cada pasajero es un array asociativo con las claves “nombre”, “apellido” y “numero de documento”.
Implementar un script testViaje.php que cree una instancia de la clase Viaje 
y presente un menú que permita cargar la información del viaje, modificar y ver sus datos. */

/*Modificar la clase Viaje para que ahora los pasajeros sean un objeto que tenga los atributos 
nombre, apellido, numero de documento y teléfono. El viaje ahora contiene una referencia a una colección 
de objetos de la clase Pasajero. También se desea guardar la información de la persona responsable de realizar 
el viaje, para ello cree una clase ResponsableV que registre el número de empleado, número de licencia, 
nombre y apellido. La clase Viaje debe hacer referencia al responsable de realizar el viaje.
Volver a implementar las operaciones que permiten modificar el nombre, apellido y teléfono de un pasajero.
Luego implementar la operación que agrega los pasajeros al viaje, solicitando por consola la información de los mismos.
Se debe verificar que el pasajero no este cargado mas de una vez en el viaje. 
De la misma forma cargue la información del responsable del viaje.*/
class Viaje{
    //atributos
    private $codigoViaje;
    private $destinoViaje;
    private $cantMaxPasajero;
    private $coleccionPasajero=[];  //array
    private $responsableV;

    public function __construct($codigo, $destino, $cantMaxP,$coleccionPasajero,$responsableV)
    {
        $this->codigoViaje=$codigo;
        $this->destinoViaje=$destino;
        $this->cantMaxPasajero=$cantMaxP;
        $this->coleccionPasajero=$coleccionPasajero;
        $this->responsableV=$responsableV;
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
    public function getResponsableV(){
        return $this->responsableV;
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
    public function setResponsableV($responsableV){
        $this->responsableV=$responsableV;
    }

    public function __toString()
    {
        return ("Codigo: ".$this->getCodigo()."\n".
                "Destino: ".$this->getDestino()."\n".
                "Cantidad Maxima de Pasajero: ".$this->getCantMaxPasajero()."\n".
                "Responsable del Viaje: \n".$this->getResponsableV()."\n".
                "Datos De los Pasajeros: \n".$this->MostrarColeccionPasajero())."\n";       
    }

    public function MostrarColeccionPasajero(){
        $coleccionPasajero=$this->getColeccionPasajero();
        $cadena ="";
        foreach ($coleccionPasajero as $pasajero => $datos) {
            //echo $pasajero."\n";
            //echo $datos."\n";
            $cadena= $cadena." Pasajero N°:".$pasajero."\n".$datos."\n";
        }
        return $cadena;
    }
    
    public function BuscarPasajero($numeroDNI){
        $coleccionPasajero=$this->getColeccionPasajero();
        $i=0;
        $encontro=true;
        while($i<count($coleccionPasajero) && $encontro){ 
            $i++;     
            $pasajero=$coleccionPasajero[$i];
            $pasajeroDNI=$pasajero->getNumeroDocumento();
            if($numeroDNI==$pasajeroDNI){
                $encontro=false;
            }
        }   
        return $encontro;
    }

    public function ModificarPasajero($numeroDNI,$nuevoNombre,$nuevoApellido,$nuevoTelefono){
        $coleccionPasajero=$this->getColeccionPasajero();
        $i=0;
        while($i<count($coleccionPasajero)){   
            $pasajero=$coleccionPasajero[$i];
            $pasajeroDNI=$pasajero->getNumeroDocumento();   
            if($numeroDNI==$pasajeroDNI){
                $pasajero->setNombre($nuevoNombre);
                $pasajero->setApellido($nuevoApellido);
                $pasajero->setTelefono($nuevoTelefono);
                $this->setColeccionPasajero($coleccionPasajero);
            }
            $i++;
        }              
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

    public function SeRepite($nuevoNombre,$nuevoApellido,$nuevoDNI,$nuevoTelefono){
        $estaCargado=false;
        $coleccionPasajeros=$this->getColeccionPasajero();
        foreach ($coleccionPasajeros as $pasajero) {
            $nombrePasajero=$pasajero->getNombre();
            $apellidoPasajero=$pasajero->getApellido();
            $DNIPasajero=$pasajero->getNumeroDocumento();
            $telefonoPasajero=$pasajero->getTelefono();
            if((($nuevoNombre==$nombrePasajero)&&($nuevoApellido==$apellidoPasajero))&&(($nuevoDNI==$DNIPasajero)||($nuevoTelefono==$telefonoPasajero))){
                $estaCargado=true;
            }
        }
        return $estaCargado;
    }

    public function CargarNuevaPasajero($nuevoNombre,$nuevoApellido,$nuevoDNI,$nuevoTelefono)
    {
        $coleccionPasajero=$this->getColeccionPasajero();
        $pasajero= new Pasajero($nuevoNombre,$nuevoApellido,$nuevoDNI,$nuevoTelefono);
        array_push($coleccionPasajero,$pasajero);
        $this->setColeccionPasajero($coleccionPasajero);
    }

   
}

?>