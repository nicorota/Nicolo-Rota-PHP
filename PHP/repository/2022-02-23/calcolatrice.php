<?php

$n1 = readLine('Inserisci il primo numero: ');
$operazione = readLine('Scegli l\'operazione tra: Somma - Sottrazione - Moltiplicazione - Divisione - Fattoriale ');
$n2 = readLine('Inserisci il secondo numero: ');

var_dump($n1);
var_dump($n2);
var_dump($operazione);

if ($operazione === 'Somma') {
    echo $n1 + $n2;
} elseif ($operazione === 'Sottrazione') {
    echo $n1 - $n2;
} elseif ($operazione === 'Moltiplicazione') {
    for ($i = 1; $i < $n2; $i++) {
        $n1 += $n1;
    }
    echo  $n1;
} elseif ($operazione === 'Divisione') {
    if (intval($n2) === 0) {
        echo "Non si può dividere per 0";
    } else {
        $risultato = 0;

        while ($n1 >= $n2) {
            $risultato++;
            $n1 -= $n2;
        }

        echo "Il risultato è: $risultato\nIl resto è: $n1" . PHP_EOL;
    }
} elseif ($operazione === 'Fattoriale') {
    $risultato = 1;

    for ($i = 2; $i <= $n1; $i++) {
        $risultato *= $i;
    }
    echo "Il numero fattoriale è: $risultato" . PHP_EOL;
} else {
    echo 'L\' operazione inserita non è valida';
}

/*
$n = 5;

for ($i = 0; $i <$n; $i++) {
    echo $i . PHP_EOL;
}
*/