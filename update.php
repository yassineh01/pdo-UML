<?php

$servername = "localhost";
$user = "root";
$password = "jouw_wachtwoord";
$dbname = "winkel";
$charset = 'utf8mb4';

$conn = new mysqli($servername, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connectie mislukt: " . $conn->connect_error);
}


$sql = "SELECT * FROM producten LIMIT 1, 1"; 
$result = $conn->query($sql);

$product = $result->fetch_assoc();
$product_id = $product['product_id'];
$product_naam = $product['product_naam'];
$prijs_per_stuk = $product['prijs_per_stuk'];
$omschrijving = $product['omschrijving'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_naam = $_POST["product_naam"];
    $prijs_per_stuk = $_POST["prijs_per_stuk"];
    $omschrijving = $_POST["omschrijving"];

    $sql = "UPDATE producten SET product_naam='$product_naam', prijs_per_stuk='$prijs_per_stuk', omschrijving='$omschrijving' WHERE product_id='$product_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Product succesvol bijgewerkt.<br>";
    } else {
        echo "Fout bij het bijwerken van het product: " . $conn->error . "<br>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Bijwerken</title>
</head>
<body>
    <h2>Bijwerk Product</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="product_naam">Productnaam:</label>
        <input type="text" id="product_naam" name="product_naam" value="<?php echo $product_naam; ?>" required><br><br>

        <label for="prijs_per_stuk">Prijs per stuk:</label>
        <input type="number" id="prijs_per_stuk" name="prijs_per_stuk" value="<?php echo $prijs_per_stuk; ?>" required><br><br>

        <label for="omschrijving">Omschrijving:</label>
        <textarea id="omschrijving" name="omschrijving" required><?php echo $omschrijving; ?></textarea><br><br>

        <input type="submit" value="Bijwerk Product">
    </form>
</body>
</html>
