function obrada()
{
	var sveValidno = true;
	var imePrezime = document.getElementById("imePrezime");
	var eMail1 = document.getElementById("eMail1");
	var eMail2 = document.getElementById("eMail2");
    var poruka = document.getElementById("poruka");
    if (imePrezime.value.length<1) 
	{
        document.getElementById("greskaImePrezime").innerHTML="Polje ne smije ostati prazno";
		document.getElementById("uzvicnik1").style.visibility="visible";
    }
	else if (!imePrezime.value.match(/^[a-zA-Z ÄŒÄÄ†Ä‡Å½Å¾Å Å¡ÄÄ‘]+$/)) 
	{
		document.getElementById("greskaImePrezime").innerHTML="Ime smije sadržavati samo slova";
		document.getElementById("uzvicnik1").style.visibility="visible";
		sveValidno = false;
	}
	else
	{
		document.getElementById("greskaImePrezime").innerHTML="";
		document.getElementById("uzvicnik1").style.visibility="hidden";	
	}
	if (eMail1.value.length<1) 
	{
		document.getElementById("greskaEmail1").innerHTML="Polje ne smije ostati prazno";
		document.getElementById("uzvicnik2").style.visibility="visible";
		sveValidno = false;
    }
	else if (!eMail1.value.match(/^[a-z0-9_]+@[a-z]+\.[a-z][a-z]+$/))
	{
		document.getElementById("greskaEmail1").innerHTML="Email mora biti unesen u tačnom formatu";
		document.getElementById("uzvicnik2").style.visibility="visible";
		sveValidno = false;
	}
	else
	{
		document.getElementById("greskaEmail1").innerHTML="";
		document.getElementById("uzvicnik2").style.visibility="hidden";		
	}
	if (eMail2.value.length<1) 
	{
		document.getElementById("greskaEmail2").innerHTML="Polje ne smije ostati prazno";
		document.getElementById("uzvicnik3").style.visibility="visible";
		sveValidno = false;
    }
	else if (!eMail2.value.match(/^[a-z0-9_]+@[a-z]+\.[a-z][a-z]+$/))
	{
		document.getElementById("greskaEmail2").innerHTML="Email mora biti unesen u tačnom formatu";
		document.getElementById("uzvicnik3").style.visibility="visible";
		sveValidno = false;
	}
	else
	{
		document.getElementById("greskaEmail2").innerHTML="";	
		document.getElementById("uzvicnik3").style.visibility="hidden";
	}
	if(sveValidno==true)
	{
		if(eMail1.value!=eMail2.value)
		{
			document.getElementById("greskaEmail2").innerHTML="Email adrese moraju biti identične";
			document.getElementById("uzvicnik3").style.visibility="visible";
			sveValidno = false;
		}
		else
		{
			document.getElementById("uzvicnik3").style.visibility="hidden";
		}
	}
    if (poruka.value.length<1) 
	{
        document.getElementById("greskaPoruka").innerHTML="Polje ne smije ostati prazno";
		document.getElementById("uzvicnik4").style.visibility="visible";
        sveValidno = false;
    }
	else
	{
		document.getElementById("greskaPoruka").innerHTML="";
		document.getElementById("uzvicnik4").style.visibility="hidden";
	}
}

function brisanje()
{
	var imePrezime = document.getElementById("imePrezime");
	var spolovi = document.getElementsByName("spol");
	var datumRodjenja=document.getElementById("datumRodjenja");
	var drzava=document.getElementById("drzava");
	var eMail1 = document.getElementById("eMail1");
	var eMail2 = document.getElementById("eMail2");
    var poruka = document.getElementById("poruka");
	imePrezime.value="";
	for(var i=0;i<spolovi.length;i++)
      spolovi[i].checked = false;
	datumRodjenja.value="mm/dd/yyyy";
	drzava.value="";
	eMail1.value="";
	eMail2.value="";
	poruka.value="";
	document.getElementById("greskaImePrezime").innerHTML="";
	document.getElementById("greskaEmail1").innerHTML="";	
	document.getElementById("greskaEmail2").innerHTML="";	
	document.getElementById("greskaPoruka").innerHTML="";
	document.getElementById("uzvicnik1").style.visibility="hidden";
	document.getElementById("uzvicnik2").style.visibility="hidden";
	document.getElementById("uzvicnik3").style.visibility="hidden";
	document.getElementById("uzvicnik4").style.visibility="hidden";
}