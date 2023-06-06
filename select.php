<?php
$host = 'localhost';
$db   = 'winkels';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$pdo = new PDO($dsn, $user, $pass);

// Deel 1
$selectQuery = "SELECT * FROM producten";
$stmt = $pdo->query($selectQuery);
$selecteren = $stmt->fetchAll();

foreach ($selecteren as $select) {
    echo "Product code: " . $select["product_code"] . ' ||| ';
    echo "Product naam: " . $select["product_naam"] . ' ||| ';
    echo "Product prijs: " . $select["prijs_per_product"] . ' ||| ';
    echo "Product beschrijving: " . $select["omschrijving"] . "<br>";
}

// Deel 2
$select2 = "SELECT * FROM producten WHERE product_code = 1";
$stmt2 = $pdo->query($select2);
$selecteren2 = $stmt2->fetchAll();

foreach ($selecteren2 as $select1) {
    echo "Product code: " . $select1["product_code"] . ' ||| ';
    echo "Product naam: " . $select1["product_naam"] . ' ||| ';
    echo "Product prijs: " . $select1["prijs_per_product"] . ' ||| ';
    echo "Product beschrijving: " . $select1["omschrijving"] . "<br>";
}

// Deel 3
$select3 = "SELECT * FROM producten WHERE product_code = 3";
$stmt3 = $pdo->query($select3);
$selecteren3 = $stmt3->fetchAll();

foreach ($selecteren3 as $select2) {
    echo "Product code: " . $select2["product_code"] . ' ||| ';
    echo "Product naam: " . $select2["product_naam"] . ' ||| ';
    echo "Product prijs: " . $select2["prijs_per_product"] . ' ||| ';
    echo "Product beschrijving: " . $select2["omschrijving"] . "<br>";
}
?>
