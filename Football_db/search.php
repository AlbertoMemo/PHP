<?php
$conn = mysqli_connect("localhost", "root", "", "football_db");

if(false === $conn){
    exit("Errore: impossibile stabilire una connessione " . mysqli_connect_error());
}


$sql = "SELECT * FROM footballers";
$result = mysqli_query($conn, $sql);

if($result === false) {
    exit("Errore: impossibile eseguire la query. " . mysqli_error($conn));
}
mysqli_close($conn);

?>

<form action="search.php" method="POST">
    <br><label for="nome">Nome: <input type="text" name="nome"></label><br>
    <label for="attributo">Scegli un'opzione: <select id="attributo" name="attributo">
    <option value="opzione2" selected>Nome</option>
    <option value="opzione1">Cognome</option>
    <option value="opzione3">Squadra</option>
    </select></label>
    <br><input type="submit" name='submit' value='Inserisci'>
</form>