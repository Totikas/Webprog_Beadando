<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=mozi20', 'mozi20', 'asdasd',
                    array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

    // TÖRLÉS (Delete)
    if (isset($_GET['delete'])) {
        $sql = "DELETE FROM film WHERE fkod = :fkod";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':fkod' => $_GET['delete']));
        header("Location: crud"); // Frissítés a törlés után
    }

    // HOZZÁADÁS (Create)
    if (isset($_POST['add_film'])) {
        $sql = "INSERT INTO film (fkod, filmcim, szarmazas, mufaj, hossz) 
                VALUES (:fkod, :filmcim, :szarmazas, :mufaj, :hossz)";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(
            ':fkod' => $_POST['fkod'],
            ':filmcim' => $_POST['filmcim'],
            ':szarmazas' => $_POST['szarmazas'],
            ':mufaj' => $_POST['mufaj'],
            ':hossz' => $_POST['hossz']
        ));
    }

    // MÓDOSÍTÁS (Update)
    if (isset($_POST['update_film'])) {
        $sql = "UPDATE film SET filmcim = :filmcim, szarmazas = :szarmazas, 
                mufaj = :mufaj, hossz = :hossz WHERE fkod = :fkod";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(
            ':filmcim' => $_POST['filmcim'],
            ':szarmazas' => $_POST['szarmazas'],
            ':mufaj' => $_POST['mufaj'],
            ':hossz' => $_POST['hossz'],
            ':fkod' => $_POST['fkod']
        ));
    }

    // LISTÁZÁS (Read)
    $sql = "SELECT * FROM film ORDER BY fkod DESC LIMIT 20"; // Csak az utolsó 20-at listázzuk a sebesség miatt
    $res = $dbh->query($sql);
    $filmek = $res->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    $error = "Adatbázis hiba: " . $e->getMessage();
}
?>