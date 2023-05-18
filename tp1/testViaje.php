<?php
require_once('Viaje.php');
require_once('Pasajero.php');
require_once('PasajeroVip.php');
require_once('PasajeroEspecial.php');
require_once('PasajeroEstandar.php');
require_once('ResponsableV.php');

/*Pasajeros Estandars :$nombre,$apellido,$numeroDocumento,$telefono,$nroAsiento,$nroTicket*/
$pasajero1=new PasajeroEstandar("Anna","Cortez",41092149,2994632981,1,01);
$pasajero2=new PasajeroEstandar("Leo","Godinez",41092122,2994632982,2,02);

/*Pasajeros Especiales: $nombre,$apellido,$numeroDocumento,$telefono,$nroAsiento,$nroTicket
,$sillaRuedas,$asistenciaEmbarque,$comidaEspecial*/
$pasajero3=new PasajeroEspecial("Pipo","Carballo",41092129,2994632983,3,03,true,true,false);
$pasajero4=new PasajeroEspecial("Juan","Gomez",41092158,2994632984,4,04,false,false,true);

//PasajerosVIP: $nombre,$apellido,$numeroDocumento,$telefono,$nroAsiento,$nroTicket,$nroViajeroFrecuente,$cantMillas
$pasajero5=new PasajeroVip("Ivan","Orozco",41092159,2994632985,5,05,123,300);
$pasajero6=new PasajeroVip("AAA","OOO",444,299,6,05,124,400);

//coleccion de Pasajeros
$coleccionPasajero=[$pasajero1,$pasajero2,$pasajero3,$pasajero4,$pasajero5,$pasajero6];
//Responsable del viaje
$objResponsableV= new ResponsableV(33599,4231,"Maximiliano","Percara");

//Viaje: $codigo,$destino,$cantMaxP,$coleccionPasajero,$responsableV,$costoViaje,$costosAbonados
$objViaje= new Viaje(123,'Bariloche',10,$coleccionPasajero,$objResponsableV,10000,6000);


