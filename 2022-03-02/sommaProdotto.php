<?php

$somma = 0;
$prodotto = 1;
$array = [];

$quantita = readline("Quanti numeri vuoi inserire?: ");

for ($i = 0; $i < $quantita; $i++) {
    $array[$i] = readline("il numero " . ($i + 1) ."è: ");

    $somma += $array[$i];
    $prodotto *= $array[$i];
}
echo $somma . PHP_EOL;
echo $prodotto . PHP_EOL;