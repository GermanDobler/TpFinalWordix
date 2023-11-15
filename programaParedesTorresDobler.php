<?php
include_once("wordix.php");



/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/*Martin Paredes* - legajo FAI-4997 - mail: mdep171@gmail.com - GitHub: tiinch00
/*Matias Nicolas Torres* - legajo FAI-3921 - mail: matiasnicolastorres71@gmail.com - GitHub: MatiTorres18133
/*German Dobler* - legajo 4955 - Mail: german.crack@hotmail.com - Github: GermanDobler */


/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/
//FUNCION 1
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

    return $coleccionPalabras;
}
// 1ro = 6 , 2do = 5, 3ro = 4, 4to = 3, 5to= 2, 6to = 1
//FUNCION 2
/**
 * Obtiene una colección de partidas
 * @return array
 */

function cargarColeccionPartidas()
{
    $arrayPartidas = [];
    $arrayPartidas[0] = ["palabraWordix" => "QUESO", "jugador" => "majo", "intentos" => 0, "puntaje" => 0];
    $arrayPartidas[1] = ["palabraWordix" => "CASAS", "jugador" => "rudolf", "intentos" => 3, "puntaje" => 14];
    $arrayPartidas[2] = ["palabraWordix" => "QUESO", "jugador" => "pink2000", "intentos" => 6, "puntaje" => 10];
    $arrayPartidas[3] = ["palabraWordix" => "PERRO", "jugador" => "pedro12", "intentos" => 3, "puntaje" => 15];
    $arrayPartidas[4] = ["palabraWordix" => "LETRA",  "jugador" => "nasus",  "intentos" => 4, "puntaje" => 13];
    $arrayPartidas[5] = ["palabraWordix" => "MUJER",  "jugador" => "dog123", "intentos" => 4, "puntaje" => 12];
    $arrayPartidas[6] = ["palabraWordix" => "CASAS",  "jugador" => "rudolf", "intentos" => 6, "puntaje" => 11];
    $arrayPartidas[7] = ["palabraWordix" => "NADAR",  "jugador" => "nasus", "intentos" => 2,  "puntaje" => 15];
    $arrayPartidas[8] = ["palabraWordix" => "PIANO",  "jugador" => "pedro12", "intentos" => 4,   "puntaje" => 12];
    $arrayPartidas[9] = ["palabraWordix" => "LETRA",  "jugador" => "majo",   "intentos" => 4,   "puntaje" => 13];

    return $arrayPartidas;
}

/**PUNTO 2 C
 * Genera un array del jugador 
 * @param vacio
 * @return array
 */

function generarArrayInicial()
{
    $jugador = [
        "jugador" => "",
        "partidas" => 0,
        "puntaje" => 0,
        "victorias" => 0,
        "intento1" => 0,
        "intento2" => 0,
        "intento3" => 0,
        "intento4" => 0,
        "intento5" => 0,
        "intento6" => 0
    ];

    return $jugador;
}

//OPCION 3 SWITCH FUNCION 6
/**
 * Muestra una partida seleccionada por el usuario
 * @param $numeroDePartida
 */
function mostrarPartida($numeroDePartida, $partidas)
{
    if ($numeroDePartida > 0 && $numeroDePartida <= count($partidas)) {
        $partida = $partidas[$numeroDePartida - 1];

        echo "Partida: " . $numeroDePartida . "\n";
        echo "Usuario: " . $partida["jugador"] . "\n";
        echo "Palabra: " . $partida["palabraWordix"] . "\n";
        echo "Intentos: " . $partida["intentos"] . "\n";
        echo "Puntaje: " . $partida["puntaje"] . "\n";
    } else {
        echo "Error, esa partida no se ecuentra\n";
    }
}


//OPCION SWITCH 7

//FUNCION 7
/**
 * Agrega una palabra a la coleccion cargarColeccionPalabras()
 * @param array $coleccionPalabras
 * @param string $palabrasAAgregar
 * @return boolean
 */

