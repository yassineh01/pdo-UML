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



if (isset($_GET["product_code"])) {
    $product_code = $_GET["product_code"];
    
  
    $sql = "DELETE FROM producten WHERE product_code = '$product_code' LIMIT 1";
    if ($conn->query($sql) === TRUE) {
        echo "Product succesvol verwijderd.";
    } else {
        echo "Fout bij het verwijderen van het product: " . $conn->error;
    }
} else {
    echo "Ongeldige product_code.";
}


$conn->close();
?>
