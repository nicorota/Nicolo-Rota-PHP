<?php

$numeri = [];

$n = readline("Quanti numeri si vuole inserire?");

for($i = 0; $i < $n; $i++){
    $numeri[$i] = readline("Inserisci il ".$i+1." numero");
    
    if($i%2 == 0){
        echo "numero in posizione ".$i.": ".$numeri[i];
    }
}