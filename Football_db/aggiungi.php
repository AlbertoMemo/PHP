<?php
$conn = mysqli_connect("localhost", "root", "", "football_db");

if(false === $conn){
    exit("Errore: impossibile stabilire una connessione " . mysqli_connect_error());
}

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $squadra = $_POST['squadra'];
    $numeroMaglia = $_POST['numero_maglia'];

    $sql = "INSERT INTO footballers (id, nome, cognome, squadra, numero_maglia) 
        VALUES ('$id', '$nome', '$cognome', '$squadra', '$numeroMaglia')";
    $result = mysqli_query($conn, $sql);
    
    if($result === false) {
        exit("Errore: impossibile eseguire la query. " . mysqli_error($conn));
    }
    
    
    
    mysqli_close($conn);
}



?>

<form action="aggiungi.php" method="POST">
    <h1>Footballers</h1>
    <label for="id">ID: <input type="number" name="id"></label><br>
    <br><label for="nome">Nome: <input type="text" name="nome"></label><br>
    <br><label for="cognome">Cognome: <input type="text" name="cognome"></label><br>
    <br><label for="squadra">Squadra: <input type="text" name="squadra"></label><br>
    <br><label for="numero_maglia">Numero di maglia: <input type="number" name="numero_maglia"></label><br>
    <br><input type="submit" name='submit' value='Inserisci'>
</form>