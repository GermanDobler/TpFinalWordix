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

    return ($coleccionPalabras);
}
//OPCION SWITCH 7


/**
 * Agrega una palabra a la coleccion cargarColeccionPalabras()
 * @param array $coleccionPalabras
 * @param string $palabrasAAgregar
 */
//FUNCION 7
function agregarPalabra($coleccionPalabras,$palabraAAgregar){

        //verificar si la palabra no esta dentro del arreglo
        if(!in_array($palabraAAgregar,$coleccionPalabras)){
            echo $palabraAAgregar.'\n';

            //agrega la palabra a la coleccion
            array_push($coleccionPalabras,$palabraAAgregar);

            print_r($coleccionPalabras);

            echo "Palabra agregada!";
        }else {
            echo "Esa palabra ya se encuentra en la coleecion";
        }
}


//OPCION 3 SWITCH FUNCION 6
/**
 * Muestra una partida seleccionada por el usuario
 * @param $numeroDePartida
 */
 function mostrarPartida($numeroDePartida){
   $partidas = cargarPartidas();

   if ($numeroDePartida > 0 && $numeroDePartida < count($partidas)){    
        $partida = $partidas[$numeroDePartida -1];
    
             echo "Partida: ".$numeroDePartida."\n";
             echo "Usuario: ".$partida["jugador"]."\n";
             echo "Palabra: ".$partida["palabraWordix"]."\n";
             echo "Intentos: ".$partida["intentos"]."\n";
             echo "Puntaje: ".$partida["puntaje"]."\n";
             echo "---------------------------------\n";
    

    } else {
       echo "Error, esa partida no se ecuentra";
    }
    
} 
// FUNCION 10
/**
 * solicita el nombre del jugador. Se asegura que el nombre empieze con una letra y lo retorna en minuscula
 * @param //vacio
 * @return string
 */
   
 function solicitarJugador(){
    echo "Ingrese nombre jugador: ";
    $nombreJugador = trim(fgets(STDIN));
    //verifica que el nombre empieze con una letra
    if(ctype_alpha($nombreJugador[0])){
        //si el nombre inicia con letra, lo transforma todo a minusculas
        $nombreJugador = strtolower($nombreJugador);
    }
    
    return $nombreJugador;

 }


//FUNCION 2
/**
 * Obtiene una colección de partidas
 * @return array
 */

function cargarPartidas(){
    
    $coleccionPartidas=[];

    
    $coleccionPartidas[0] = ["palabraWordix"=> "QUESO" , "jugador" => "majo", "intentos"=> 0, "puntaje" => 0];

    $coleccionPartidas[1] = ["palabraWordix"=> "CASAS" , "jugador" => "rudolf", "intentos"=> 3, "puntaje" => 14];
    $coleccionPartidas[2] = ["palabraWordix"=> "QUESO" , "jugador" => "pink2000", "intentos"=> 6, "puntaje" => 10];
    $coleccionPartidas[3] = ["palabraWordix"=> "PERRO" , "jugador" => "pedro12", "intentos"=> 3,"puntaje"=> 0];
    $coleccionPartidas[4] = ["palabraWordix"=> "LETRA",  "jugador" => "nasus",  "intentos"=> 1, "puntaje"=> 0 ];
    $coleccionPartidas[5] = ["palabraWordix" => "MUJER",  "jugador" => "dog123", "intentos" => 4, "puntaje"=> 0 ];
    $coleccionPartidas[6] = ["palabraWordix" => "CASAS",  "jugador" => "rudolf", "intentos"=> 6, "puntaje"=> 5];
    $coleccionPartidas[7] = ["palabraWordix" => "NADAR",  "jugador" => "nasus" , "intentos"=> 2 ,  "puntaje"=> 0];
    $coleccionPartidas[8] = ["palabraWordix" => "PIANO",  "jugador" => "pedro12","intentos"=> 4,   "puntaje"=> 0];
    $coleccionPartidas[9] = ["palabraWordix" => "LETRA",  "jugador" => "majo",   "intentos"=> 4,   "puntaje"=> 0];

    return $coleccionPartidas;
}


/**PUNTO 2 C
 * Genera un array del jugador 
 * @param vacio
 * @return array
 */

