<?php

function calcolaCodiceFiscale(string $nome, string $cognome, string $dataDiNascita, string $sesso, string $comuneNascita): string
{
    $codiceFiscale = calcolaCodiceCognomeNome($cognome, false);
    $codiceFiscale .= calcolaCodiceCognomeNome($nome, true);
    $codiceFiscale .= calcolaAnnoDiNascita($dataDiNascita);
    $codiceFiscale .= calcolaMeseDiNascita($dataDiNascita);
    $codiceFiscale .= calcolaGiornoDiNascita($dataDiNascita, $sesso);
    $codiceFiscale .= calcolaCodiceCatastale($comuneNascita);
    $codiceFiscale .= calcolaCodiceControllo($codiceFiscale);
    return $codiceFiscale;
}

function calcolaCodiceCognomeNome(string $stringa, bool $isNome): string
{
    $consonanti = estraiConsonanti($stringa);
    $vocali = estraiVocali($stringa);
    $consonantiIdx = 0;
    $vocaliIdx = 0;

    $codice = '';

    while (strlen($codice) < 3) {
        if ($consonantiIdx < strlen($consonanti)) {
            $codice .= $consonanti[$consonantiIdx];
            $consonantiIdx++;

            if ($isNome && $consonantiIdx === 1 && strlen($consonanti) > 3) {
                $consonantiIdx++;
            }

            continue;
        }

        if ($vocaliIdx < strlen($vocali)) {
            $codice .= $vocali[$vocaliIdx];
            $vocaliIdx++;
            continue;
        }

        $codice .= 'X';
    }

    return $codice;
}

function calcolaAnnoDiNascita(string $data)
{
    $data = str_replace('/', '-', $data);
    return sprintf("%02d", date('y', strtotime($data)));    // 5 ==> 05
}

function calcolaMeseDiNascita(string $data)
{
    $data = str_replace('/', '-', $data);
    $mese = intval(date('m', strtotime($data)));
    return CARATTERE_MESE[intval($mese) - 1];
}

function calcolaGiornoDiNascita(string $data, string $sesso)
{
    $data = str_replace('/', '-', $data);
    $giorno = intval(date('d', strtotime($data)));

    if (strtoupper($sesso) === 'F') {
        $giorno += 40;
    }

    return sprintf("%02d", $giorno);
}

function calcolaCodiceCatastale(string $nomeComune): string
{
    $listaComuni = json_decode(file_get_contents('comuni.json'), true);
    $codiceComune = null;

    foreach ($listaComuni as $comune) {
        if (trim(strtolower($nomeComune)) === strtolower($comune['nome'])) {
            $codiceComune = $comune['codiceCatastale'];
        }
    }

    if (!$codiceComune) {
        throw new Exception('Il comune di nascita non è valido');
    }

    return $codiceComune;
}

function calcolaCodiceControllo(string $codiceFiscale): string
{
    $somma = 0;

    for ($i = 0; $i < strlen($codiceFiscale); $i++) {
        $carattere = $codiceFiscale[$i];
        if ($i % 2 === 0) {
            //$somma += VALORI_CARATTERI_PARI[$carattere];
            $somma += VALORI_CARATTERI_DISPARI[$carattere];
        } else {
            //$somma += VALORI_CARATTERI_DISPARI[$carattere];
            $somma += VALORI_CARATTERI_PARI[$carattere];
        }
    }

    $resto = $somma % 26;

    return CARATTERI_RESTO[$resto];
}

function isCarattereAlfabeto(string $carattere): bool
{
    return strtoupper($carattere) >= 'A' && strtoupper($carattere) <= 'Z';
}

function isVocale(string $carattere): bool
{
    return in_array(strtoupper($carattere), VOCALI);
}

function isConsonante(string $carattere): bool
{
    return isCarattereAlfabeto($carattere) && !in_array(strtoupper($carattere), VOCALI);
}

function eliminaCaratteriSpeciali(string $stringa): string
{
    $lunghezza = strlen($stringa);
    $nuovaStringa = '';

    for ($i = 0; $i < $lunghezza; $i++) {
        if (isCarattereAlfabeto($stringa[$i])) {
            $nuovaStringa .= $stringa[$i];
        }
    }

    return $nuovaStringa;
}

function contaVocali(string $stringa): int
{
    $stringa = strtoupper(eliminaCaratteriSpeciali($stringa));
    $lunghezza = strlen($stringa);
    $contatore = 0;
    for ($i = 0; $i < $lunghezza; $i++) {
        if (in_array($stringa[$i], VOCALI)) {
            $contatore++;
        }
    }
}

function contaConsontanti(string $stringa): int
{
    $stringa = strtoupper(eliminaCaratteriSpeciali($stringa));
    return strlen($stringa) - contaVocali($stringa);
}

function estraiConsonanti(string $stringa): string
{
    $stringa = strtoupper($stringa);
    $lunghezza = strlen($stringa);

    $risultato = '';

    for ($i = 0; $i < $lunghezza; $i++) {
        if (isConsonante($stringa[$i])) {
            $risultato .= $stringa[$i];
        }
    }

    return $risultato;
}


function estraiVocali(string $stringa): string
{
    $stringa = strtoupper($stringa);
    $lunghezza = strlen($stringa);

    $risultato = '';

    for ($i = 0; $i < $lunghezza; $i++) {
        if (isVocale($stringa[$i])) {
            $risultato .= $stringa[$i];
        }
    }

    return $risultato;
}
