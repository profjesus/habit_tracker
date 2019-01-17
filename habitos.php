<html>
<head>
	<title>Hábitos</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>
	<?php
		// Credenciais base de datos
  		$servername = "localhost";
  		$username = "alan";
  		$password = "turing";

		// Crear conexion MySQL
		$conn = mysqli_connect($servername, $username, $password, "ENIGMA");

		// Comprobar conexion, se falla mostrar erro
		if (!$conn) {
			die('<p>Fallou a conexion coa base de datos: </p>' . mysqli_connect_error());
		}
		echo '<p>Conexión OK!</p>';

		// Crear novo hábito (resposta ao POST)
		if(isset($_POST["nome"])){
			$insert = "INSERT INTO Habitos (Nome) VALUES ('" . $_POST["nome"] . "');";
			$result = mysqli_query($conn, $insert);
			echo $result;
			echo "<p>Hábito " . $_POST["nome"] . " creado</p>";
		}

		// Borrar hábito (resposta ao GET con parámetros)
		if (isset($_REQUEST["borrar"])) {
			$delete = "DELETE FROM Habitos WHERE ID=" . $_REQUEST["borrar"] . ";";
			$result = mysqli_query($conn, $delete);
			echo $result;
			echo "Hábito borrado";
		}
	?>
	<h1>Hábitos</h1>
	<?php
		$lectura = "SELECT * FROM Habitos;";
		$habitos = mysqli_query($conn, $lectura);
		echo "Número de hábitos: " . mysqli_num_rows($habitos) . "<br>";
		while($hab = mysqli_fetch_array($habitos)){
			echo $hab['ID'] . " - " . $hab['Nome'] . " <a href=\"/habitos.php?borrar=" . $hab['ID'] . "\">Borrar</a><br>";
		}
	?>
	<p>Se precisas axuda, le <a href="https://habitualmente.com/pasos-para-cambiar-de-habitos/">isto</a>.</p>
	<form name="habito" method="post" action="/habitos.php">
		<input type="text" id="nome" name="nome">
		<button id="gardar" type="submit">Gardar</button>
	</form>	
</body>
</html>
