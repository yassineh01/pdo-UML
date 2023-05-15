<?php
if (isset($_POST["stuur"])) {
    if (isset($_POST['naam']) && isset($_POST['achternaam']) && isset($_POST['leeftijd']) && isset($_POST['adres']) && isset($_POST['email'])) {
        $naam = $_POST['naam'];
        $achternaam = $_POST['achternaam'];
        $leeftijd = $_POST['leeftijd'];
        $adres = $_POST['adres'];
        $email = $_POST['email'];

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
    <form action="" method="POST">
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

    <!-- post houd de gegevens geheim, Get geeft de informatie en word niet beschermt -->

</body>

</html>