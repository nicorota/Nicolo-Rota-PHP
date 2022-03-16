<?php

$stringa = readline('Inserisci una stringa: ');
$lunghezza = strlen($stringa);

$palindroma = true;

for ($i = 0; $i < $lunghezza / 2; $i++) {
    
    if ($stringa[$i] !== $stringa[$lunghezza - $i - 1]) {
        $palindroma = false;
        break;
    }
}

if ($palindroma) {
    echo 'La stringa inserita è palindroma' . PHP_EOL;

} else {
    echo 'La striga inserita non è palindroma' . PHP_EOL;
}