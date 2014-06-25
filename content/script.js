$(document).ready(function()
{	
	// rejestracja
	$('#btnLook').click(function(event)
	{
		$("#errorsMessage").fadeOut(200);
		if($("#errorsMessage").val()!="")
			$("#errorsMessage").fadeIn(200);
		$("#register").toggle();
		$('#signIn').fadeOut(100);
		$('#remindPasswForm').fadeOut(100);


		// logowanie ..
		cleanInput("data2", "text");
		cleanInput("data3", "text");
		cleanInput("data3", "password");
		event.preventDefault();
	});
	// logowanie
	$('#btnLook2').click(function(event)
	{
		$("#errorsMessage").fadeOut(200);
		$('#signIn').toggle();
		$('#register').fadeOut(100);
		$('#remindPasswForm').fadeOut(100);
		// prypomnienie hasla-pola input
		cleanInput("data", "text");

		cleanInput("data2", "text");
		cleanInput("data3", "text");
		cleanInput("data3", "password");
		event.preventDefault();
	});
	// wylogowywanie
	$("#btnLook3").click(function(event)
	{
		alert("Pomyslnie wylogowano");
		$('#btnLook').fadeIn(100);
		$("#btnLook2").fadeIn(100);
		$("#btnLook3").fadeOut(100);
		event.preventDefault();
	});
	// przypomnienie hasla
	$("#remindPostA").click(function(event)
	{
		$("#errorsMessage").fadeOut(500);
		$("#signIn").fadeOut(100);
		$('#remindPasswForm').fadeIn(100);
		event.preventDefault();
	});


	// przycisk zaloguj-przypomnienie hasla
	$('#sig').click(function(event)
	{
		restoreDiv();

		// sprawdzanie poprawnosci pol input 
		markInput("data3", "text");
		markInput("data3", "password");
	
					
		var action=$("#data3").attr("action");
	
		var data=
		{
			login: $("#login").val(),
			password: $("#password").val(),
		};

		$.post(action, data, function(res)
		{
			if(res=="true" && $("#login").val()!=0 && $("#password").val())
			{
				alert("Zalogowano do systemu");
				$("#signIn").fadeOut(200);
				$("#btnLook2").fadeOut(100);
				$("#btnLook3").fadeIn(200);
					// ukrycie przycisku rejestracja
				$("#btnLook").fadeOut(100);
			}
		
		if(($("#login").val()!=0) && ($("#password").val()!=0) && res!="true")
			$("#errorsMessage").append("Nie zalogowano\n. Wpisano niepoprawne dane<br><br>").fadeIn();
		});
		var a= dokWal("login"); var b=passWal2();

		event.preventDefault();
		return false;
	});

	// rejestracja-walidacja
	$('#reg').click(function(event)
	{
		restoreDiv();
		markInput("data2", "text");
		markInput("data2", "password");
		

		var a=nameWal("name"); var b=surnameWal("surname2"); var c=placeWal(); var d=dataWal(); var e=dokWal("dokNumber"); var f=emailWal(); var g=departmWal(); var h=passWal(); 
		if(a && b && c && d && e && f &&g &&h )
			return true;
		
		event.preventDefault();
		return false;

	});


	// przypomnienie hasla-walidacja
	$('#remind').click(function(event)
	{
		restoreDiv();
		markInput("data", "text");
		markInput("data", "password");
		

		var a=dokWal("cardNumber"); var b=nameWal("Name"); var c=surnameWal("Surname");  
		if(a && b && c )
			return true;

		event.preventDefault();
		return false;
	});
	// wykaz bledow-przywrocenie postaci domyslnej
	function restoreDiv()
	{
		$("#errorsMessage").fadeOut(200);
		// usuniecie zawartosci pola 'wykaz bledow' przy kazdym wywolaniu funkcji	
		$("#errorsMessage").empty();
	}
	// czyszczenie pol input po kliknieciu w inny button
	function cleanInput(a, b)
	{
		// przy kazdoraozywm kliknieciu w button wyerowanie pol input 
		$('#'+a+' input[type='+b+']').each(function(n,element)  
		{	
				if($(element).val()!='')
					$(this).val('');
				 if($(element).css('border', '2px solid #cc0000'));
				 	$(this).css('border', '');
						
		});
	}
	// pola input-zaznaczanie
	function markInput(a, b)
	{
		$('#'+a+' input[type='+b+']').each(function(n,element)  
		{
			if ($(element).val()=='')
				$(this).css("border" , "2px solid #cc0000");
						
			if($(element).val()!='')
				$(this).css({"border": ""});
		});	
	}


		var email = /^([A-Za-z0-9_])+\@([A-Za-z0-9_])+\.([A-Za-z]{2,4})$/;
		var name_surname=/^[A-Za-z0-9-]{3,}/;
		var birthData=/^([0-9]{4})-([0-9]{1,2})-([0-9]{1,2})$/;
		var passw = /^[\w#@$*!^&%]{9,20}$/;
		var dokNum= /^[0-9]{8}$/
		var birthPlace=/^[A-Za-z-]{3,}/;

	function nameWal(a)
	{
		if($("#"+a).val()=='')
		{
			$("#errorsMessage").append("Prosze podac imie<br><br>").fadeIn();
			return false;
		}
		if(($("#"+a).val()=='') || !(name_surname.test($("#"+a).val())))
		{
			$("#errorsMessage").append("Niepoprawne imie <br>(wymagane: min. 3 znaki)<br><br>").fadeIn();
			return false;
		}
		
		return true;
	}

	function surnameWal(a)
	{

		if($("#"+a).val()=='')
		{
			$("#errorsMessage").append("Prosze podac nazwisko<br><br>").fadeIn();
			return false;
		}
		if(($("#"+a).val()=='') || !(name_surname.test($("#"+a).val())))
		{
			$("#errorsMessage").append("Niepoprawne nazwisko <br>(wymagane: min. 3 znaki)<br><br>").fadeIn();
			return false;
		}
		return true;
	}

	function dokWal(a)
	{
		if($("#"+a).val()=="")
		{
			$("#errorsMessage").append("Prosze podac numer dokumentu<br><br>").fadeIn();
			return false;
		}
		if(!(dokNum.test($("#"+a).val())))
		{
			$("#errorsMessage").append("Numer dokumentu posiada nieodpowiednia ilosc znakow <br>  (wymagane: 8 cyfr)<br><br>").fadeIn();
			$("#"+a).css('border', '2px #cc0000');

			return false;
		}
		return true;
	}	
		// logowanie, przypomnienie hasla
	function dokWal2(a)
	{
		if($("#"+a).val()=="")
		{
			$("#errorsMessage").append("Prosze podac numer dokumentu<br><br>").fadeIn();
			return false;
		}
		return true;
	}
	// rejestracja-funckje-walidacja
	function departmWal()
	{
		if($("#department").val()=='')
		{
			$("#errorsMessage").append("Prosze podac nazwe wydzialu<br><br>").fadeIn();
			return false;
		}
		return true;
	}	

	function placeWal()
	{
		if($("#placeBirth").val()=='')
		{
			$("#errorsMessage").append("Prosze podac nazwe miejscowosci<br><br>").fadeIn();
			return false;
		}
		if (($("#placeBirth").val()=='') || !(birthPlace.test($("#placeBirth").val())))
		{
			$("#errorsMessage").append("Niepoprawna nazwa miast <br>(wymagane: min. 3 znaki)<br><br>").fadeIn();
			return false;
		}
		return true;
	}

	function emailWal() {

		if($("#email").val()=='')
		{
			$("#errorsMessage").append("Prosze podac adres e-mail<br><br>").fadeIn();
			return false;
		}
		if (($("#email").val()=='') || !(email.test($("#email").val())))
		{
			$("#errorsMessage").append("Niepoprawny adres e-mail<br><br>").fadeIn();
			return false;
		}
		return true;
	}


	function dataWal()
	{
		if($("#dataBirth").val()=='')
		{
			$("#errorsMessage").append("Prosze podac date urodzenia<br><br>").fadeIn();
			return false;
		}
		if(($("#dataBirth").val()=='') || !(birthData.test($("#dataBirth").val())))
		{
			$("#errorsMessage").append("Nieprawidlowa data urodzenia <br>(wymagany format:YYYY-MM-DD)<br><br>").fadeIn();
			return false;
		}
		return true;
	}

	function passWal()
	{
		if($("#pswd").val()=='')
		{
			$("#errorsMessage").append("Prosze podac haslo<br><br>").fadeIn();
			return false;
		}
		if(!(passw.test($("#pswd").val())))
		{
			$("#errorsMessage").append("Niepopranwe haslo (dopuszcz.: male, duze litery, znaki specjalne, dlugosc: 9-20 ) <br><br>").fadeIn();
			return false;
		}
		if(($("#pswd").val()!='') && ($("#repPassword").val()==''))
		{
				$("#errorsMessage").append("Prosze potwierdzic haslo<br><br>").fadeIn();
				return false;
		}
		if(($("#pswd").val()!='') && ($("#repPassword").val()!=''))
		{
			if(($("#repPassword").val()!=$("#pswd").val()))
			{
				$("#errorsMessage").append("Podane hasla sa rozne<br><br>").fadeIn();
				return false;
			}
			return true;
		}
	}

    // logowanie
	function passWal2()
	{
		if($("#password").val()=='')
		{
			$("#errorsMessage").append("Prosze podac haslo<br><br>").fadeIn();
			return false;
		}
		return true;
	}

	

});