var valImePrezime=false;
var valEmail=false;
var valPoruka=false;
var valPostanskiBroj=false;
var valServis=false;

function brisanje()
{
	var imePrezime = document.getElementById("imePrezime");
	var grad = document.getElementById("grad");
	var postanskiBroj = document.getElementById("postanskiBroj");
	var eMail1 = document.getElementById("eMail1");
	var eMail2 = document.getElementById("eMail2");
    var poruka = document.getElementById("poruka");
	imePrezime.value="";
	grad.value="";
	postanskiBroj.value="";
	eMail1.value="";
	poruka.value="";
	document.getElementById("greskaImePrezime").innerHTML="";
	document.getElementById("greskaEmail1").innerHTML="";	
	document.getElementById("greskaEmail2").innerHTML="";	
	document.getElementById("greskaPoruka").innerHTML="";	
	document.getElementById("greskaGrad").innerHTML="";	
	document.getElementById("greskaPostanskiBroj").innerHTML="";
	document.getElementById("uzvicnik1").style.visibility="hidden";
	document.getElementById("uzvicnik2").style.visibility="hidden";
	document.getElementById("uzvicnik3").style.visibility="hidden";
	document.getElementById("uzvicnik4").style.visibility="hidden";
	document.getElementById("uzvicnik5").style.visibility="hidden";
	document.getElementById("uzvicnik6").style.visibility="hidden";
}


function webServis() 
{
	var pbroj=document.getElementById("postanskiBroj").value;
	var grad=document.getElementById("grad").value;
	ajax=new XMLHttpRequest();
	ajax.onreadystatechange=function(){
		if(ajax.readyState === 4 && ajax.status === 200) 
		{
			var pars = JSON.parse(ajax.responseText);
			if(Object.keys(pars)[0]=="greska")				
			{
				valServis=false;
				alert("Greška pri korištenju servisa");
				if(pars.hasOwnProperty("greska") && pars.greska == "Nepostojeće mjesto")
				{
					document.getElementById("greskaGrad").innerHTML="Nepostojeći grad";
					document.getElementById("uzvicnik5").style.visibility="visible";
					document.getElementById("greskaGrad").style.visibility="visible"; 
                }
				else if(pars.hasOwnProperty("greska") && pars.greska == "Nepostojeći poštanski broj")
				{
					document.getElementById("greskaPostanskiBroj").innerHTML="Nepostojeći poštanski broj";
					document.getElementById("uzvicnik6").style.visibility="visible";
					document.getElementById("greskaPostanskiBroj").style.visibility="visible";
				}
				else
				{
					document.getElementById("greskaPostanskiBroj").innerHTML="Poštanski broj ne odgovara gradu";
					document.getElementById("uzvicnik6").style.visibility="visible";
					document.getElementById("greskaPostanskiBroj").style.visibility="visible";
				}
				return false;
		    }
			else if(Object.keys(pars)[0]=="ok") 
			{
				document.getElementById("greskaGrad").innerHTML="";	
				document.getElementById("greskaPostanskiBroj").innerHTML="";
				document.getElementById("uzvicnik5").style.visibility="hidden";
				document.getElementById("uzvicnik6").style.visibility="hidden";
		   		valServis=true;			
		   }
		}
		else
		{
			valServis=false;
			alert("Greška pri korištenju servisa!"); 	
		}
	}
	ajax.open("GET", "http://zamger.etf.unsa.ba/wt/postanskiBroj.php?mjesto=" + grad + "&postanskiBroj=" + pbroj, true);
	ajax.send();
}

