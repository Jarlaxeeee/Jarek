<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
  <style>
    
    body {
      background-color: #222;
      color: #ffffff;
      font-family: Arial, sans-serif;
    }
    
    label, select {
      color: #ccc;
    }
    
    input[type="submit"] {
      background-color:#cfc134;
      color: #68686c;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      transition:  0.2s;
    }
    
    input[type="submit"]:hover {
      background-color: #009000;
    }
    
    table {
      border-collapse: collapse;
      margin-top: 20px;
      width: 100%;
    }
    
    th, td {
      padding: 10px;
      border: 1px solid #444;
    }
    
    th {
      background-color: #cfc134;
      color: #060c00;
    }
    
    tr:nth-child(even) {
      background-color: #68686c ;
    }
      
           .nagłowek{
            width: 200px;
            height: 200px;
            display:block;
            margin:auto;
        }
        </style>
        </head>
	<title>Moja strona</title>
    <form>
        <header>
            <img class="nagłowek" src="obrazek.jpg" alt="Nagłówek strony">
</header>

  <label for="kryterium1">Wybierz kryterium 1:</label>
  <select id="kryterium1" name="kryterium1">
    <option value="opcja1">Opcja 1</option>
    <option value="opcja2">Opcja 2</option>
    <option value="opcja3">Opcja 3</option>
  </select>
  
  <br>
  
  <label for="kryterium2">Wybierz kryterium 2:</label>
  <select id="kryterium2" name="kryterium2">
    <option value="opcjaA">Opcja A</option>
    <option value="opcjaB">Opcja B</option>
    <option value="opcjaC">Opcja C</option>
  </select>
  
  <br>
  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;     
  <input type="submit" value="Wyślij">
</form>

</head>
<body>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "motory";



$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT motory.Nazwa, motory.Cz_wystepowania, typy.typ
FROM motory
INNER JOIN typy ON motory.Typ = typy.Id_typu
WHERE motory.Cz_wystepowania > 0 AND typy.typ = 'Yamaha'
ORDER BY motory.Nazwa ASC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    echo "<table><tr><th>Nazwa</th><th>Częstotliwość występowania</th><th>Typ</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Nazwa"]."</td><td>".$row["Cz_wystepowania"]."</td><td>".$row["typ"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "Brak wyników";
}

$conn->close();
?>

	<header>
		<nav>
			<ul>
				<li><a href="strona1.php">Strona 1</a></li>
				<li><a href="strona2.php">Strona 2</a></li>
				<li><a href="stroona3.php">Strona 3</a></li>
			</ul>
		</nav>
	</header>
	<main>
		<section>
			<h1>Witaj na mojej stronie</h1>
			<p>Tutaj znajdziesz wiele interesujących informacji.</p>
		</section>
	</main>
	<footer>
		<p>Jarek Tomczyk 2D gr1</p>
	</footer>
</body>
</html>
