<?php
require_once('Viaje.php');

$pasajero1=['Nombre' => "Anna", 'Apellido' => "Cortez", 'DNI' => 41092149];
$pasajero2=['Nombre' => "Leo", 'Apellido' => "Godinez", 'DNI' => 41092122];
$pasajero3=['Nombre' => "Pipo", 'Apellido' => "Carballo",'DNI' => 41092129];
$pasajero4=['Nombre' => "Juan", 'Apellido' => "Gomez", 'DNI' => 41092158];
$pasajero5=['Nombre' => "Ivan", 'Apellido' => "Orozco", 'DNI' => 41092159];

$coleccionPasajero=[$pasajero1,$pasajero2,$pasajero3,$pasajero4,$pasajero5];

$objViaje= new Viaje(123,'Bariloche',10,$coleccionPasajero);

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

                echo "\n Los nuevos datos del Viaje son: ".
                "\nCodigo: ".$objViaje->getCodigo()." \nDestino: ".$objViaje->getDestino().
                "\nCantidad Maxima de Pasajeros: ".$objViaje->getCantMaxPasajero();

                break;
            case 3:
                    echo "Ingrese el Numero del pasajero que desea modificar: ";
                    $numero=trim(fgets(STDIN));
                    $objViaje->ModificarPasajero($numero);
            break;
            case 4:
                echo "Ingrese la cantidad de pasajeros que desea cargar: ";
                $numPasajero=trim(fgets(STDIN));
                $espacio=$objViaje->HayEspacio($numPasajero);
                if($espacio==true){
                    $objViaje->CargarNuevaPasajero($numPasajero);
                }else
                echo "No hay sufiente espacio!";
                

                break;
            }
    }
    while ($opcion != 5);

function seleccionarOpcion(){
    echo "\n MENU DE OPCIONES: \n
            1)- Mostrar Datos: \n
            2)- Modificar datos del Viaje: \n
            3)- Modificar Datos de un pasajero: \n
            4)- Cargar un nuevo pasajero: \n
            5)- SALIR. \n";
    $opcion = trim(fgets(STDIN));

    if ($opcion < 1 || $opcion > 5){
        echo "Ingrese una opción válida:";
    }
    return $opcion;
}