function agregarPalabra($coleccionPalabras, $palabraAAgregar)
{
    // Verificar si la palabra  esta dentro del arreglo
    $palabraEncontrada = false;

    foreach ($coleccionPalabras as $palabra) {
        if ($palabra === $palabraAAgregar) {
            $palabraEncontrada = true;
        }
    }

    return $palabraEncontrada;
}



// FUNCION 10
/**
 * solicita el nombre del jugador. Se asegura que el nombre empieze con una letra y lo retorna en minuscula
 * @param //vacio
 * @return string
 */

function solicitarJugador()
{
    echo "Ingrese nombre jugador: ";
    $nombreJugador = trim(fgets(STDIN));

    while (($nombreJugador === "") || ($nombreJugador === null)) {
        echo "Debe ingresar algo: ";
        $nombreJugador = trim(fgets(STDIN));
    }


    while (!ctype_alpha($nombreJugador[0])) {


        echo "Debe ingresar un nombre: ";
        $nombreJugador = trim(fgets(STDIN));
        if ($nombreJugador === "" || $nombreJugador === null) {
            $nombreJugador = "1";
        }
    }

    // //verifica que el nombre empieze con una letra


    $nombreJugador = strtolower($nombreJugador);

    return $nombreJugador;
}

/**
 * PUNTO 8
 * retorna el indice de la primer partida ganada de un jugador
 * @param string $nombreJugador
 * @param array $coleccionPartida
 * @return int
 * 
 */

function retornaPrimerPartidaGanada($nombreJugador, $coleccionPartida)
{
    $indice = 0;
    $contador = count($coleccionPartida);

    //BUSCA EN EL ARRAY $coleccionPartida  el indice de la primer partida ganada con el nombre que pasa por parametro
    for ($i = 0; $i < $contador; $i++) {
        if ($coleccionPartida[$i]['jugador'] == $nombreJugador) {
            $indice = 2;
            if ($coleccionPartida[$i]['puntaje'] > 0) {
                $indice = $i;
            }
        }
    }

    //SI NO ENCUENTRA NADA VA A RETORNAR -1
    return $indice;
}


/**PUNTO 9
 * Obtiene el Resumen del jugador
 * @param array $partidas,
 * @param string $nombreJugador, 
 * @return array
 */

function resumenJugador($coleccionPartidas, $nombreJugador)
{
    $arrayJugador = generarArrayInicial();

    //BUSCA EN EL ARRAY $coleccionPartida, la partida del jugador con el nombre pasado por parametro
    foreach ($coleccionPartidas as $partida) {
        if ($partida['jugador'] === $nombreJugador) {


            $arrayJugador['jugador'] = $nombreJugador;
            $arrayJugador['partidas']++;
            $arrayJugador['puntaje'] += $partida['puntaje'];
            if ($partida['puntaje'] > 0) {
                $arrayJugador['victorias']++;
            }
            //asignar el intento a la partida que pertenece al jugador
            switch ($partida['intentos']) {
                case 1:
                    $arrayJugador['intento1']++;
                    break;
                case 2:
                    $arrayJugador['intento2']++;
                    break;
                case 3:
                    $arrayJugador['intento3']++;
                    break;
                case 4:
                    $arrayJugador['intento4']++;
                    break;
                case 5:
                    $arrayJugador['intento5']++;
                    break;
                case 6:
                    $arrayJugador['intento6']++;
                    break;
            }
        }
    }

    return $arrayJugador;
}


/**
 * PUNTO 11
 * MUESTRA UNA COLECCION DE PARTIDAS ORDENADAS POR EL NOMBRE DEL JUGADOR Y POR PALABRA
 * @param array $coleccionPartidas
 * @return vacio
 */
function ordenaColeccion($coleccionPartidas)
{


    //Utiliza la funcion nativa de PHP "USORT" para ordenar el array. A esta funcion le pasamos otra funcion perzonalizada 
    //que hace que ordene el array por jugador y palabra
    uasort($coleccionPartidas, 'compararPorJugadorYPalabra');
    print_r($coleccionPartidas);
}


/** 
 * Función de comparación personalizada para ordenar por jugador y, en caso de empate, por palabra
 * @param string $a
 * @param string $b
 */
