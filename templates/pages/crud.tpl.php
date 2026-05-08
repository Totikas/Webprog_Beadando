<h2 class="crud-title">CRUD OPERATIONS</h2>

<button onclick="toggleAddForm()" class="btn-add">Add Film</button>

<div id="add-form" style="display:none; margin: 20px 0; padding: 20px; border: 1px solid #ddd; background: #f9f9f9;">
    <h3>Új film felvétele</h3>
    <form action="crud" method="post">
        <input type="number" name="fkod" placeholder="ID (fkod)" required>
        <input type="text" name="filmcim" placeholder="Film címe" required>
        <input type="text" name="szarmazas" placeholder="Származás">
        <input type="text" name="mufaj" placeholder="Műfaj">
        <input type="number" name="hossz" placeholder="Hossz (perc)">
        <input type="submit" name="add_film" value="Save Film">
    </form>
</div>

<table class="crud-table">
    <thead>
        <tr>
            <th>id</th>
            <th>Title</th>
            <th>Genre</th>
            <th>Duration</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($filmek as $f): ?>
            <tr>
                <td><strong><?= $f['fkod'] ?></strong></td>
                <td><strong><?= $f['filmcim'] ?></strong></td>
                <td><?= $f['mufaj'] ?></td>
                <td><?= $f['hossz'] ?> min</td>
                <td class="actions">
                    <button class="btn-edit" onclick="editFilm(<?= htmlspecialchars(json_encode($f)) ?>)">Edit</button>
                    <a href="crud&delete=<?= $f['fkod'] ?>" class="btn-delete" onclick="return confirm('Biztosan törli?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div id="edit-form" style="display:none; position: fixed; top: 20%; left: 30%; width: 40%; background: white; padding: 30px; box-shadow: 0 0 15px rgba(0,0,0,0.5); z-index: 1000;">
    <h3>Film szerkesztése</h3>
    <form action="crud" method="post">
        <input type="hidden" name="fkod" id="edit-fkod">
        <input type="text" name="filmcim" id="edit-filmcim" required>
        <input type="text" name="szarmazas" id="edit-szarmazas">
        <input type="text" name="mufaj" id="edit-mufaj">
        <input type="number" name="hossz" id="edit-hossz">
        <input type="submit" name="update_film" value="Update Film">
        <button type="button" onclick="document.getElementById('edit-form').style.display='none'">Cancel</button>
    </form>
</div>

<script>
function toggleAddForm() {
    var x = document.getElementById("add-form");
    x.style.display = (x.style.display === "none") ? "block" : "none";
}

function editFilm(film) {
    document.getElementById('edit-form').style.display = 'block';
    document.getElementById('edit-fkod').value = film.fkod;
    document.getElementById('edit-filmcim').value = film.filmcim;
    document.getElementById('edit-szarmazas').value = film.szarmazas;
    document.getElementById('edit-mufaj').value = film.mufaj;
    document.getElementById('edit-hossz').value = film.hossz;
}
</script>