<?php

$n1 = readLine('Inserisci il primo numero: ');
$operazione = readLine('Scegli l\'operazione tra: Somma - Sottrazione - Moltiplicazione - Divisione - Fattoriale ');
$n2 = readLine('Inserisci il secondo numero: ');


if ($operazione === 'Somma') {
    
    $somma = somma($n1,$n2);
    echo "Il risultato è: $somma";
    
} elseif ($operazione === 'Sottrazione') {

    $sottrazione = sottrazione($n1,$n2);
    echo "Il risultato è: $sottrazione";

} elseif ($operazione === 'Moltiplicazione') {
   
    $moltiplicazione = moltiplicazione($n1,$n2);
    echo "Il risultato è: $moltiplicazione" ;

} elseif ($operazione === 'Divisione') {
 
    $divisione = divisione($n1, $n2);
    echo "Il risultato è: ";
    print_r($divisione[0]); 

    echo " Il resto è: ";
    print_r($divisione[1]) ;
    
} elseif ($operazione === 'Fattoriale') {
  
    $fattoriale = fattorialeRicorsivo($n1);
    echo "Il risultato è: $fattoriale";

} else {
    echo 'L\' operazione inserita non è valida';
}

function somma(int $n1, int $n2): int {
    return $n1 + $n2;
}

function sottrazione(int $n1, int $n2): int {
    return $n1 - $n2;
}

function moltiplicazione(int $n, int $s): int {
    return $n * $s;
}

function divisione(int $n, int $s): array {
    if (intval($s) === 0) {
        echo "Non si può dividere per 0";
    } else {
        $risultato = 0;

        while ($n >= $s) {
            $risultato++;
            $n -= $s;
        }
    } 
    $array = array($risultato, $n);
    return $array;
} 

function fattorialeRicorsivo(int $n): int {
    if ($n === 0) {
        return 1;
    }

    return fattorialeRicorsivo($n - 1) * $n;
}