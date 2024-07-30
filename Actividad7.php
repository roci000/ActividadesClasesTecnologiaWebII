<?php
function contarPalabras($texto) {

    $palabras = explode(" ", $texto);
    $cantidadPalabras = count($palabras);
    
    return $cantidadPalabras;
}

$ejemplo = "Patricia soledad zarate";
echo "Número de palabras: " . contarPalabras($ejemplo);
echo "<br>";

function CoVocales($palabra) {
    $palabra = strtolower($palabra);
    $contadorVocales = 0;
    $vocales = ['a', 'e', 'i', 'o', 'u'];
    
    for ($i = 0; $i < strlen($palabra); $i++) {
        if (in_array($palabra[$i], $vocales)) {
            $contadorVocales++;
        }
    }
    
    return $contadorVocales;
}

$palabraE = "Hola";
$resultado = CoVocales($palabraE);
echo "Número de vocales en '$palabraE': " . $resultado;
echo "<br>";

function contarFrecuenciaLetra($palabra, $letra) {
    $palabra = strtolower($palabra);
    $letra = strtolower($letra);

    $contadorLetra = 0;
    
    for ($i = 0; $i < strlen($palabra); $i++) {
        if ($palabra[$i] === $letra) {
            $contadorLetra++;
        }
    }
    //strchr
    
    return $contadorLetra;
}

$palabraEjemplo = "programación";
$letraEjemplo = "a";
$resultado = contarFrecuenciaLetra($palabraEjemplo, $letraEjemplo);
echo "La letra '$letraEjemplo' aparece $resultado";
?>
