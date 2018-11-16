<!DOCTYPE html>
<html>
<head>
	<title>Pagina2</title>
</head>
<body>
<?php
 	$value =$_POST["Countries"] ;
 	echo $value;
 		$conn = mysqli_connect('localhost','ericperez','42gjuntaros');
 		mysqli_select_db($conn, 'world');
 		$consulta = "SELECT distinct(ci.Name) as City, co.Name as Country FROM country co, city ci WHERE ci.CountryCode=co.Code AND  '$value' =ci.CountryCode";
 		$resultat = mysqli_query($conn, $consulta);
 		if (!$resultat) {
     			$message  = 'Consulta invàlida: ' . mysqli_error() . "\n";
     			$message .= 'Consulta realitzada: ' . $consulta;
     			die($message);
 		}
 	?>

 	<table>

 	<thead><td colspan="4" align="center" bgcolor="cyan">Llistat de ciutats</td></thead>
 	<?php
 		while( $registre = mysqli_fetch_assoc($resultat) )
 		{
 			echo "\t<tr>\n";
 			echo "\t\t<td>".$registre["City"]."</td>\n";
 			echo "\t\t<td>".$registre['Country']."</td>\n";
 			echo "\t</tr>\n";
 		}

 		
 	?>
 	</table>	
	

</body>
</html>