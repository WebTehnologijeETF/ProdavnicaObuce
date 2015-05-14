<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="shortcut icon" href="cipetoni.ico">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <title>CIPETONI-Naslovnica</title>
    <link href="mojStil.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="zaglavlje">
    <div id="logotip">
        <a href="index.html">
            <img id="logoSlika" src="http://www.muska-odela-beograd.com/uploads/uploads_03_2013/26232341_cipelezavencanje.jpg" alt="CIPETONI">
        </a>
        <div id="logoTekst">
            <a href="index.html">CIPETONI</a>
        </div>
    </div>
    <div id="slogan">Sa nama hodate kao po oblacima!</div>
</div>
<nav id="izbornik">
    <ul class="meni">
        <li> <a onclick="otvoriURL('index.php')">Naslovnica</a></li>
        <li> <a onclick="otvoriURL('Proizvodi.html')">Proizvodi</a></li>
        <li> <a onclick="otvoriURL('Partneri.html')">Partneri</a></li>
        <li> <a onclick="otvoriURL('Kontakt.php')">Kontakt</a></li>
    </ul>
</nav>
<h2>
    <?php
    $naziv = $_GET['naslov'];
    echo '<h2 id="naslovVijesti">' .ucfirst(strtolower($naziv)). '</h2>';
    ?>
</h2>
<br>
<fieldset>
    <img id="vijestSlika" src=<?php echo $_GET['slika'] ?> alt=<?php echo $_GET['slika'] ?>>
    <br><br>
    <p"><?php echo $_GET['detaljno'] ?></p>
</fieldset>
<p><?php echo 'Autor: ', $_GET['autor'] ?></p>
<p><?php echo 'Datum objave: ', $_GET['datum'] ?></p>
<div id="podnozje">
    Copyright © 2015 CIPETONI. Sva prava zadržana.
</div>
<script src="otvoriURL.js" type="text/javascript"></script>
</body>
</html>