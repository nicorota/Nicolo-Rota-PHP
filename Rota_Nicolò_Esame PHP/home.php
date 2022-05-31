<?php

//Rota Nicolò

session_start();
if (!isset($_SESSION['user'])) {
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/home.css">
    <title>Gestore Ricette</title>
</head>

<body>

    <nav class="navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Gestore Ricette</a>

            <?php
            if ($_SESSION["username"] == '') {
                echo '<h6 style="color:white;">Non hai effettuato il login, Benvenuto guest </h6>';
            } else {
                echo '<div class="container_logout"><h6 style="color:white;">Benvenuto/a ' . $_SESSION["username"] . '</h6>';
                echo '<a class="logout" href="logout.php">Log Out</a></div>';
            }
            ?>
        </div>
    </nav>

    <form class="container_buttons" method="post">
        <button class="button_recipe" type="submit" name="addRicetta">Aggiungi una ricetta</button>
        <button class="button_recipe" type="submit" name="removeRicetta">Rimuovi una ricetta</button>
        <button class="button_recipe" type="submit" name="modificaRicetta">Modifica una ricetta</button>
        <button class="button_recipe" type="submit" name="calculator">Calcolatore Quantità</button>

    </form>

    <table>

        <?php

        include 'db_connection.php';

        $getricette = "SELECT * FROM ricette";

        $risultato = $GLOBALS['conn']->query($getricette);

        if ($risultato->num_rows > 0) {

            while ($riga = $risultato->fetch_assoc()) {
                echo ("<div class='container_recipe''>");
                echo ("<br>");
                echo ("Nome ricetta: " . $riga["Nome"]);
                echo ("<br>");
                echo ("Difficoltà: " . $riga["Difficolta"]);
                echo ("<br>");
                echo ("Descrizione: " . $riga["Descrizione"]);
                echo ("<br>");
                echo ("Nome ingrediente: " . $riga["Nome_ingrediente"]);
                echo ("<br>");
                echo ("Quantità : " . $riga["Quantita_ingrediente"] . $riga["Unita_m_ingrediente"]);
                echo ("<br>");
                echo ("</div>");
            }
        } else {
            echo "Non esistono ricette";
        }

        //Aggiungere una ricetta

        if (array_key_exists('addRicetta', $_POST)) {
            echo "<form  method='post'>

                    <div class='container_action_recipe'>
                    <br><label for='nome'><b>Nome</b></label><br>
                    <input type='text' placeholder='Inserire nome' name='nome' style='width:23rem;' required><br><br>
                    <label for='difficolta'><b>Difficoltà</b></label><br>
                    <input type='text' placeholder='Inserire difficoltà' name='difficolta' style='width:23rem;' required><br><br>
                    <label for='descrizione'><b>Descrizione</b></label><br>
                    <input type='text' placeholder='Inserire descrizione'' name='descrizione' style='width:23rem;height:3rem;' required><br><br>
                    <label for='nomeingrediente'><b>Ingrediente utilizzato</b></label><br>
                    <input type='text' placeholder='Inserire nome ingrediente' name='ingrediente' style='width:23rem;' required><br><br>
                    <label for='quantitaingrediente'><b>Quantità ingrediente</b></label><br>
                    <input type='text' placeholder='Inserire quantità ingrediente'' name='quantitaingrediente' style='width:23rem;' required><br><br>
                    <label for='unitamingrediente'><b>Unità Di Misura Ingrediente (es n,gr,mg)</b></label><br>
                    <input type='text' placeholder='Inserire unita max 2 caratteri'' name='unitamingrediente' style='width:23rem;' required><br><br>
                    <button type='submit' name='addR'>Aggiungi</button><br><br>
                    </div>
                    
                    </form>
                    ";
        }
        if (array_key_exists('addR', $_POST)) {

            if (isset($_POST['nome'])) {
                $name = htmlentities($_POST['nome']);
            }

            if (isset($_POST['difficolta'])) {
                $difficolta = htmlentities($_POST['difficolta']);
            }
            if (isset($_POST['descrizione'])) {
                $descrizione = htmlentities($_POST['descrizione']);
            }

            if (isset($_POST['ingrediente'])) {
                $ingrediente = htmlentities($_POST['ingrediente']);
            }

            if (isset($_POST['quantitaingrediente'])) {
                $qingrediente = htmlentities($_POST['quantitaingrediente']);
            }

            if (isset($_POST['unitamingrediente'])) {
                $uingrediente = htmlentities($_POST['unitamingrediente']);
            }

            $sql = "INSERT INTO ricette (nome, difficolta, descrizione, nome_ingrediente, quantita_ingrediente, unita_m_ingrediente) VALUES ('$name', '$difficolta', '$descrizione', '$ingrediente', '$qingrediente', '$uingrediente')";

            if ($conn->query($sql) === TRUE) {
                echo "Ricetta aggiunta con successo";
                header("Refresh:0");
            } else {
                echo "Errore nell'inserimento";
            }
        }


        //Rimozione di una ricetta tramite il suo nome


        if (array_key_exists('removeRicetta', $_POST)) {
            echo "<form method='post'>

                    <div class='container_action_recipe'>
                    <br><label for='nome'><b>Nome ricetta da eliminare</b></label><br>
                    <input type='text' placeholder='Inserire il nome' name='ricettaDaEliminare' style='width:23rem;' required><br><br>
                    <button type='submit' name='removeR'>Rimuovi ricetta</button><br><br>
                    </div>

                    </form>
                    ";
        }

        if (array_key_exists('removeR', $_POST)) {

            if (isset($_POST['ricettaDaEliminare'])) {
                $ricettaDaEliminare = htmlentities($_POST['ricettaDaEliminare']);
            }

            $sql = "DELETE FROM ricette WHERE nome = '$ricettaDaEliminare'";

            if ($conn->query($sql) === TRUE) {
                echo "Ricetta Eliminata";
                header("Refresh:0");
            } else {
                echo "Errore, ricetta non trovata";
            }
        }

        if (array_key_exists('calculator', $_POST)) {
            header("Location: calculator.php");
        }

        //Modifica di una ricetta tramite il suo nome

        if (array_key_exists('modificaRicetta', $_POST)) {
            echo "<form method='post'>

                    <div class='container_action_recipe'>
                    <br><label for='nome'><b>Nome Ricetta da modificare</b></label><br>
                    <input type='text' placeholder='Inserire nome' name='nome' style='width:23rem;' required><br><br>
                    <label for='difficolta'><b>Difficoltà'</b></label><br>
                    <input type='text' placeholder='Inserire difficoltà' name='difficolta' style='width:23rem;' required><br><br>
                    <label for='descrizione'><b>Descrizione</b></label><br>
                    <input type='text' placeholder='Inserire descrizione'' name='descrizione' style='width:23rem;height:3rem;' required><br><br>
                    <label for='nomeingrediente'><b>Ingrediente utilizzato</b></label><br>
                    <input type='text' placeholder='Inserire nome ingrediente' name='ingrediente' style='width:23rem;' required><br><br>
                    <label for='quantitaingrediente'><b>Quantità ingrediente</b></label><br>
                    <input type='text' placeholder='Inserire quantità ingrediente'' name='quantitaingrediente' style='width:23rem;' required><br><br>
                    <label for='unitamingrediente'><b>Unità Di Misura Ingrediente (es n,gr,mg)</b></label><br>
                    <input type='text' placeholder='Inserire unita max 2 caratteri'' name='unitamingrediente' style='width:23rem;' required><br><br>
                    <button type='submit' name='addR'>Aggiungi</button><br><br>
                    </div>
                    
                    </form>
                    ";
        }

        if (array_key_exists('modificaR', $_POST)) {

            if (isset($_POST['nome'])) {
                $name = htmlentities($_POST['nome']);
            }


            if (isset($_POST['difficolta'])) {
                $difficolta = htmlentities($_POST['difficolta']);
            }
            if (isset($_POST['descrizione'])) {
                $descrizione = htmlentities($_POST['descrizione']);
            }

            if (isset($_POST['ingrediente'])) {
                $ingrediente = htmlentities($_POST['ingrediente']);
            }

            if (isset($_POST['quantitaingrediente'])) {
                $qingrediente = htmlentities($_POST['quantitaingrediente']);
            }

            if (isset($_POST['unitamingrediente'])) {
                $uingrediente = htmlentities($_POST['unitamingrediente']);
            }

            $sql = "UPDATE ricette SET nome='$name', difficolta='$difficolta', descrizione='$descrizione', nome_ingrediente='$ingrediente', quantita_ingrediente='$qingrediente', unita_m_ingrediente='$uingrediente' WHERE nome='$name'";

            if ($conn->query($sql) === TRUE) {
                echo "Ricetta modificata con successo";
                header("Refresh:0");
            } else {
                echo "Errore nell'inserimento";
            }
        }
        ?>

    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>