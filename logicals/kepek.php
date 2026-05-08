<?php
$kepek = array();
try {
    $dbh = new PDO('mysql:host=localhost;dbname=mozi20', 'mozi20', 'asdasd',
                    array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

    // Feltöltés kezelése
    if(isset($_FILES['uj_kep']) && isset($_SESSION['login'])) {
        $mappa = 'images/';
        $fajlnev = time().'_'.basename($_FILES['uj_kep']['name']);
        $cel_fajl = $mappa . $fajlnev;
        
        if(move_uploaded_file($_FILES['uj_kep']['tmp_name'], $cel_fajl)) {
            $sqlInsert = "insert into kepek(id, fajlnev, feltolto_login) values(0, :fajlnev, :login)";
            $stmt = $dbh->prepare($sqlInsert);
            $stmt->execute(array(':fajlnev' => $fajlnev, ':login' => $_SESSION['login']));
            $uzenet = "Sikeres feltöltés!";
        } else {
            $uzenet = "Hiba történt a feltöltés során.";
        }
    }

    // Képek lekérése a megjelenítéshez
    $sqlSelect = "select fajlnev, feltolto_login, feltoltes_ideje from kepek order by feltoltes_ideje desc";
    $res = $dbh->query($sqlSelect);
    $kepek = $res->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    $uzenet = "Hiba: " . $e->getMessage();
}
?>