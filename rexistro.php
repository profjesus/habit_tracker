<html>
<head>
	<title>Rexistro</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>
<body>
	<?php
		include './database.php';

		$lectura = "SELECT * FROM Habitos ORDER BY Nome;";
		$habitos = mysqli_query($conn, $lectura);
		$lerexistro = "SELECT * FROM Rexistro INNER JOIN Habitos ON Rexistro.id_habito = Habitos.ID WHERE Rexistro.dia >= CURDATE() - INTERVAL 4 DAY ORDER BY Habitos.Nome, Rexistro.dia;";
		$valores = mysqli_query($conn, $lerexistro);
	?>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="#">Habit Tracker</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav">
		  <li class="nav-item">
		    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="habitos.php">Hábitos</a>
		  </li>
		  <li class="nav-item active">
		    <a class="nav-link" href="#">Rexistro</a>
		  </li>
		</ul>
	  </div>
	</nav>
	<table class="table">
		<tr>
			<td></td>
			<?php
				$hoxe = mktime(0,0,0);
				$datas = [];
				for ($dias=4;$dias>=0;$dias--) {
					echo "<td>" . date('j/n/Y', $hoxe-$dias*24*60*60) . "</td>";
					$datas[] = date('Y-m-d', $hoxe-$dias*24*60*60);
				}
			?>
		</tr>
		<?php
			$valor = mysqli_fetch_array($valores);
			while ($hab = mysqli_fetch_array($habitos)) {
				echo "<tr><td>" . $hab['Nome'] . "</td>";
				if ($valor['ID'] != $hab['ID']) {
					for ($i=1; $i<=5; $i++) {
						echo "<td><button type=\"button\" class=\"btn btn-light\"><i class=\"far fa-circle\"></i></button></td>";
					}
				} else {
					foreach ($datas as $data) {
						if ($valor['dia'] == $data) {
							if ($valor['valor'] == 0) {
								echo "<td><i class=\"fas fa-times-circle\"></i></td>";
							} else {
								echo "<td><i class=\"fas fa-check-circle\"></i></td>";
							}
							$valor = mysqli_fetch_array($valores);
						} else {
							echo "<td><button type=\"button\" class=\"btn btn-light\"><i class=\"far fa-circle\"></i></button></td>";
						}
					}
				}
				echo "</tr>";
			}
		?>
	</table>
</body>
</html>
