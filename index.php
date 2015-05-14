<?php

$counter=0;
$novosti = array();
$primjer = "";
foreach(glob("novosti/*.txt") as $imeFajla)
{
    $novosti[$counter] = file($imeFajla);
    $counter++;
}

$kolicinaNovosti=count($novosti);
for ($i=0; $i<$kolicinaNovosti; $i++)
{
    for ($j=0; $j<$kolicinaNovosti-1-$i; $j++) {
        $time1 = strtotime($novosti[$j][0]); $newformat1 = date('d-m-Y h:i:s',$time1);
        $time2 = strtotime($novosti[$j+1][0]); $newformat2 = date('d-m-Y h:i:s',$time2);
        if ($time2 < $time1) {
            $tmp=$novosti[$j];
            $novosti[$j]=$novosti[$j+1];
            $novosti[$j+1]=$tmp;
        }
    }
}

for ($i=0; $i<$kolicinaNovosti; $i++)
{
    $novostLength=count($novosti[$i]);
    $sadrzajNovosti=$detaljnijeNovosti="";
    $j=4;
    while ($j<$novostLength){
        if (trim($novosti[$i][$j])=="--"){
            for ($k=$j+1; $k<$novostLength; $k++){
                $detaljnijeNovosti.=$novosti[$i][$k];
            }
            break;
        }
        $sadrzajNovosti.=$novosti[$i][$j];
        $j++;
    }
    $datum=$novosti[$i][0]; $autor=$novosti[$i][1]; $naslov=$novosti[$i][2]; $slika=$novosti[$i][3];
    if (empty($detaljnijeNovosti))
    {
        $vidljivost = 'display: none';
    }
    else
    {
        $vidljivost = 'display: block';
    }

    $naslov = ucfirst(strtolower($naslov));

    $primjer .= "
        <form method='get' action='Detaljno.php'>
            <div class='novost'>
<div class='tekstNovost'>
   <input type='hidden' name='autor' value='$autor'>
   <input type='hidden' name='naslov' value='$naslov'>
   <input type='hidden' name='slika' value='$slika'>
   <input type='hidden' name='sadržaj' value= '$sadrzajNovosti'>
   <input type='hidden' name='datum' value='$datum'>
   <input type='hidden' name='detaljno' value='$detaljnijeNovosti'>
Autor: $autor<br>
Datum: $datum<br><br>
<h3>$naslov</h3><br>
$sadrzajNovosti
<input type='submit' class='detaljnije' value='Detaljnije...'>
</div>
<img src=$slika alt=$slika>
</div>
        </form>";

}

echo<<<_HTML_
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
<h2>Novosti</h2>
<div id="novosti">
$primjer
</div>
<div id="podnozje">
Copyright © 2015 CIPETONI. Sva prava zadržana.
</div>
<script src="otvoriURL.js" type="text/javascript"></script>
</body>
</html>
_HTML_

?>