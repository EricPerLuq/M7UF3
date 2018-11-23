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
 	
 		$dsn = "mysql:host=localhost;dbname=m7_injection";
 		$conn = new PDO($dsn,'ericperez','42gjuntaros');
 		//"INSERT INTO login(ID,USER,PASSWD) VALUES(3,'eric',SHA('contraseña'));"	
 		$consulta = $conn->prepare("SELECT * FROM login WHERE USER= :user AND PASSWD=SHA2(:password,512);");
 		$consulta-> bindValue(':user', $value1);
 		$consulta-> bindValue(':password', $value2);
 		$consulta-> execute();
 		foreach ($consulta as $key => $value) {
 			print_r($value);
 		}
 		$numero=$consulta->rowCount();
 		if ($numero==1) {
 		 	echo "<br>Hola, $value1";
 		 } 
 		
 		
 	?>
 	

</body>
</html>