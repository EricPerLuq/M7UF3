<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>LOGIN</h1>
<form action="#" method="Post">
	<label >User:</label> 
	<input type='text' name='nombre'> <br>
	<label >Password:</label> 
	<input type='text' name='password'>
	<input type="submit" name="Envio">
	<br>
</form>
<?php

 	$value1 =$_POST["nombre"] ;
 	$value2 =$_POST["password"];
 	echo $value1."<br>";
 	echo $value2."<br>";
 		$conn = mysqli_connect('localhost','ericperez','42gjuntaros','m7_injection');
 		//"INSERT INTO login(ID,USER,PASSWD) VALUES(3,'eric',SHA('contraseña'));"	
 		$consulta ="SELECT * FROM login WHERE USER= '".$value1."' AND PASSWD=SHA2('".$value2."',512);";
 		$resultat = mysqli_query($conn, $consulta);
 		if (!$resultat) {
     			$message  = 'Consulta invàlida: ' . mysqli_error() . "\n";
     			$message .= 'Consulta realitzada: ' . $consulta;
     			die($message);
 		}
 		while($registre = mysqli_fetch_assoc($resultat)) {
 			echo "hola, ".$registre['USER']."<br>";
 		}
 	?>
 	

</body>
</html>