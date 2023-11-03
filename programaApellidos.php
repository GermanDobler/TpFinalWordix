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


        /* Agregar 5 palabras más: YA REALIZADO*/
    ];

    return ($coleccionPalabras);
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
                echo "ERROR MOGOLICO\n";
            }

            break;
        case 2:
            // Jugar al wordix con una palabra aleatoria


            break;
        case 3:
            //Mostrar una partida

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
