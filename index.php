<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "winkel";
$charset = 'utf8mb4';

$conn = new mysqli($host, $user, $pass, $db);


if ($conn->connect_error) {
    die("Connectie mislukt: " . $conn->connect_error);
} else {
    echo "Verbinding met de database is succesvol tot stand gebracht.";
}



$sql = "SELECT * FROM producten ORDER BY naam";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Productnaam</th><th>Prijs</th><th>Actie</th></tr>";
  
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["naam"]."</td>";
        echo "<td>".$row["prijs"]."</td>";
        echo "<td><a href='delete.php?product_code=".$row["product_code"]."'>Verwijder</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Geen producten gevonden.";
}


$conn->close();
?>
