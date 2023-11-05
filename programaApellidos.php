<?php
include_once("wordix.php");



/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/* ****COMPLETAR***** */


/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 * Obtiene una colección de palabras
 * @return array
 */
function cargarColeccionPalabras()
{
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "LETRA", "MARZO", "LUNES", "MANGO", "NADAR"


        
    ];

    return ($coleccionPalabras);
}
$coleccionPalabras = cargarColeccionPalabras();

function agregarPalabra($coleccionPalabras,$palabraAAgregar){

    if(strlen($palabraAAgregar) != 5){

        echo "La palabra debe ser de 5 letras";
    }else {
        //verificar si la palabra no esta dentro del arreglo
        if(!in_array($palabraAAgregar,$coleccionPalabras)){
            //transforma la palabra en mayusculas
            $palabraAAgregar = strtoupper($palabraAAgregar);
            //agrega la palabra a la coleccion
            array_push($coleccionPalabras);
        }else {
            echo "Esa palabra ya se encuentra en la coleecion";
        }
    }

}



 function mostrarPartida($numeroDePartida){
   $partidas = cargarPartidas();

   if ($numeroDePartida > 0 && $numeroDePartida < count($partidas)){    
        $partida = $partidas[$numeroDePartida - 1];
    
             echo "Partida: ".($numeroDePartida - 1)."\n";
             echo "Usuario: ".$partida["jugador"]."\n";
             echo "Palabra: ".$partida["palabraWordix"]."\n";
             echo "Intentos: ".$partida["intentos"]."\n";
             echo "Puntaje: ".$partida["puntaje"]."\n";
             echo "---------------------------------\n";
    

    } else {
       echo "Error, esa partida no se ecuentra";
    }
} 
   
/**
 * Obtiene una colección de partidas
 * @return string
 */

function cargarPartidas(){
    
    $coleccionPartidas=[];

    
    $coleccionPartidas[0] = ["palabraWordix"=> "QUESO" , "jugador" => "majo", "intentos"=> 0, "puntaje" => 0];
    $coleccionPartidas[1] = ["palabraWordix"=> "CASAS" , "jugador" => "rudolf", "intentos"=> 3, "puntaje" => 14];
    $coleccionPartidas[2] = ["palabraWordix"=> "QUESO" , "jugador" => "pink2000", "intentos"=> 6, "puntaje" => 10];
    $coleccionPartidas[3] = ["palabraWordix"=> "PERRO" , "jugador" => "pedro12", "intentos"=> 3,"puntaje"=> 0];
    $coleccionPartidas[4] = ["palabraWordix"=> "LETRA",  "jugador" => "nasus",  "intentos"=> 1, "puntaje"=> 0 ];
    $coleccionPartidas[5] = ["palabraWordix" => "MUJER",  "jugador" => "dog123", "intentos" => 4, "puntaje"=> 0 ];
    $coleccionPartidas[6] = ["palabraWordix" => "CASAS",  "jugador" => "rudolf", "intentos"=> 6, "puntaje"=> 0];
    $coleccionPartidas[7] = ["palabraWordix" => "NADAR",  "jugador" => "nasus" , "intentos"=> 2 ,  "puntaje"=> 0];
    $coleccionPartidas[8] = ["palabraWordix" => "PIANO",  "jugador" => "pedro12","intentos"=> 4,   "puntaje"=> 0];
    $coleccionPartidas[9] = ["palabraWordix" => "LETRA",  "jugador" => "majo",   "intentos"=> 4,   "puntaje"=> 0];

    return $coleccionPartidas;
}



/**
 * Obtiene una colección de partidas
 * @return string
 */

function mostrarListadoPartidas()
{
    $partidas = [
        "1" => [
            "usuario" => "MATI TORRE GATO",
            "palabra" => "MELON",
            "intentos" => 3,
            "estado" => "Perdida",
            "puntaje" => 100,
        ],
        "2" => [
            "usuario" => "MARTIN DEMICHELI",
            "palabra" => "MELON",
            "intentos" => 3,
            "estado" => "Ganada",
            "puntaje" => 10000,
        ],
        "3" => [
            "usuario" => "EL GERMAN",
            "palabra" => "MELON",
            "intentos" => 3,
            "estado" => "Ganada",
            "puntaje" => 10000,
        ],
    ];
    foreach ($partidas as $partida => $value) {
        echo "Partida: $partida\n";
        echo "Usuario: $value[usuario]\n";
        echo "Palabra: $value[palabra]\n";
        echo "Intentos: $value[intentos]\n";
        echo "Estado: $value[estado]\n";
        echo "Puntaje: $value[puntaje]\n";
        echo "---------------------------------\n";
    }
}




/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:


//Proceso:

// $partida = jugarWordix("MELON", strtolower("MaJo"));
//print_r($partida);
//imprimirResultado($partida);



do {
    $opcion = seleccionarOpcion();
    $cantPalabras = count(cargarColeccionPalabras());
    $coleccionPalabras = cargarColeccionPalabras();


    switch ($opcion) {
        case 1:
            //Jugar al wordix con una palabra elegida
            echo "Ingrese su usuario: ";
            $usuario = trim(fgets(STDIN));
            echo "Ingrese el numero de palabra para jugar(entre 1 y $cantPalabras ): ";
            $eleccion = trim(fgets(STDIN)) - 1;
            if (($eleccion >= 0) && ($eleccion < $cantPalabras)) {
                $palabraElegida = $coleccionPalabras[$eleccion];
                jugarWordix($palabraElegida, strtolower($usuario));
            } else {
                echo "ERROR\n";
            }

            break;
        case 2:
            // Jugar al wordix con una palabra aleatoria
            echo "Ingrese su usuario: ";
            $usuario = trim(fgets(STDIN));
            $palabraElegida = $coleccionPalabras[rand(0, $cantPalabras - 1)];
            jugarWordix($palabraElegida, strtolower($usuario));
            break;
        case 3:
            //Mostrar una partida
            echo "Ingrese numero de partida que desee ver: ";
            $numeroDePartida = trim(fgets(STDIN));
            $mostrarPartidaElegida = mostrarPartida($numeroDePartida);

            break;
        case 4:
            //Mostrar la primer partida ganadora
            //...
            break;
        case 5:
            //Mostrar resumen de Jugador
            break;
        case 6:
            //Mostrar listado de partidas ordenadas por jugador y por palabra
            mostrarListadoPartidas();
            break;
        case 7:
            //Agregar una palabra de 5 letras a Wordix
            echo "Ingrese palabra de 5 letras para agregar a la lista";
            $palabraAAgregar = trim(fgets(STDIN));
            agregarPalabra($coleccionPalabras,$palabraAAgregar);



            break;
        case 8:
            //borrar consola 
            // system('cls');
            echo "Gracias por jugar a Wordix\n";
            break;
        default:
            echo "Opción inválida\n";
    }
} while ($opcion != 8);