//Menu
do {
    // Opcion del menu
    $opcion = seleccionarOpcion();
        switch ($opcion) {
            case 1: 
                echo $objViaje;
                break;
            case 2: 
                echo "Ingrese el nuevo Codigo del Viaje: ";
                $codigoViaje=trim(fgets(STDIN));
                $objViaje->setCodigo($codigoViaje);
                echo "Ingrese el nuevo Destino del Viaje: ";
                $destinoViaje=trim(fgets(STDIN));
                $objViaje->setDestino($destinoViaje);
                echo "Ingrese la cantidad Maxima de Pasajeros: ";
                $cantMaxPasajero=trim(fgets(STDIN));
                $objViaje->setCantMaxPasajero($cantMaxPasajero);
                echo "Ingrese el nuevo costo del vieje: ";
                $costoViaje=trim(fgets(STDIN));
                $objViaje->setCostoViaje($costoViaje);
                echo "Ingrese los nuevos costos Abonados: ";
                $costosAbonados=trim(fgets(STDIN));
                $objViaje->setCostosAbonados($costosAbonados);
                echo "\n Los nuevos datos del Viaje son: ".
                "\nCodigo: ".$objViaje->getCodigo()." \nDestino: ".$objViaje->getDestino().
                "\nCantidad Maxima de Pasajeros: ".$objViaje->getCantMaxPasajero().
                "\nLos costos nuevos del viaje son: ".$objViaje->getCostoViaje().
                " \nLos costos abonados del viaje son: ".$objViaje->getCostosAbonados();
                break;
            case 3:
                /*numero de empleado, numero de licencia,nombre y apellido */
                $responsableV=$objViaje->getResponsableV();
                echo "Ingrese el nuevo Numero de Empleado: ";
                $nroEmpleado=trim(fgets(STDIN));
                $responsableV->setNumEmpleado($nroEmpleado);
                echo "Ingrese el nuevo nuevo Numero de Licencia: ";
                $nroLicencia=trim(fgets(STDIN));
                $responsableV->setNumLicencia($nroLicencia);
                echo "Ingrese el Nombre del Responsable: ";
                $nombreResponsable=trim(fgets(STDIN));
                $responsableV->setNombre($nombreResponsable);
                echo "Ingrese el Apellido del Responsable: ";
                $apellidoResponsable=trim(fgets(STDIN));
                $responsableV->setApellido($apellidoResponsable);

                echo "\n Los nuevos datos del Responsable del Viaje son: ".
                "\nNumero de Empleado: ".$responsableV->getNumEmpleado().
                "\nNumero de Licencia: ".$responsableV->getNumLicencia().
                "\nNombre: ".$responsableV->getNombre().
                "\nApellido: ".$responsableV->getApellido();
            break;
            case 4:
                echo "Ingrese el Numero de DNI del pasajero que desea modificar: ";
                $numeroDNI=trim(fgets(STDIN));
                $encontro=$objViaje->BuscarPasajero($numeroDNI);
                if($encontro==false){
                    echo "Ingrese el nuevo Nombre: ";
                    $nuevoNombre=trim(fgets(STDIN));
                    echo "Ingrese el nuevo Apellido: ";
                    $nuevoApellido=trim(fgets(STDIN));
                    echo "Ingrese el nuevo Telefono: ";
                    $nuevoTelefono=trim(fgets(STDIN));
                    $objViaje->ModificarPasajero($numeroDNI,$nuevoNombre,$nuevoApellido,$nuevoTelefono);
                }else
                echo "\n ESE PASAJERO YA EXISTE!!! \n";
            break;
            case 5:
                $hayPasaje=$objViaje->hayPasajesDisponible();
                if($hayPasaje==true){
                    $pasaje=queTipoPasajeroEs();
                    //$objPasajero=$objViaje->datosPasajero($pasaje);
                    if($pasaje==1){
                        //$nombre,$apellido,$numeroDocumento,$telefono,$nroAsiento,$nroTicket,$nroViajeroFrecuente,$cantMillas
                        echo "Ingrese el Nombre del nuevo Pasajero ";
                        $nuevoNombre=trim(fgets(STDIN));
                        echo "Ingrese el Apellido del nuevo Pasajero: ";
                        $nuevoApellido=trim(fgets(STDIN));
                        echo "Ingrese el Numero de Documento del nuevo Pasajero: ";
                        $nuevoDNI=trim(fgets(STDIN));
                        echo "Ingrese el Telefono del nuevo Pasajero: ";
                        $nuevoTelefono=trim(fgets(STDIN));
                        echo "Ingrese el numero de asiento: ";
                        $nuevoNumeroAsiento=trim(fgets(STDIN));
                        echo "Ingrese el numero de ticket: ";
                        $nroTicket=trim(fgets(STDIN));
                        echo "Ingrese el numero de viajero Frecuente: ";
                        $nroViajeroFrecuente=trim(fgets(STDIN));
                        echo "Ingrese la cantidad de millas: ";
                        $cantMillas=trim(fgets(STDIN));
                        $estaCargado=$objViaje->SeRepite($nuevoNombre,$nuevoApellido,$nuevoDNI,$nuevoTelefono);
                        if($estaCargado==false){
                            $objPasajero= new PasajeroVip($nuevoNombre,$nuevoApellido,$nuevoDNI,$nuevoTelefono,$nuevoNumeroAsiento,$nroTicket,$nroViajeroFrecuente,$cantMillas);
                            $objViaje->venderPasaje($objPasajero);
                        }else
                        echo "\n"."ese Pasajero ya existe!"."\n";
                    }elseif ($pasaje==2) {
                        //$nombre,$apellido,$numeroDocumento,$telefono,$nroAsiento,$nroTicket,$sillaRuedas,$asistenciaEmbarque,$comidaEspecial
                        echo "Ingrese el Nombre del nuevo Pasajero ";
                        $nuevoNombre=trim(fgets(STDIN));
                        echo "Ingrese el Apellido del nuevo Pasajero: ";
                        $nuevoApellido=trim(fgets(STDIN));
                        echo "Ingrese el Numero de Documento del nuevo Pasajero: ";
                        $nuevoDNI=trim(fgets(STDIN));
                        echo "Ingrese el Telefono del nuevo Pasajero: ";
                        $nuevoTelefono=trim(fgets(STDIN));
                        echo "Ingrese el numero de asiento: ";
                        $nuevoNumeroAsiento=trim(fgets(STDIN));
                        echo "Ingrese el numero de ticket: ";
                        $nroTicket=trim(fgets(STDIN));
                        echo "Necesita Silla de Ruedas?: (si/no)";
                        $sillaRuedas=trim(fgets(STDIN));
                        echo "Necesita Asistencia al embarcar y desembarcar?: (si/no)";
                        $asistenciaEmbarque=trim(fgets(STDIN));
                        echo "Padece de algun tipo de complicacion a la hora de comer?: (si/no)";
                        $comidaEspecial=trim(fgets(STDIN));
                        $estaCargado=$objViaje->SeRepite($nuevoNombre,$nuevoApellido,$nuevoDNI,$nuevoTelefono);
                        if($estaCargado==false){
                            $objPasajero= new PasajeroEspecial($nuevoNombre,$nuevoApellido,$nuevoDNI,$nuevoTelefono,$nuevoNumeroAsiento,$nroTicket,$sillaRuedas,$asistenciaEmbarque,$comidaEspecial);
                            $objViaje->venderPasaje($objPasajero);
                        }else
                        echo "\n"."ese Pasajero ya existe!"."\n";
                    }elseif ($pasaje==3) {
                        //$nombre,$apellido,$numeroDocumento,$telefono,$nroAsiento,$nroTicket
                        echo "Ingrese el Nombre del nuevo Pasajero ";
                        $nuevoNombre=trim(fgets(STDIN));
                        echo "Ingrese el Apellido del nuevo Pasajero: ";
                        $nuevoApellido=trim(fgets(STDIN));
                        echo "Ingrese el Numero de Documento del nuevo Pasajero: ";
                        $nuevoDNI=trim(fgets(STDIN));
                        echo "Ingrese el Telefono del nuevo Pasajero: ";
                        $nuevoTelefono=trim(fgets(STDIN));
                        echo "Ingrese el numero de asiento: ";
                        $nuevoNumeroAsiento=trim(fgets(STDIN));
                        echo "Ingrese el numero de ticket: ";
                        $nroTicket=trim(fgets(STDIN));
                        $estaCargado=$objViaje->SeRepite($nuevoNombre,$nuevoApellido,$nuevoDNI,$nuevoTelefono);
                        if($estaCargado==false){
                            $objPasajero= new PasajeroEstandar($nuevoNombre,$nuevoApellido,$nuevoDNI,$nuevoTelefono,$nuevoNumeroAsiento,$nroTicket);
                            $objViaje->venderPasaje($objPasajero);
                        }else
                        echo "\n"."ese Pasajero ya existe!"."\n";

                    
                    }
                }
                break;
            }
    }
    while ($opcion != 6);

