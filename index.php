 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title></title>
 	<link type="text/css" rel="stylesheet" href="content/simplePagination.css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="content/jquery.simplePagination.js"></script>
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
 </body>
 </html>
