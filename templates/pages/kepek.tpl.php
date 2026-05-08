<h2>Képgaléria</h2>

<?php if(isset($_SESSION['login'])): ?>
    <div class="upload-section">
        <h3>Új kép feltöltése</h3>
        <form action="kepek" method="post" enctype="multipart/form-data">
            <input type="file" name="uj_kep">
            <input type="submit" value="Feltöltés">
        </form>
        <?php if(isset($uzenet)) echo "<p>$uzenet</p>"; ?>
    </div>
<?php endif; ?>

<div class="gallery-grid">
    <?php foreach($kepek as $kep): ?>
        <div class="gallery-item">
            <img src="./images/<?= $kep['fajlnev'] ?>" alt="Galéria kép">
            <p><small>Feltöltő: <?= $kep['feltolto_login'] ?><br><?= $kep['feltoltes_ideje'] ?></small></p>
        </div>
    <?php endforeach; ?>
</div>