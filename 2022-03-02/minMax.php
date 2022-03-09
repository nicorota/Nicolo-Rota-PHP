<?php

$numeri = [];
$min = $numeri[0];
$max = 0;

for($i = 0; $i<20; $i++){
    $numeri[$i] = readline("Inserisci il ".$i+1." numero");
    
    if($numeri[$i] < $min){
        $min = $numeri[$i];
    }
    if($numeri[$i] > $max){
        $max = $numeri[$i];
    }
}

echo "Il numero più grande è: ".$max"\nIl numero più piccolo è: ".$min;