function seleccionarOpcion(){
    echo "\n MENU DE OPCIONES: \n
            1)- Mostrar Datos: \n
            2)- Modificar datos del Viaje: \n
            3)- Modificar datos del Responsable del Viaje: \n
            4)- Modificar Datos de un pasajero: \n
            5)- Vender un Pasaje: \n
            6)- SALIR. \n";
    $opcion = trim(fgets(STDIN));

    if ($opcion < 1 || $opcion > 6){
        echo "Ingrese una opcion valida:";
    }
    return $opcion;
}

function queTipoPasajeroEs(){
    echo"¿Que tipo de pasajero es? ";
    echo "\n PasajeroVip(1) \n PasajeroEspecial(2) \n PasajeroEstandar(3): ";
    $tipoPasajero=trim(fgets(STDIN));
    if($tipoPasajero==1){
    }elseif ($tipoPasajero==2) {
    }elseif ($tipoPasajero==3) {
    }elseif ($tipoPasajero < 1 || $tipoPasajero > 3){
        echo "Ingrese una opcion valida:";
    }
    return $tipoPasajero;
}

/*function datosPasajero($pasaje){
    if($pasaje==1){
        //$nombre,$apellido,$numeroDocumento,$telefono,$nroAsiento,$nroTicket,$nroViajeroFrecuente,$cantMillas
        echo "Ingrese el Nombre del nuevo Pasajero ";
        $nuevoNombre=trim(fgets(STDIN));
        echo "Ingrese el Apellido del nuevo Pasajero: ";
        $nuevoApellido=trim(fgets(STDIN));
        echo "Ingrese el Numero de Documento del nuevo Pasajero: ";
        $nuevoDNI=trim(fgets(STDIN));
        echo "Ingrese el Telefono del nuevo Pasajero: ";
        $nuevoTelefono=trim(fgets(STDIN));
        echo "Ingrese el numero de asiento: ";
        $nuevoNumeroAsiento=trim(fgets(STDIN));
        echo "Ingrese el numero de ticket: ";
        $nroTicket=trim(fgets(STDIN));
        echo "Ingrese el numero de viajero Frecuente: ";
        $nroViajeroFrecuente=trim(fgets(STDIN));
        echo "Ingrese la cantidad de millas: ";
        $cantMillas=trim(fgets(STDIN));
    }elseif ($pasaje==2) {
        //$nombre,$apellido,$numeroDocumento,$telefono,$nroAsiento,$nroTicket,$sillaRuedas,$asistenciaEmbarque,$comidaEspecial
        echo "Ingrese el Nombre del nuevo Pasajero ";
        $nuevoNombre=trim(fgets(STDIN));
        echo "Ingrese el Apellido del nuevo Pasajero: ";
        $nuevoApellido=trim(fgets(STDIN));
        echo "Ingrese el Numero de Documento del nuevo Pasajero: ";
        $nuevoDNI=trim(fgets(STDIN));
        echo "Ingrese el Telefono del nuevo Pasajero: ";
        $nuevoTelefono=trim(fgets(STDIN));
        echo "Ingrese el numero de asiento: ";
        $nuevoNumeroAsiento=trim(fgets(STDIN));
        echo "Ingrese el numero de ticket: ";
        $nroTicket=trim(fgets(STDIN));
        echo "Necesita Silla de Ruedas?: (si/no)";
        $sillaRuedas=trim(fgets(STDIN));
        echo "Necesita Asistencia al embarcar y desembarcar?: (si/no)";
        $asistenciaEmbarque=trim(fgets(STDIN));
        echo "Padece de algun tipo de complicacion a la hora de comer?: (si/no)";
        $comidaEspecial=trim(fgets(STDIN));
    }elseif ($pasaje==3) {
        //$nombre,$apellido,$numeroDocumento,$telefono,$nroAsiento,$nroTicket
        echo "Ingrese el Nombre del nuevo Pasajero ";
        $nuevoNombre=trim(fgets(STDIN));
        echo "Ingrese el Apellido del nuevo Pasajero: ";
        $nuevoApellido=trim(fgets(STDIN));
        echo "Ingrese el Numero de Documento del nuevo Pasajero: ";
        $nuevoDNI=trim(fgets(STDIN));
        echo "Ingrese el Telefono del nuevo Pasajero: ";
        $nuevoTelefono=trim(fgets(STDIN));
        echo "Ingrese el numero de asiento: ";
        $nuevoNumeroAsiento=trim(fgets(STDIN));
        echo "Ingrese el numero de ticket: ";
        $nroTicket=trim(fgets(STDIN));
    }
    return $objPasajero;
}*/