function compararPorJugadorYPalabra($a, $b)
{
    $resultado = [];
    if ($a['jugador'] == $b['jugador']) {
        $resultado = strcmp($a['palabraWordix'], $b['palabraWordix']);
    } else {
        $resultado = strcmp($a['jugador'], $b['jugador']);
    }
    return $resultado;
}





/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

/**Declaración de variables:
 * int $opcion ,$eleccion , $numeroDePartida , $i
 * array $coleccionPalabras , $partida , $partidas
 * string $usuario, $palabraElegida ,$nombreJugadorSeleccionado,$palabraAAgregar
 */


//Inicialización de variables:
$coleccionPalabras = cargarColeccionPalabras();
$coleccionPartidas = cargarColeccionPartidas();


//Proceso:

// $partida = jugarWordix("MELON", strtolower("MaJo"));
//print_r($partida);
//imprimirResultado($partida);



do {
    $opcion = seleccionarOpcion();

    switch ($opcion) {
        case 1:
            $usuario = solicitarJugador();
            echo "Ingrese el numero de palabra para jugar(entre 1 y " . count($coleccionPalabras) . "): ";
            $eleccion = trim(fgets(STDIN));
            if (is_numeric($eleccion)) {
                if (($eleccion - 1 >= 0) && ($eleccion - 1  < count($coleccionPalabras))) {
                    $palabraElegida = $coleccionPalabras[$eleccion - 1];
                    $partida = jugarWordix($palabraElegida, strtolower($usuario));
                    array_push($coleccionPartidas, $partida);
                } else {
                    echo "Ingrese una opción correcta\n";
                }
            } else {
                echo "Incorrecto letra ingresada, ingrese una opción correcta\n";
            }
            break;
        case 2:
            // Jugar al wordix con una palabra aleatoria
            $usuario = solicitarJugador();
            $palabraElegida = $coleccionPalabras[rand(0, count($coleccionPalabras) - 1)];
            $partida = jugarWordix($palabraElegida, strtolower($usuario));
            array_push($coleccionPartidas, $partida);
            break;
        case 3:
            //Mostrar una partida elegida
            echo "\n";
            echo "\n";
            echo "\n";
            echo "============================================================================\n";
            echo "Ingrese numero de partida que desee ver de " . "1 a " . count($coleccionPartidas) . ":";
            $numeroDePartida = trim(fgets(STDIN));
            echo "\n";
            echo "\n";

            mostrarPartida($numeroDePartida, $coleccionPartidas);
            echo "============================================================================\n";
            echo "\n";
            echo "\n";
            echo "\n";
            break;
        case 4:
            //Mostrar primera partida ganada de una jugador seleccionado
            echo "\n";
            echo "\n";
            echo "\n";
            echo "Ingrese nombre del jugador: ";
            $nombreJugadorSeleccionado = trim(fgets(STDIN));
            $i = retornaPrimerPartidaGanada($nombreJugadorSeleccionado, $coleccionPartidas);


            if ($i == 2) {
                echo "\n";
                echo "\n";
                echo "\n";
                echo "============================================================================\n";
                echo " NO TIENE PARTIDAS GANADAS \n";
                echo "============================================================================\n";
                echo "\n";
                echo "\n";
                echo "\n";
            } else if ($i == 0) {
                echo "\n";
                echo "\n";
                echo "\n";
                echo "============================================================================\n";
                echo " NO EXISTE EL JUGADOR " . strtoupper($nombreJugadorSeleccionado) . " \n";
                echo "============================================================================\n";
                echo "\n";
                echo "\n";
                echo "\n";
            } else {
                echo "\n";
                echo "\n";
                echo "\n";
                echo "============================================================================\n";
                echo "Partida WORDIX " . $i . " : palabra " . strtoupper($coleccionPartidas[$i]['palabraWordix']) . "\n";
                echo "Jugador: " . $coleccionPartidas[$i]['jugador'] . "\n";
                echo "Puntaje: " . $coleccionPartidas[$i]['puntaje'] . " puntos \n";
                echo "Intento: Adivino la palabra en " . $coleccionPartidas[$i]['intentos'] . " intentos \n";

                echo "============================================================================\n";
                echo "\n";
                echo "\n";
                echo "\n";
            }
            break;
        case 5:

            //Mostrar resumen de Jugador seleccionado
            // echo "=====================LISTA DE JUGADORES=======================\n ";
                
            // $jugador = "";
            // array_reduce()
            // foreach ($coleccionPartidas as $coleccion) {
                
                
            //     if($jugador != $coleccion['jugador']){
            //         echo $coleccion['jugador'] . "\n";
            //     }
            //     $jugador = $coleccion['jugador'];

                
            // }

            echo "==========================ESCRIBA NOMBRE DE JUGADOR=================\n";

            $nombreJugador = solicitarJugador();
            $arrayJugador =  resumenJugador($coleccionPartidas, $nombreJugador);

            if ($arrayJugador['jugador'] !== "") {
                echo "\n";
                echo "\n";
                echo "\n";
                echo "\n";
                echo "\n";
                echo "\n";

                echo "============================================================================\n";
                echo "Resumen del jugador: " . strtoupper($nombreJugador) . "\n";
                echo "Partidas jugadas: " . $arrayJugador['partidas'] . "\n";
                echo "Puntaje total: " . $arrayJugador['puntaje'] . "\n";
                echo "Victorias: " . $arrayJugador['victorias'] . "\n";
                echo "Porcentaje de victorias: " . ($arrayJugador['victorias'] / $arrayJugador['partidas']) * 100 . "%\n";
                echo "Adivinadas: \n";
                echo "Intento 1: " . $arrayJugador['intento1'] . "\n";
                echo "Intento 2: " . $arrayJugador['intento2'] . "\n";
                echo "Intento 3: " . $arrayJugador['intento3'] . "\n";
                echo "Intento 4: " . $arrayJugador['intento4'] . "\n";
                echo "Intento 5: " . $arrayJugador['intento5'] . "\n";
                echo "Intento 6: " . $arrayJugador['intento6'] . "\n";
                echo "============================================================================\n";
                echo "\n";
                echo "\n";
                echo "\n";
                echo "\n";
                echo "\n";
                echo "\n";
            } else {
                echo "\n";
                echo "\n";
                echo "\n";
                echo "\n";
                echo "\n";
                echo "\n";

                echo "============================================================================\n";
                echo "NO HAY PARTIDA PARA EL JUGADOR " . strtoupper($nombreJugador) . " \n";
                echo "============================================================================\n";
                echo "\n";
                echo "\n";
                echo "\n";
                echo "\n";
                echo "\n";
                echo "\n";
            }
            break;
        case 6:
            //MUESTRA LAS PARTIDAS ORDENADAS POR JUGADOR Y PALABRA
            echo "\n";
            echo "\n";
            echo "\n";
            echo "======================= PARTIDAS ORDENADAS ALFABETICAMENTE =================\n";
            ordenaColeccion($coleccionPartidas);
            echo "============================================================================\n";
            echo "\n";
            echo "\n";
            echo "\n";
            break;

        case 7:
            //Agrega una palabra a la coleccion de palabras
            $palabraAgregar = leerPalabra5Letras();
            $existe = agregarPalabra($coleccionPalabras, $palabraAgregar);

            if (!$existe) {

                array_push($coleccionPalabras, $palabraAgregar);


                echo "\n";
                echo "\n";
                echo "\n";
                echo "\n";
                echo "==============================!PALABRA AGREGADA!==================================\n";

                foreach ($coleccionPalabras as $indice => $palabra) {
                    echo $indice . " " . $palabra . "\n";
                }
                echo "================================================================\n";

                echo "\n";
                echo "\n";
                echo "\n";
                echo "\n";
            } else {
                echo "\n";
                echo "\n";
                echo "Esa palabra ya se encuentra en la colección";
                echo "\n";
                echo "\n";
            }

            break;
        case 8:
            echo "============================================================================\n";
            echo "\n";
            echo "Gracias por jugar a Wordix!\n";
            echo "\n";
            break;
        default:
            echo "Opción inválida\n";
    }
} while ($opcion != 8);
