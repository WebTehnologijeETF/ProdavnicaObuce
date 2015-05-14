<?php

$ime = $grad = $postanski = $mail = $pmail = $poruka = $spol = "";
$imeGreska = $mailGreska = $pmailGreska = $porukaGreska = "";
$imeSlika = $mailSlika = $pmailSlika = $porukaSlika = "display:none";

$naslovna = "
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
";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $sveValidno = true;
    $ime = $_POST['imePrezime'];
    $mail = $_POST['eMail'];
    $pmail = $_POST['eMail2'];
    $grad = $_POST['grad'];
    $postanski = $_POST['postanskiBroj'];
    $poruka = $_POST['poruka'];
    if (isset($_POST['muski']))
        $spol = "muški";
    else
        $spol = "ženski";

    if (!samoSlova($ime) || empty($ime))
    {
        $sveValidno = false;
        $imeGreska = "Ime smije sadržavati samo slova";
        $imeSlika = "display:block";
    }
    else
    {
        $imeGreska = "";
        $imeSlika = "display:none";
        testirajPodatak($ime);
    }

    if (!mailValidacija($mail) || empty($mail))
    {
        $sveValidno = false;
        $mailGreska = "Email mora biti unesen u tačnom formatu";
        $mailSlika = "display:block";
    }
    else
    {
        $mailGreska = "";
        $mailSlika = "display:none";
        testirajPodatak($mail);
    }
    if (!mailValidacija($pmail) || empty($pmail))
    {
        $sveValidno = false;
        $pmailGreska = "Email mora biti unesen u tačnom formatu";
        $pmailSlika = "display:block";
    }
    else
    {
        $pmailGreska = "";
        $pmailSlika = "display:none";
        testirajPodatak($pmail);
    }
    if ($mail !== $pmail)
    {
        $sveValidno = false;
        $pmailGreska = "Email adrese moraju biti identične";
        $pmailSlika = "display:block";
    }
    else
    {
        $pmailGreska = "";
        $pmailSlika = "display:none";
        testirajPodatak($pmail);
    }

    if (empty($poruka))
    {
        $sveValidno = false;
        $porukaGreska = "Polje ne smije ostati prazno";
        $porukaSlika = "display:block";
    }
    else
    {
        $porukaGreska = "";
        $porukaSlika = "display:none";
        testirajPodatak($poruka);
    }

    testirajPodatak($grad);
    testirajPodatak($postanski);

    if ($sveValidno)
    {
        $naslovna="";
        include("FormaIspis.php");
    }
}

function testirajPodatak(&$podatak)
{
    $podatak = trim($podatak);
    $podatak = stripcslashes($podatak);
    $podatak = htmlspecialchars($podatak);
}

function samoSlova($podatak)
{
    $validno = true;
    if (!preg_match("/^[a-zA-Z ÄŒÄÄ†Ä‡Å½Å¾Å Å¡ÄÄ‘]+$/",$podatak)) {
        $validno = false;
    }
    return $validno;
}

function mailValidacija($podatak)
{
    $validno = true;
    if (!preg_match("/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\\.[a-zA-Z0-9-.]+$/",$podatak))
    {
        $validno = false;
    }
    return $validno;
}

echo<<<_HTML_
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
	<META http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="shortcut icon" href="cipetoni.ico">
	<title>CIPETONI-Kontakt</title>
	<link href="mojStil.css" rel="stylesheet" type="text/css">
