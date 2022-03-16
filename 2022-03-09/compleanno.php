<?php

$persone = [];

while (true) {
    $nome = readline('Inserisci il nome della persona: ');
    $dataDiNascita = readline('Inserisci la data di nascita: ');

    $nome = ucwords(strtolower($nome));

    $dataDiNascita = str_replace('/', '-', $dataDiNascita);
    $dataDiNascita = strtotime($dataDiNascita);
    $dataDiNascita = date('Y-m-d', $dataDiNascita);

    $persone[] = [
        'nome' => $nome,
        'data_di_nascita' => $dataDiNascita
    ];

    $continua = readline('Vuoi inserire un\'altra persona? ');

    if ($continua === 'No' || $continua === '0' || $continua === 'false') {
        break;
    }
}

$prossimoCompleannoGlobale = null;
$prossimaPersonaGlobale = null;
$prossimaEtaGlobale = null;

foreach ($persone as $persona) {
    $dataDiNascita = strtotime($persona['data_di_nascita']);

    $giornoNascita = intval(date('d', $dataDiNascita));
    $meseNascita = intval(date('m', $dataDiNascita));
    $annoNascita = intval(date('Y', $dataDiNascita));

    $annoCorrente = intval(date('Y'));

    $compleannoAnnoCorrente = mktime(0, 0, 0, $meseNascita, $giornoNascita, $annoCorrente);
    $compleannoAnnoProssimo = strtotime('+1 year', $compleannoAnnoCorrente);

    if ($compleannoAnnoCorrente < time()) {
        $prossimoCompleanno = $compleannoAnnoProssimo;
        $eta = $annoCorrente - $annoNascita + 1;
    } else {
        $prossimoCompleanno = $compleannoAnnoCorrente;
        $eta = $annoCorrente - $annoNascita;
    }

    if ($prossimoCompleannoGlobale === null || $prossimoCompleanno < $prossimoCompleannoGlobale) {
        $prossimoCompleannoGlobale = $prossimoCompleanno;
        $prossimaPersonaGlobale = $persona['nome'];
        $prossimaEtaGlobale = $eta;
    }
}

echo 'Il prossimo compleanno sarà di ' . $prossimaPersonaGlobale . ': ';
echo 'il giorno ' . date('d/m/Y', $prossimoCompleannoGlobale) . ' ';
echo 'compirà ' . $prossimaEtaGlobale . ' anni.' . PHP_EOL;

$jsonEncoded = json_encode($persone, JSON_PRETTY_PRINT);
file_put_contents('date_di_nascita.json', $jsonEncoded);