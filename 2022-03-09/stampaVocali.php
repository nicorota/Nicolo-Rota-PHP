<?php

$parola = readline('Inserire una parola: ');
echo 'Il numero di vocali all\' interno della parola è: ';
echo preg_match_all('/a|e|i|o|u/', $parola ,$n);