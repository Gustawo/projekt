<?php
require_once("conn_to_db.php");


	session_start();
	$_SESSION['login'];
	if(empty($_SESSION["login"]))  $_SESSION["login"]=0;


	$ID=$_POST['login'];
	$PASSW=$_POST['password'];


	$query=mysql_query("SELECT Nr_karty, Haslo FROM czytelnicy WHERE Nr_karty = '$ID' AND Haslo= '$PASSW' LIMIT 1");
	 if(mysql_fetch_array($query) !== false){
		echo "true";

	 	$_SESSION['login']=$ID;
	 }
        
	 mysql_close($con);

?>