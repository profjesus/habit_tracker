<html>
<head>
	<title>Rexistro</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>
<body>
	<?php
		include './database.php';

		$lectura = "SELECT * FROM Habitos;";
		$habitos = mysqli_query($conn, $lectura);
	?>
	<table class="table">
		<tr>
			<td></td>
			<td>Luns</td>
			<td>Martes</td>
			<td>Mércores</td>
			<td>Xoves</td>
			<td>Venres</td>
		</tr>
		<?php
			while ($hab = mysqli_fetch_array($habitos)) {
				echo "<tr><td>" . $hab['Nome'] . "</td>";
				for ($i=1; $i<=5; $i++) {
					echo "<td><button type=\"button\" class=\"btn btn-light\"><i class=\"far fa-check-circle\"></i></button></td>";
				}
				echo "</tr>";
			}
		?>
	</table>
</body>
</html>
