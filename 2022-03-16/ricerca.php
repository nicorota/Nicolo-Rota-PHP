<?php

$lunghezza = readline("Inserisci la lunghezza del vettore: ");
$array = [];

for ($i = 0; $i < $lunghezza; $i++) {
    $array[$i] = readline("Inserisci un numero: ");
}

$inizio = 0;

sort($array);
var_dump($array);
$n = readline("Inserisci numero da cercare: ");
$s = ricerca($array, $n, $lunghezza, $inizio);

if ($s==true) {
    echo 'Il numero è stato trovato';
} else {
    echo 'Il numero non è stato trovato';
}

function ricerca($array, $n, $lunghezza, $inizio) {

    if ($n < $array[0] || $n > $array[$lunghezza -1]) {
        return false;
    }

    $m = ($inizio + $lunghezza)/2;

    if ($m < $inizio || $lunghezza < 0) {
        return false;

    } elseif ($n < $array[$m]) {
        return ricerca($array, $n, $m, $inizio);

    } elseif ($n > $array[$m]) {
        return ricerca($array, $n, $lunghezza, $m);

    } else {
        return true;
    }
}