<?php
$uzenetek = array();
if(isset($_SESSION['login'])) {
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=mozi20', 'mozi20', 'asdasd');
        $sql = "select * from uzenetek order by kuldes_ideje desc"; // Fordított időrend [cite: 37]
        $res = $dbh->query($sql);
        $uzenetek = $res->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {}
} else {
    header("Location: .");
}
?>