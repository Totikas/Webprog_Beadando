<h2>Beérkezett üzenetek</h2>
<table class="uzenet-tabla">
    <thead>
        <tr>
            <th>Küldő neve (Login)</th>
            <th>E-mail</th>
            <th>Üzenet</th>
            <th>Időpont</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($uzenetek as $u): ?>
            <tr>
                <td><?= $u['nev'] ?> (<?= $u['felhasznalo_login'] ?>)</td>
                <td><?= $u['email'] ?></td>
                <td><?= $u['uzenet'] ?></td>
                <td><?= $u['kuldes_ideje'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>