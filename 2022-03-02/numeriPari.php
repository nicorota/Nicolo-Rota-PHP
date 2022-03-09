<?php

$quantita=readline("Quanti numeri vuoi inserire? ");
$array=[];

for($i=1; $i<$quantita; $i++){
    $array[$i]=readline("Posizione " . $i .": ");

}

echo "I numeri nelle posizioni pari sono: ";

for($i=1; $i<$quantita; $i++){

    if($i%2==0){
        echo $array[$i]. ", ";
    }
}