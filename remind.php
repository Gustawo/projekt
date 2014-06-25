<?php
require_once("conn_to_db.php");

$name=$_POST['Name'];
$surname=$_POST['Surname'];
$cardNumber=$_POST['cardNumber'];


	$con=mysql_connect("localhost", "root", 'p@$$w0rD');
	$db=mysql_select_db("biblioteka", $con);

	if(!$db) die ('Can\'t use db : ' . mysql_error());


	if(mysql_num_rows(mysql_query("select Haslo from czytelnicy where Nr_karty='".htmlspecialchars($cardNumber)."'")))
	{
		echo "istnieje";
		 mail($name+" "+$surname, 'Haslo do konta', 'Haslo do konta: '.);
	}
	mysql_close($con);
?>