function obrada()
{
	var imePrezime = document.getElementById("imePrezime");
	if (imePrezime.value.length<1) 
	{
        document.getElementById("greskaImePrezime").innerHTML="Polje ne smije ostati prazno";
		document.getElementById("uzvicnik1").style.visibility="visible";
		valImePrezime=false;
    }
	else if (!imePrezime.value.match(/^[a-zA-Z ÄŒÄÄ†Ä‡Å½Å¾Å Å¡ÄÄ‘]+$/)) 
	{
		document.getElementById("greskaImePrezime").innerHTML="Ime smije sadržavati samo slova";
		document.getElementById("uzvicnik1").style.visibility="visible";
		valImePrezime=false;
	}
	else
	{
		document.getElementById("greskaImePrezime").innerHTML="";
		document.getElementById("uzvicnik1").style.visibility="hidden";	
		valImePrezime=true;
	}
	var eMail1 = document.getElementById("eMail1");
	if (eMail1.value.length<1) 
	{
		document.getElementById("greskaEmail1").innerHTML="Polje ne smije ostati prazno";
		document.getElementById("uzvicnik2").style.visibility="visible";
		valEmail=false;
    }
	else if (!eMail1.value.match(/^[a-z0-9_]+@[a-z]+\.[a-z][a-z]+$/))
	{
		document.getElementById("greskaEmail1").innerHTML="Email mora biti unesen u tačnom formatu";
		document.getElementById("uzvicnik2").style.visibility="visible";
		valEmail=false;
	}
	else
	{
		document.getElementById("greskaEmail1").innerHTML="";
		document.getElementById("uzvicnik2").style.visibility="hidden";	
		valEmail=true;
	}
	var eMail2 = document.getElementById("eMail2");
	if (eMail2.value.length<1) 
	{
		document.getElementById("greskaEmail2").innerHTML="Polje ne smije ostati prazno";
		document.getElementById("uzvicnik3").style.visibility="visible";
		valEmail=false;
    }
	else if (!eMail2.value.match(/^[a-z0-9_]+@[a-z]+\.[a-z][a-z]+$/))
	{
		document.getElementById("greskaEmail2").innerHTML="Email mora biti unesen u tačnom formatu";
		document.getElementById("uzvicnik3").style.visibility="visible";
		valEmail=false;
	}
	else if(eMail1.value!=eMail2.value && valEmail===true)
	{
		document.getElementById("greskaEmail2").innerHTML="Email adrese moraju biti identične";
		document.getElementById("uzvicnik3").style.visibility="visible";
		valEmail=false;
	}
	else
	{
		document.getElementById("greskaEmail2").innerHTML="";
		document.getElementById("uzvicnik3").style.visibility="hidden";
		valEmail=true;
	}
	var poruka = document.getElementById("poruka");
	if (poruka.value.length<1) 
	{
        document.getElementById("greskaPoruka").innerHTML="Polje ne smije ostati prazno";
		document.getElementById("uzvicnik4").style.visibility="visible";
        valPoruka=false;
    }
	else
	{
		document.getElementById("greskaPoruka").innerHTML="";
		document.getElementById("uzvicnik4").style.visibility="hidden";
		valPoruka=true;
	}
	var grad=document.getElementById("grad");
	var postanskiBroj=document.getElementById("postanskiBroj");	
	if(grad.value==="" && postanskiBroj.value==="")
	{
		document.getElementById("uzvicnik5").style.visibility="hidden";
       	document.getElementById("greskaGrad").style.visibility="hidden";
		document.getElementById("uzvicnik6").style.visibility="hidden";
       	document.getElementById("greskaPostanskiBroj").style.visibility="hidden";
		valPostanskiBroj=true;
		valServis=true;
	}
	else if(grad.value==="" && postanskiBroj.value!=="")
	{
		document.getElementById("greskaGrad").innerHTML="Polje ne smije ostati prazno";
		document.getElementById("uzvicnik5").style.visibility="visible";
       	document.getElementById("greskaGrad").style.visibility="visible";
		document.getElementById("uzvicnik6").style.visibility="hidden";
       	document.getElementById("greskaPostanskiBroj").style.visibility="hidden";
		valPostanskiBroj=false;
	}
	else if(grad.value!=="" && postanskiBroj.value==="")
	{
		document.getElementById("greskaPostanskiBroj").innerHTML="Polje ne smije ostati prazno";
		document.getElementById("uzvicnik6").style.visibility="visible";
       	document.getElementById("greskaPostanskiBroj").style.visibility="visible";
		document.getElementById("uzvicnik5").style.visibility="hidden";
       	document.getElementById("greskaGrad").style.visibility="hidden";
       	valPostanskiBroj=false;
	}
	else if(grad.value!=="" && postanskiBroj.value!=="")
	{
		document.getElementById("uzvicnik6").style.visibility="hidden";
       	document.getElementById("greskaPostanskiBroj").style.visibility="hidden";
		document.getElementById("uzvicnik5").style.visibility="hidden";
       	document.getElementById("greskaGrad").style.visibility="hidden";
		valPostanskiBroj=true;
		webServis();
	}	
	if(valEmail&&valImePrezime&&valPoruka&&valPostanskiBroj&&valServis)
	{
		var forma = document.getElementById("forma");
		form.submit();
	}
}