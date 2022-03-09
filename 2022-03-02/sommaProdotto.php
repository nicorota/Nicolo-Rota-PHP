<?php

$numeri = [];

$n = readline("Quanti numeri si vuole inserire?");
$somma = 0;
$prodotto = 1;

for($i = 0; $i < $n; $i++){
    $numeri[$i] = readline("Inserisci il ".$i+1." numero");
    $somma += $numeri[$i];
    $prodotto *= $numeri[$i];
}

echo "la somma dei ".$n." numeri è: ".$somma." e il prodotto è: ".$prodotto;