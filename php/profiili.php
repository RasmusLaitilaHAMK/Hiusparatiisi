<?php
session_start();

// Tarkista, onko käyttäjä kirjautunut sisään
if (!isset($_SESSION['name'])) {
    header("Location:../kirjautuminen.html"); // Ohjaa kirjautumissivulle, jos käyttäjä ei ole kirjautunut
    exit;
}

// Yhdistä tietokantaan
$initials = parse_ini_file("./muuta/ht.tieto.ini");
$yhteys = mysqli_connect($initials["dbs"], $initials["user"], $initials["password"], $initials["db"]);
if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error()); // Lopeta, jos tietokantayhteys epäonnistuu
}

// Haetaan käyttäjän tiedot tietokannasta
$sql = "SELECT * FROM users WHERE name = ?";
$stmt = mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, 's', $_SESSION['name']);
mysqli_stmt_execute($stmt);
$tulos = mysqli_stmt_get_result($stmt);
$kayttaja = mysqli_fetch_assoc($tulos);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>Profiilisivu</title>
</head>
<body>
   
    
    <h1>Tervetuloa <?php echo $_SESSION['name']; ?>!</h1>
    
    <h2>Omat tiedot:</h2>
    <!-- Näytä käyttäjän tiedot -->
    <p>Käyttäjänimi: <?php echo $kayttaja['name']; ?></p>
    <p>Puhelin: <?php echo $kayttaja['mobile']; ?></p>
    
    <p><a class="login"><a href="../index.html">Kirjaudu ulos</a>
</p>
</body>
</html>

<?php
// Sulje tietokantayhteys
mysqli_close($yhteys);
?>
