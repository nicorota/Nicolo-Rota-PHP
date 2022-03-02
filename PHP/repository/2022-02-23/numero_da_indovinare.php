<?php

$guessNum = random_int(1, 100);
$input = 0;

while ($input !== $guessNum) {
    $input = intval(readline('Inserisci un numero '));

    if ($input !== $numeroSegreto) {
        echo 'Il numero inserito è più grande del numero da indovinare';

    } elseif ($input < $numeroSegreto) {
        echo 'Il numero inserito è più piccolo del numero da indovinare';
    }
}

echo 'Hai indovinato il numero!';