function generarArrayInicial(){
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


/**
 * PUNTO 8
 * retorna el indice de la primer partida ganada de un jugador
 * @param string $nombreJugador
 * @param array $coleccionPartida
 * @return int
 * 
 */

 function retornaPrimerPartidaGanada($nombreJugador, $coleccionPartida){
    $contador = count($coleccionPartida);
    for ($i=0; $i<$contador; $i++){
        if($coleccionPartida[$i]['jugador'] == $nombreJugador){
           if($coleccionPartida[$i]['puntaje'] > 0){
            return $i;
           }
        }
        
    }
    return -1;

 }


/**PUNTO 9
 * Obtiene el Resumen del jugador
 * @param array $partidas,
 * @param string $nombreJugador, 
 * @return array
 */

 function resumenJugador($coleccionPartidas , $nombreJugador){


    $arrayJugador = generarArrayInicial();

    foreach($coleccionPartidas as $partida){
        
            $arrayJugador['jugador'] = $nombreJugador;
            $arrayJugador['partidas']=$partida['intentos'];
            $arrayJugador['puntaje'] = $arrayJugador['puntaje'] + $partida['puntaje'];
             
         for($i=0; $i<$partida['intentos']; $i++){
            
            $arrayJugador['intento'+($i+1)] = $partida[$i]['puntaje'];
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
function ordenaColeccion($coleccionPartidas){

uasort($coleccionPartidas, 'compararPorJugadorYPalabra');
print_r($coleccionPartidas);

}


/** 
 * Funcuon de comparacion perzonalizada */ 
// Función de comparación para ordenar por jugador y, en caso de empate, por palabra
function compararPorJugadorYPalabra($a, $b) {
    if ($a['jugador'] == $b['jugador']) {
        return strcmp($a['palabraWordix'], $b['palabraWordix']);
    }
    return strcmp($a['jugador'], $b['jugador']);
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
            echo "\n";
            echo "\n";
            echo "\n";
            echo "============================================================================\n";
            echo "Ingrese numero de partida que desee ver: ";
            $numeroDePartida = trim(fgets(STDIN));
            echo "\n";
            echo "\n";

            mostrarPartida($numeroDePartida);
            echo "============================================================================\n";
            echo "\n";
            echo "\n";
            echo "\n";
            break;
        case 4:
            //Mostrar primera partida ganada
            echo "\n";
            echo "\n";
            echo "\n";
            echo "============================================================================\n";
            echo "Ingrese nombre del jugador: ";
            $nombreJugadorSeleccionado = trim(fgets(STDIN));
            $partidas = cargarPartidas();
            $i = retornaPrimerPartidaGanada($nombreJugadorSeleccionado, $partidas);
   

            if($i == -1){
                echo "\n";
                echo "\n";
                echo "\n";
                echo "============================================================================\n";
                echo " NO TIENE PARTIDAS GANADAS \n";
                echo "============================================================================\n";
                echo "\n";
                echo "\n";
                echo "\n";
            }else{
                echo "\n";
                echo "\n";
                echo "\n";
                echo "============================================================================\n";
                echo "Partida WORDIX ".$i." : palabra ".strtoupper($partidas[$i]['palabraWordix'])."\n";
                echo "Jugador: ".$partidas[$i]['jugador']."\n";
                echo "Puntaje: ".$partidas[$i]['puntaje']." puntos \n";
                echo "Intento: Adivino la palabra en ".$partidas[$i]['intentos']." intentos \n";

                echo "============================================================================\n";
                echo "\n";
                echo "\n";
                echo "\n";






            }
            //...
            break;
        case 5:
            echo "Ingrese nombre del jugador: ";
            $nombreJugadorSeleccionado = trim(fgets(STDIN));
            $partidas = cargarPartidas();
            resumenJugador($partidas, $nombreJugadorSeleccionado);
            //Mostrar resumen de Jugador
            break;
        case 6:
            //MUESTRA LAS PARTIDAS ORDENADAS POR JUGADOR Y PALABRA
            $partidas = cargarPartidas();
            echo "\n";
            echo "\n";
            echo "\n";
            echo "======================= PARTIDAS ORDENADAS ALFABETICAMENTE =================\n";
            ordenaColeccion($partidas);
            echo "============================================================================\n";
            echo "\n";
            echo "\n";
            echo "\n";
            break;
        case 7:
            $coleccionPalabras = cargarColeccionPalabras();
            $palabraAAgregar = leerPalabra5Letras();
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
