<?php
session_start();

// Tarkista, onko k�ytt�j� kirjautunut sis��n
if (!isset($_SESSION['user_id'])) {
    // Jos ei, ohjaa k�ytt�j� kirjautumissivulle
    header("Location: login.php");
    exit();
}

// Yhdist� tietokantaan
$servername = "localhost";
$username = "k�ytt�j�nimi";
$password = "salasana";
$dbname = "web_trtkp23_6";

$connection = new mysqli($servername, $username, $password, $dbname);

// Tarkista yhteys
if ($connection->connect_error) {
    die("Yhteysvirhe: " . $connection->connect_error);
}

// Hae k�ytt�j�n tiedot
$user_id = $_SESSION['user_id'];
$sql = "SELECT nimi, puhelinnumero FROM users WHERE id = $user_id";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    // Tulosta k�ytt�j�n tiedot
    $row = $result->fetch_assoc();
    echo "Nimi: " . $row["nimi"] . "<br>";
    echo "Puhelinnumero: " . $row["puhelinnumero"] . "<br>";
} else {
    echo "K�ytt�j�tietoja ei l�ytynyt";
}

// Sulje tietokantayhteys
$connection->close();
?>