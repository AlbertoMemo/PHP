<?php
print_r($_GET);

$punteggio = 0;
if (isset($_GET['punteggio'])){
    $punteggio = $_GET['punteggio'];
}

$punteggio = $punteggio + 10;
// Mappa statica con il giocatore (P) e l'uscita (E)
$mappa = [
    [ 'P', '.', '#', '.', '.', '~', 'T', '.', '.', '.' ],
    [ '~', '.', '.', '#', '.', '.', 'T', 'T', '.', '.' ],
    [ '#', '~', '.', '.', '.', 'T', '.', '.', '.', '.' ],
    [ 'T', '.', '.', '.', '.', '.', '.', '.', '.', '.' ],
    [ '.', '.', '.', '.', '~', '#', '#', '.', '.', 'E' ], // Uscita alla posizione (4, 9)
];

$mappaOriginale = $mappa;
$mappaOriginale[0][0] = '.';

if (isset($_GET['est'])){
    $mappa = muoviEst($mappa, $mappaOriginale);
}

if (isset($_GET['sud'])){
    $mappa = muoviSud($mappa, $mappaOriginale);
}

// Funzione per stampare la mappa
function stampaMappa($mappa) {
    echo "<pre>"; // Per formattazione leggibile
    foreach ($mappa as $riga) {
        echo implode(" ", $riga) . "\n";
    }
    echo "</pre>";
}

function muoviEst($mappa, $mappaOriginale) {
    for ($i = 0; $i < count($mappa); $i++) {
        for ($j = 0; $j < count($mappa[$i]); $j++) {

            if ($mappa[$i][$j] === 'P') {
                if ($j + 1 >= count($mappa[$i])) {
                    return $mappa;
                }

                $mappa = $mappaOriginale;
                $mappa[$i][$j + 1] = 'P';
                
                return $mappa;
            }
        }
    }
    return $mappa;
}

function muoviSud($mappa) {
    for ($i = 0; $i < count($mappa); $i++) {
        for ($j = 0; $j < count($mappa[$i]); $j++) {

            if ($mappa[$i][$j] === 'P') {
                if ($i + 1 >= count($mappa)) {
                    return $mappa;
                }
                if ($mappa[$i + 1][$j] === '#') {
                    return $mappa;
                }
                $mappa[$i][$j] = '.';
                $mappa[$i + 1][$j] = 'P';

                return $mappa;
            }
        }
    }
    return $mappa;
}



stampaMappa($mappa);
echo "Punteggio ".$punteggio;


?>

<form action="MudTestuale.php" method="GET">
    <input type="hidden" id="punteggio" name="punteggio" value="<?php echo $punteggio;?>" />
    <input type="submit" name="nord" id="nord" value="nord"/>
    <input type="submit" name="sud" id="sud" value="sud" />
    <input type="submit" name="ovest" id="ovest" value="ovest"/>
    <input type="submit" name="est" id="est" value="est"/>
</form>