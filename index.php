<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title></title>
<link rel="Stylesheet" type="text/css" href="content/style.css" />
<link type="text/css" rel="stylesheet" href="content/simplePagination.css"/>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="content/jquery.simplePagination.js"></script>
<script type="text/javascript" src="content/script.js"></script>
<script> 
     $(document).ready(function(){ 
        var currentPage = 1; 
        var data;
        var json;
        function pobierz(){
            data = {authorName: $('#authorName').val(),
                    authorSurname: $('#authorSurname').val(),
                    title: $('#title').val(),
                    currentPage: currentPage
                    };
            $.ajax({
                url: "process/findbook.php",
                data: data,
                type: "post",
                success: (function(data){
                        json = jQuery.parseJSON(data);
                        $("#findResult").html(json.html);
                        $(function() {
                            $('.pagination').pagination('updateItems', json.itemsCount);
                        });
                })
            });//koniec ajax 
        }//koniec funkcji pobierz
        
        $(function() {
            $('.pagination').pagination({
                items: 10,
                itemsOnPage: 5,
                cssStyle: 'light-theme',
                onPageClick: function(pageNumber){
                    currentPage=pageNumber;
                    pobierz();
                    }
            });
        });
        $('.pagination').hide();


        $('#search').click(function(){
            pobierz();
            $('.pagination').show();
        });//koniec funkcji zdarzenia click

     });//koniec funkcji document ready

    </script>
</head>
<body>
<h1>Witaj w systemie biblioteki elektronicznej</h1>
 	
 		<p>Szukaj książek</p>
 		<input type="text" id="authorName" value="" placeholder="Imie autora"><br>
 		<input type="text" id="authorSurname" value="" placeholder="Nazwisko autora"><br>
 		<input type="text" id="title" value="" placeholder="Tytul książki"><br>
 		<button id="search">Szukaj</button>
 	

 	<div id="findResult"></div>

    <div class="pagination"></div>



    
<div id="Result_signIn">
	<p id="Info"></p>
	<button type="button" id="btnLook">Rejestracja</button>
	<button type="button" id="btnLook2">Logowanie</button> 
	
	<form action="logout.php" method="POST">
		<input type="submit" value="Wyloguj" id="btnLook3">	 
	</form>
</div>

	<div id="remindPasswForm">
		<div id="remindHeader">
			Przypomnij haslo
		</div>
		<form action="remind.php" method="post" id="data">
			Numer karty: <input type="text" name="cardNumber" id="cardNumber" onkeyup="this.value=this.value.replace(/[^\d]/,'')"><br>
			Imie: <input type="text" name="Name" id="Name" onkeyup="this.value=this.value.replace(/[^\A-Za-z]/,'')"><br>
			Nazwisko: <input type="text" name="Surname" id="Surname" onkeyup="this.value=this.value.replace(/[^\A-Za-z]/,'')"><br><br>
			<input type="submit" value="Wyslij" id="remind">	
		</form>
	</div>

	<div id='register'>
		<div id="registerHeader">
			Rejestracja
		</div>
		<form action="register.php" method="POST" id="data2" >
			Imię: <input type="text" name="name" id="name" onkeyup="this.value=this.value.replace(/[^\A-Za-z]/,'')"><br>
			Nazwisko: <input type="text" name="surname2" id="surname2" onkeyup="this.value=this.value.replace(/[^\A-Za-z]/,'')"><br>
			Miejsce urodzenia: <input type="text" name="placeBirth" id="placeBirth" onkeyup="this.value=this.value.replace(/[^\A-Za-z]/,'')"><br>
			Data urodzenia: <input type="text" name="dataBirth" id="dataBirth" onkeyup="this.value=this.value.replace(/[^\d-]/,'')"><br>			
			Numer dokumentu: <input type="text" name="dokNumber" id="dokNumber" onkeyup="this.value=this.value.replace(/[^\d]/,'')"><br>	
			e-mail: <input type="text" name="eMail" id="email"><br>	
			Wydział: <input type="text" name="department" id="department" onkeyup="this.value=this.value.replace(/[^\A-Za-z ]/,'')"><br>	
			Hasło: <input type="text" name="pswd" id="pswd"><br>	
			Powtórz hasło: <input type="text" name="repPassword" id="repPassword"><br><br>	
			<input type="submit" value="Rejestracja" id="reg">					
		</form>

	</div>		
		

	 <!--logowanie-->
	 <div id="signIn">
	<div id="signInBody">
		<div id="signInHeader">
			Logowanie
		</div>
		<form action="signIn.php" method="POST" id="data3">
			Numer karty: <input type="text" name="login" id="login" onkeyup="this.value=this.value.replace(/[^\d]/,'')"><br>
			Hasło: <input type="password" name="password" id="password"><br><br>
			<input type="submit" value="Zaloguj" id="sig">	
		</form>
		
		
	</div>
	<div id="remindPost">
		<a href="" id="remindPostA">Przypomnij haslo</a>
	</div>
	</div>	
		<div id="errorsMessage">
			<br>
		</div>
	</div>	
	<div id="errorsMessage2">
		<br>
	</div>
	</div>	
	<div id="errorsMessage3">
		<br>
	</div>
</body>
</html>

