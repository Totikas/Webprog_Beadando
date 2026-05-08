<?php
if(isset($_POST['nev']) && isset($_POST['email']) && isset($_POST['szoveg'])) {
    $nev = trim($_POST['nev']);
    $email = trim($_POST['email']);
    $szoveg = trim($_POST['szoveg']);
    $login = isset($_SESSION['login']) ? $_SESSION['login'] : 'Vendég'; // [cite: 40]

    // Szerveroldali ellenőrzés
    if(empty($nev) || empty($email) || empty($szoveg)) {
        $uzenet = "Minden mezőt ki kell tölteni!";
    } else {
        try {
            $dbh = new PDO('mysql:host=localhost;dbname=mozi20', 'mozi20', 'asdasd');
            $sqlInsert = "insert into uzenetek(nev, email, uzenet, felhasznalo_login) 
                          values(:nev, :email, :szoveg, :login)";
            $stmt = $dbh->prepare($sqlInsert);
            $stmt->execute(array(':nev' => $nev, ':email' => $email, ':szoveg' => $szoveg, ':login' => $login));
            
            // Az adatok megjelenítése küldés után (ötödik oldal tartalom) [cite: 35]
            echo "<h3>Köszönjük az üzenetet!</h3>";
            echo "<p>Beküldött adatok:<br>Név: $nev<br>Email: $email<br>Üzenet: $szoveg</p>";
            exit;
        } catch (PDOException $e) {
            $uzenet = "Hiba az adatbázisba mentéskor.";
        }
    }
}
?>