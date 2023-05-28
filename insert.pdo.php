
<?php

$host = 'Localhost';
$db  = 'winkel';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
 PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
 PDO::ATTR_EMULATE_PREPARES => false,
];
try {
$pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
 throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Producten toevoegen</title>

</head>

<body>
 <?php
 $naam = isset($_POST["naam"]) ? $_POST["naam"] : "";
 $prijs = isset($_POST["prijs"]) ? $_POST["prijs"] : "";
 $omschrijving = isset($_POST["omschrijving"]) ? $_POST["omschrijving"] : "";
 $bericht = "<p style='color:green'>Je product is toegevoegt</p>";
if (isset($_POST["Toevoegen"])) {
 $sql = "INSERT INTO producten (product_naam, prijs_per_product, omschrijving) VALUES (:product_naam,:prijs_per_product,:omschrijving)";
 $stmt = $pdo->prepare($sql);
 $stmt->execute([ "product_naam" => $naam,"prijs_per_product" => $prijs,"omschrijving" => $omschrijving]);
if (isset($bericht)) { echo $bericht; }
}
 ?>
 <form action="" method="post"><br><label for="naam">Product naam:</label>
<input type="text" name="naam" required><br><br>
<label for="prijs">Product prijs:</label>
 <input type="number" name="prijs" step="any" required><br><br>
<label for="omschrijving">Product omschrijving:</label>
<input type="text" name="omschrijving" required><br><br>
<input type="submit" name="Toevoegen" value="Toevoegen">
</form>
</body>
</html>





