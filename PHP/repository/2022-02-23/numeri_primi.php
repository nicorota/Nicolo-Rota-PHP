<?php

$numero = readline('Inserisci un numero: ');

for ($i = 2; $i < $numero; $i++ ) {
    if ($numero %  $i === 0) {
        echo 'Il numero non è primo' . PHP_EOL;
        exit;
    }
}

echo 'Il numero è primo' . PHP_EOL;