</head>
<body>
	$naslovna
	<h2>Unos podataka</h2>
	<b>(*) - OBAVEZNA POLJA</b>
	<br>
	<br>
	<form name="forma" id="forma" method="POST" action="Kontakt.php">
	<div>Ime i prezime(*):</div>
	<input type="text" id="imePrezime" name="imePrezime" required="required" oninvalid="this.setCustomValidity('Unesite ime i prezime')" onchange="try{setCustomValidity('')}catch(e){}" value=$ime>
	<img style=$imeSlika id="uzvicnik1" src="http://www.clker.com/cliparts/9/e/0/5/134980368932081390Exclamation%20Button.svg.hi.png" alt="Uzvicnik">
	<div id="greskaImePrezime"$imeGreska></div>
	<br>
	<div>Spol(*):</div>
	<input type="radio" class="spol" name="muski" value="muski" checked="true"/>muški
	<input type="radio" class="spol" name="zenski" value="zenski"/>ženski
	<br>
	<div>Grad:</div>
	<input type="text" id="grad" name="grad" value=$grad>
	<img id="uzvicnik5" src="http://www.clker.com/cliparts/9/e/0/5/134980368932081390Exclamation%20Button.svg.hi.png" alt="Uzvicnik">
	<div id="greskaGrad"></div>
	<br>
	<div>Poštanski broj:</div>
	<input type="text" id="postanskiBroj" name="postanskiBroj" value=$postanski>
	<img id="uzvicnik6" src="http://www.clker.com/cliparts/9/e/0/5/134980368932081390Exclamation%20Button.svg.hi.png" alt="Uzvicnik">
	<div id="greskaPostanskiBroj"></div>
	<br>
	<div>Email adresa(*):</div>
	<input type="email" id="eMail1" name="eMail" required="required" oninvalid="this.setCustomValidity('Unesite email')" onchange="try{setCustomValidity('')}catch(e){}" value=$mail>
	<img style=$mailSlika id="uzvicnik2" src="http://www.clker.com/cliparts/9/e/0/5/134980368932081390Exclamation%20Button.svg.hi.png" alt="Uzvicnik">
	<div id="greskaEmail1">$mailGreska</div>
	<br>
	<div>Ponovite email adresu(*):</div>
	<input type="email" id="eMail2" name="eMail2" required="required" oninvalid="this.setCustomValidity('Unesite email)" onchange="try{setCustomValidity('')}catch(e){}" value=$pmail>
	<img style=$pmailSlika id="uzvicnik3" src="http://www.clker.com/cliparts/9/e/0/5/134980368932081390Exclamation%20Button.svg.hi.png" alt="Uzvicnik">
	<div id="greskaEmail2">$pmailGreska</div>
	<br>
	<div>Poruka(*):</div>
	<textarea id="poruka" name="poruka" rows="1" cols="1" required="required" oninvalid="this.setCustomValidity('Unesite poruku')" onchange="try{setCustomValidity('')}catch(e){}">$poruka</textarea>
	<img style=$porukaSlika id="uzvicnik4" src="http://www.clker.com/cliparts/9/e/0/5/134980368932081390Exclamation%20Button.svg.hi.png" alt="Uzvicnik">
	<div id="greskaPoruka">$porukaGreska</div>
	<br>
	<br>
	<div><button id="potvrdi" type="submit" onclick="obrada(); return false;">Potvrdi</button></div>
	<div><button type="reset" onclick="brisanje()">Poništi</button></div>
	</form>
	<h2>Audio isječak za opuštanje</h2>
	<audio controls>
		<source src="https://dl-web.dropbox.com/get/ZaWT/300%20Violin%20Orchestra%20-%20John%20Quintero%20%28High%20Quality%29.mp3?_subject_uid=297885487&amp;w=AABaJvaccDLGFPdRPfQS29xDAx9QQr8mgLvFdKl5DbtWmw" type="audio/mpeg">
	</audio>
	<h2>Video isječak za opuštanje</h2>
	<iframe width="427" height="255" src="https://www.youtube.com/embed/fCebJodm0lY" frameborder="0" allowfullscreen></iframe>
	<br>
	<details>
		<summary>Gledajte video preko Youtube-a</summary>
		<p>Video možete pogledati i na <a href="https://www.youtube.com/embed/fCebJodm0lY">ovom</a> linku.</p>
	</details>
	<div id="podnozje">
	Copyright © 2015 CIPETONI. Sva prava zadržana.
	</div>
	<script src="otvoriURL.js" type="text/javascript"></script>
	<script src="kontaktSkripta.js" type="text/javascript"></script>
	</body>
</html>
_HTML_
?>
