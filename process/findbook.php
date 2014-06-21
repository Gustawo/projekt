<?php
require_once '../models/database.php';

$ob= new database();
$name = $_POST['authorName'];
$surname = $_POST['authorSurname'];
$title = $_POST['title'];
$currentPage = $_POST['currentPage'];
$maxOnPage = 5; // na sztywno ustawiona ilosc rekordow na strone
$limit=($currentPage - 1)*$maxOnPage;
$offset = $limit+($maxOnPage-1); 

$books = $ob->findBooks($name,$surname,$title); //zmienna jest tablica obiektow typu book lub ma wartosc false
$booksCount = $ob->affectedRows;
$viewBag = array('itemsCount'=> 0, 'html' => "");
$viewBag["itemsCount"] = $booksCount; //informujemy klienta o ilosci znalezionych pozycji 
$viewBag['html'].="<table>";
$viewBag['html'].="<tr><td>AUTOR</td><td>TYTUŁ</td><td>KATEGORIA</td><td>WYDAWNICTWO</td><td>ROK WYDANIA</td><td>STATUS</td>";
//petla zapisuje do zmiennej typu string tylko te rezultaty, ktore maja zostac wyswietlone
	if($booksCount>$maxOnPage){
		for ($i=$limit; $i<=$offset; $i++) {
			if($i>=($booksCount)){
				break;
			}
			$viewBag['html'].="<tr><td>".$books[$i]->getAuthor()."</td><td>".$books[$i]->getTitle()."</td><td>".$books[$i]->getCategory()."</td><td>".$books[$i]->getPublisher()."</td>";
            $viewBag['html'].= "<td>".$books[$i]->getYear()."</td><td>".($books[$i]->getStatus()=='zarezerwowana' ? "zarezerwowana" : "<a href='#'>zamow</a>")."</td></tr>";
		}
	}
	else{
		foreach ($books as $book) {
			$viewBag['html'].="<tr><td>".$book->getAuthor()."</td><td>".$book->getTitle()."</td><td>".$book->getCategory()."</td><td>".$book->getPublisher()."</td>";
		    $viewBag['html'].= "<td>".$book->getYear()."</td><td>".($book->getStatus()=='zarezerwowana' ? "zarezerwowana" : "<a href='#'>zamow</a>")."</td></tr>";
        }
        
	}
$viewBag['html'].="</table>";

echo json_encode($viewBag);



