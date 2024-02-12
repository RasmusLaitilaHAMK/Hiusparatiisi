<?php
session_start();

// Tarkista, onko käyttäjä kirjautunut sisään
if (!isset($_SESSION['user_id'])) {
    // Jos ei, ohjaa käyttäjä kirjautumissivulle
    header("Location: login.php");
    exit();
}

// Yhdistä tietokantaan
$servername = "localhost";
$username = "käyttäjänimi";
$password = "salasana";
$dbname = "web_trtkp23_6";

$connection = new mysqli($servername, $username, $password, $dbname);

// Tarkista yhteys
if ($connection->connect_error) {
    die("Yhteysvirhe: " . $connection->connect_error);
}

// Hae käyttäjän tiedot
$user_id = $_SESSION['user_id'];
$sql = "SELECT nimi, puhelinnumero FROM users WHERE id = $user_id";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    // Tulosta käyttäjän tiedot
    $row = $result->fetch_assoc();
    echo "Nimi: " . $row["nimi"] . "<br>";
    echo "Puhelinnumero: " . $row["puhelinnumero"] . "<br>";
} else {
    echo "Käyttäjätietoja ei löytynyt";
}

// Sulje tietokantayhteys
$connection->close();
?>