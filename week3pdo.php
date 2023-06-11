<?php

$servername = "localhost";
$user = "root";
$password = "";
$dbname = "winkel";
$charset = 'utf8mb4';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connectie mislukt: " . $e->getMessage());
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_naam = $_POST["product_naam"];
    $prijs_per_stuk = $_POST["prijs_per_stuk"];
    $omschrijving = $_POST["omschrijving"];

    try {
    
        $stmt = $conn->prepare("INSERT INTO producten (product_naam, prijs_per_stuk, omschrijving)
                               VALUES (:product_naam, :prijs_per_stuk, :omschrijving)");

      
        $stmt->bindParam(':product_naam', $product_naam);
        $stmt->bindParam(':prijs_per_stuk', $prijs_per_stuk);
        $stmt->bindParam(':omschrijving', $omschrijving);

        $stmt->execute();

        echo "Product succesvol toegevoegd.<br>";
    } catch (PDOException $e) {
        echo "Fout bij het toevoegen van het product: " . $e->getMessage() . "<br>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Toevoegen</title>
</head>
<body>
    <h2>Voeg een product toe</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="product_naam">Productnaam:</label>
        <input type="text" id="product_naam" name="product_naam" required><br><br>

        <label for="prijs_per_stuk">Prijs per stuk:</label>
        <input type="number" id="prijs_per_stuk" name="prijs_per_stuk" required><br><br>

        <label for="omschrijving">Omschrijving:</label>
        <textarea id="omschrijving" name="omschrijving" required></textarea><br><br>

        <input type="submit" value="Voeg Product Toe">
    </form>
</body>
</html>
