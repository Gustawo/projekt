<?php
	$name=$_POST['name'];
	$surname=$_POST['surname2'];
	$placeBirth=$_POST['placeBirth'];
	$dataBirth=$_POST['dataBirth'];
	$dokNumber=$_POST['dokNumber'];
	$email=$_POST['eMail'];
	$department=$_POST['department'];
	$password=$_POST['pswd'];
	$repPassword=$_POST['repPassword'];

	// $con=mysqli_connect("localhost", "root", 'p@$$w0rD', "biblioteka");
	$con=mysqli_connect("localhost", "root", '1234', "biblioteka");
	if (mysqli_connect_errno())
  		echo "Nie polaczono z baza danych: " . mysqli_connect_error();
  	
  	if(mysqli_num_rows(mysqli_query($con, "select * from czytelnicy where Nr_karty='".htmlspecialchars($dokNumber)."'")))
		echo "Konto istnieje";
	else 
	{
		$query="INSERT INTO czytelnicy
	 	VALUES (NULL, '".htmlspecialchars($dokNumber)."', '".htmlspecialchars($password)."', '".htmlspecialchars($surname)."',
	 '".htmlspecialchars($name)."', '".htmlspecialchars($email)."', '".htmlspecialchars($department)."',
	 '".htmlspecialchars($dataBirth)."', '".htmlspecialchars($placeBirth)."')";
    
    	 mysqli_query($con, $query) or die ('Error');
    	 echo "Utworzono nowe konto";
    }
 		mysqli_close($con);
?>