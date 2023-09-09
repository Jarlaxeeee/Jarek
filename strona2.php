<!DOCTYPE html>
<html lang="pl">

<head>
	<title>Strona 2</title>
	<style>
		body {
			margin: 0;
			padding: 0;
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
		}
		header {
			background-color: #cfc134;
			color: #fff;
			padding: 20px;
		}
		nav ul {
			margin: 0;
			padding: 0;
			list-style-type: none;
			display: flex;
			align-items: center;
			justify-content: flex-end;
		}
		nav li {
			margin-left: 20px;
		}
		nav a {
			color: #151305;
			text-decoration: none;
			font-size: 18px;
			transition: color 0.3s ease-in-out;
		}
		nav a:hover {
			color: #ccc;
		}
		main {
			padding: 20px;
		}
		section {
			background-color: #cfc134;
			padding: 20px;
			box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
		}
		h1 {
			font-size: 32px;
			margin-top: 0;
		}
		p {
			font-size: 18px;
			line-height: 1.5;
			margin-bottom: 20px;
		}
		.average {
			margin-top: 20px;
			font-size: 24px;
			font-weight: bold;
		}
	</style>
</head>
<body>
	<header>
		<nav>
			<ul>
				<li><a href="index.php">Strona główna</a></li>
				<li><a href="strona1.php">Strona 1</a></li>
				<li><a href="strona2.php">Strona 3</a></li>
			</ul>
		</nav>
	</header>
	<main>
		<section>
			<h1>Strona 2</h1>
			
			<div class="average">
				<?php
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "motory";

					$conn = new mysqli($servername, $username, $password, $dbname);

					if ($conn->connect_error) {
					  die("Connection failed: " . $conn->connect_error);
					}

					$sql = "SELECT * FROM `motory` WHERE `Nazwa` LIKE '%Yamaha%'";

					$result = $conn->query($sql);

					$sum = 0;
					$count = 0;

					if ($result->num_rows > 0) {
					  while($row = $result->fetch_assoc()) {
					    if ($row["Cz_wystepowania"] > 0) {
					      $sum += $row["Cz_wystepowania"];
					      $count++;
					    }
					  }
					}

					$average = $sum / $count;

					echo "Średnia wartość Cz_wystepowania dla motorów typu Yamaha wynosi: " . $average;

					$conn->close();
				?>
			</div>
		</section>
	</main>
