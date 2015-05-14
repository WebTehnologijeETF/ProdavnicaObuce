<!DOCTYPE html>
<html>
<body>
<div id='zaglavlje'>
    <div id='logotip'>
        <a href='index.php'>
            <img id='logoSlika' src='http://www.muska-odela-beograd.com/uploads/uploads_03_2013/26232341_cipelezavencanje.jpg' alt='CIPETONI'>
        </a>
        <div id='logoTekst'>
            <a href='index.php'>CIPETONI</a>
        </div>
    </div>
    <div id='slogan'>Sa nama hodate kao po oblacima!</div>
</div>
<div id='izbornik'>
    <ul class='meni'>
        <li> <a onclick='otvoriURL('index.php')'>Naslovnica</a></li>
        <li> <a onclick='otvoriURL('Proizvodi.html')'>Proizvodi</a></li>
        <li> <a onclick='otvoriURL('Partneri.html')'>Partneri</a></li>
        <li> <a onclick='otvoriURL('Kontakt.php')'>Kontakt</a></li>
    </ul>
</div>

<h2>Provjerite da li ste ispravno popunili kontakt formu:</h2>
<form action="SaljiMail.php" method="post">
    <div>
        <fieldset id="kontaktPrikaz">
            <br>
            <label class="labelaIspis">Ime i prezime:</label><input class="pregled" name="imeVrijednost" readonly value="<?php echo $ime ?>"><br>
            <label class="labelaIspis">Mail adresa:</label><input class="pregled" name="mailVrijednost" readonly value="<?php echo $mail ?>"><br>
            <label class="labelaIspis">Grad:</label><input class="pregled" name="gradVrijednost" readonly value="<?php echo $grad ?>"><br>
            <label class="labelaIspis">Postanski broj:</label><input class="pregled" name="postanskiVrijednost" readonly value="<?php echo $postanski ?>"><br>
            <label class="labelaIspis">Spol:</label><input class="pregled" name="spolVrijednost" readonly value="<?php echo $spol ?>"><br>
            <label class="labelaIspis">Poruka:</label><input class="pregled" name="porukaVrijednost" readonly value="<?php echo $poruka ?>"><br>
        </fieldset>
        <br>
    </div>
    <h2>Da li ste sigurni da želite poslati ove podatke?</h2>
    <input type="submit" id="submitButton" value="Siguran sam"><br><br><br>
</form>
<h2>Ako ste pogrešno popunili formu, možete ispod prepraviti unesene podatke:</h2>
<br>
</body>
</html>