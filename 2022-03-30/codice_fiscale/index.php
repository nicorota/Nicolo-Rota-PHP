<html>

<head>
    <style>
        input {
            display: block;
            margin-bottom: 8px;
        }

        p {
            margin: 0;
        }

        .radio-div>input {
            display: inline;
        }
    </style>
</head>

<body>
    <h1>Calcolatore codice fiscale</h1>
    <form action="calcolo.php" method="POST">
        <input type="text" name="nome" placeholder="Nome" />
        <input type="text" name="cognome" placeholder="Cognome" />
        <p>Sesso:</p>
        <div class="radio-div">
            <input type="radio" id="huey" name="sesso" value="M" checked>
            <label for="huey">M</label>
        </div>
        <div class="radio-div">
            <input type="radio" id="huey" name="sesso" value="F">
            <label for="huey">F</label>
        </div>
        <input type="text" name="data_di_nascita" placeholder="Data di nascita" />
        <input type="text" name="comune" placeholder="Comune" />
        <input type="submit" name="submit" value="INVIA" />
    </form>
</body>

</html>