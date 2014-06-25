<?php
//$con=mysql_connect('localhost', 'root', 'p@$$w0rD') or die(mysql_error());
$con=mysqli_connect("localhost", "root", '1234', "biblioteka");
$db=mysql_select_db("biblioteka", $con);
	
if(!$db) die ('Can\'t use db : ' . mysql_error());
?>
