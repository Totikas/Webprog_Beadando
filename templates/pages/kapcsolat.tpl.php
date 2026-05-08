<h2>Kapcsolat</h2>
<p>Küldjön nekünk üzenetet az alábbi űrlap segítségével!</p>

<form id="kapcsolat-form" action="kapcsolat" method="post">
    <input type="text" name="nev" id="nev" placeholder="Az Ön neve">
    <div id="nev-error" class="error"></div>

    <input type="text" name="email" id="email" placeholder="E-mail címe">
    <div id="email-error" class="error"></div>

    <textarea name="szoveg" id="szoveg" placeholder="Üzenet szövege" rows="5"></textarea>
    <div id="szoveg-error" class="error"></div>

    <input type="submit" value="Üzenet küldése">
</form>

<script>
document.getElementById('kapcsolat-form').onsubmit = function() {
    let valid = true;
    const nev = document.getElementById('nev').value;
    const email = document.getElementById('email').value;
    const szoveg = document.getElementById('szoveg').value;

    // Hibamezők ürítése
    document.querySelectorAll('.error').forEach(el => el.innerText = '');

    if(nev.length < 3) {
        document.getElementById('nev-error').innerText = "A név túl rövid (min. 3 karakter)!";
        valid = false;
    }
    if(!email.includes('@') || !email.includes('.')) {
        document.getElementById('email-error').innerText = "Érvénytelen e-mail cím!";
        valid = false;
    }
    if(szoveg.trim() === '') {
        document.getElementById('szoveg-error').innerText = "Az üzenet nem lehet üres!";
        valid = false;
    }
    return valid;
};
</script>