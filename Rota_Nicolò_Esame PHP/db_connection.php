<?php

//_________________________CONNESSIONE_AL_DATABASE_________________________
$servername = "localhost";
$username = "root";
$password = "mysql";

// Apri una connessione
$GLOBALS['conn'] = new mysqli($servername, $username, $password, "cucina");

// Controlla per errori
if ($GLOBALS['conn']->connect_error) {
    die("Connessione fallita: " . $GLOBALS['conn']->connect_error);
}
