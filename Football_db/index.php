<?php
$conn = mysqli_connect("localhost", "root", "", "football_db");

if($conn === false){
    exit("Errore: impossibile stabilire una connessione " . mysqli_connect_error());
}


$sql = "SELECT * FROM footballers";

$result = mysqli_query($conn, $sql);

if($result === false) {
    exit("Errore: impossibile eseguire la query. " . mysqli_error($conn));
}

if (mysqli_num_rows($result) > 0) {

    echo "<table border='1'>";
    echo "<tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Cognome</th>
            <th>Squadra</th>
            <th>Numero di maglia</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nome"] . "</td>";
        echo "<td>" . $row["cognome"] . "</td>";
        echo "<td>" . $row["squadra"] . "</td>";
        echo "<td>" . $row["numero_maglia"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";

} else {
    echo "Nessun giocatore presente nel database.";
}


mysqli_close($conn);

?>

<!--
<form action="index.php" method="POST">
    <h1>Footballers</h1>
    <label for="nome">Nome: <input type="text" name="nome"></label><br>
    <br><label for="cognome">Cognome: <input type="text" name="cognome"></label><br>
    <br><label for="squadra">Squadra: <input type="text" name="squadra"></label><br>
    <br><label for="numero_maglia">Numero di maglia: <input type="numero_maglia" name="numero_maglia"></label><br>
</form>
-->
