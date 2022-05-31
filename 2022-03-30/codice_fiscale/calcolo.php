<?php

session_start();

require_once 'costanti.php';
require_once 'funzioni.php';

$codiceFiscale = calcolaCodiceFiscale($_POST['nome'], $_POST['cognome'], $_POST['data_di_nascita'], $_POST['sesso'], $_POST['comune']);

$_SESSION['codice'] = $codiceFiscale;
// setcookie('codice', $codiceFiscale);

?>

<h2>
    Il tuo codice fiscale è:
    <?php echo $codiceFiscale; ?>
</h2>

<a href="../">Torna alla home</a>