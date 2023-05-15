<?php
if (isset($_GET["stuur"])) {
    if (isset($_GET['naam']) && isset($_GET['achternaam']) && isset($_GET['leeftijd']) && isset($_GET['adres']) && isset($_GET['email'])) {
        $naam = $_GET['naam'];
        $achternaam = $_GET['achternaam'];
        $leeftijd = $_GET['leeftijd'];
        $adres = $_GET['adres'];
        $email = $_GET['email'];

        echo "<p>Naam: $naam</p>";
        echo "<p>Achternaam: $achternaam</p>";
        echo "<p>Leeftijd: $leeftijd</p>";
        echo "<p>Adres: $adres</p>";
        echo "<p>Email: $email</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>pdo Opdracht 1</title>
</head>

<body>
    <form action="" method="get">
        <label for="naam">Naam:</label>
        <input type="text" id="naam" name="naam" required><br><br>

        <label for="achternaam">Achternaam:</label>
        <input type="text" id="achternaam" name="achternaam" required><br><br>

        <label for="leeftijd">Leeftijd:</label>
        <input type="number" id="leeftijd" name="leeftijd" required><br><br>

        <label for="adres">Adres:</label>
        <input type="text" id="adres" name="adres" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <input type="submit" name="stuur" value="Verzenden">
    </form>

</body>

</html>