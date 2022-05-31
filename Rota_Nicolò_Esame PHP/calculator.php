<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/calculator.css">
    <title>Calcolatore Ricette</title>
</head>

<body>
    <nav class="navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Calcolatore Ricette</a>
            <a class="logout" href="logout.php">Log Out</a>;
        </div>
    </nav>

    <form method="post" style="margin-left: 1rem;">
        <div class="container" style="margin-top:1rem;">
            <h2>Inserire il nome della ricetta da calcolare</h2>

            <div class="container_input_buttons">
                <div class="container_input">
                    <label for="cercaRicetta"><b>Nome Ricetta</b></label>
                    <input type="text" placeholder="Inserire ricetta" name="nomeRicetta" required>

                    <label for="porzioni"><b>Per quante persone vuoi cucinare?</b></label>
                    <input type="text" placeholder="Numero di persone" name="numeroPersone" required>
                </div>
                <div class="container_buttons">
                    <button class="calculate" type="submit" name="calcola">Calcola quantità</button>
                    <button class="home" type="submit"><a href="home.php">Torna alla home</a></button>
                </div>
            </div>

        </div>
        <table>
            <?php

            include 'db_connection.php';

            if (array_key_exists('calcola', $_POST)) {

                if (isset($_POST['nomeRicetta'])) {
                    $name = htmlentities($_POST['nomeRicetta']);
                }

                if (isset($_POST['numeroPersone'])) {
                    $npersone = htmlentities($_POST['numeroPersone']);
                }

                $sql = "SELECT quantita_ingrediente,unita_m_ingrediente FROM ricette WHERE nome = '$name'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='container'>  Devi cucinare " . $row["quantita_ingrediente"] * $npersone . $row["unita_m_ingrediente"] . " di questo alimento per soddisfare" . " $npersone persone  </div>";
                    }
                } else {
                    echo "<div class='container'> Nessuna ricetta trovata, prova a ricercare di nuovo </div>";
                }
            }


            ?>
        </table>
</body>

</html>