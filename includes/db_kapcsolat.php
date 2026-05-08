<?php

$host = 'localhost';
$db   = 'mozi20'; 
$user = 'mozi20';
$pass = 'asdasd';
$chrs = 'utf8mb4';

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $dbh = new PDO("mysql:host=$host;dbname=$db;charset=$chrs", $user, $pass, $options);
} catch (PDOException $e) {
    // Itt nem állítjuk meg az oldalt (nincs die), csak kiírjuk a hibát egy változóba
    $kapcsolati_hiba = "Adatbázis hiba: " . $e->getMessage();
}
?>