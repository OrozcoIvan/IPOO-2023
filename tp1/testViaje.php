<?php
require_once('Viaje.php');
require_once('Pasajero.php');
require_once('ResponsableV.php');

/*Pasajeros :nombre, apellido, numero de documento y telefono */
$pasajero1=new Pasajero("Anna","Cortez",41092149,2994632981);
$pasajero2=new Pasajero("Leo","Godinez",41092122,2994632982);
$pasajero3=new Pasajero("Pipo","Carballo",41092129,2994632983);
$pasajero4=new Pasajero("Juan","Gomez",41092158,2994632984);
$pasajero5=new Pasajero("Ivan","Orozco",41092159,2994632985);
$pasajero6=new Pasajero("AAA","OOO",444,299);

$coleccionPasajero=[$pasajero1,$pasajero2,$pasajero3,$pasajero4,$pasajero5,$pasajero6];

$objResponsableV= new ResponsableV(33599,4231,"Maximiliano","Percara");

$objViaje= new Viaje(123,'Bariloche',10,$coleccionPasajero,$objResponsableV);


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
                echo "Ingrese la cantidad de pasajeros que desea cargar: ";
                $numPasajero=trim(fgets(STDIN));
                $espacio=$objViaje->HayEspacio($numPasajero);
                if($espacio==true){
                $count=0;
                    do{
                        echo "Ingrese el Nombre del nuevo Pasajero ";
                        $nuevoNombre=trim(fgets(STDIN));
                        echo "Ingrese el Apellido del nuevo Pasajero: ";
                        $nuevoApellido=trim(fgets(STDIN));
                        echo "Ingrese el Numero de Documento del nuevo Pasajero: ";
                        $nuevoDNI=trim(fgets(STDIN));
                        echo "Ingrese el Telefono del nuevo Pasajero: ";
                        $nuevoTelefono=trim(fgets(STDIN));
                        $estaCargado=$objViaje->SeRepite($nuevoNombre,$nuevoApellido,$nuevoDNI,$nuevoTelefono);
                        if($estaCargado==false){
                            $objViaje->CargarNuevaPasajero($nuevoNombre,$nuevoApellido,$nuevoDNI,$nuevoTelefono);
                            $count++;
                        }else
                            echo "ese Pasajero ya existe!";
                    }while($count<$numPasajero);
                }else
                echo "No hay sufiente espacio!";
                

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
            5)- Cargar un nuevo pasajero: \n
            6)- SALIR. \n";
    $opcion = trim(fgets(STDIN));

    if ($opcion < 1 || $opcion > 6){
        echo "Ingrese una opción válida:";
    }
    return $opcion;
}