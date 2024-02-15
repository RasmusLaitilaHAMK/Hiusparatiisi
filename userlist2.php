<?php
session_start();

$name = isset($_SESSION['name']) ? $_SESSION['name'] : 'Default';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/rasmus-style.css">
    <meta name="descripton" content="Experience exceptional grooming at our barber shop. Our skilled barbers offer modern and classic haircuts and grooming services. Step into a welcoming atmosphere where style meets precision. Book your appointment for a fresh look today!">
    <title>HAMK Hiusparatiisi</title>
</head>
<body>
    <!--Hiuskaiedas HAMK tervetuloa-->
    <header>
        <h1>Hamkin Hiusparatiisi</h1>
    </header>
    <nav class="login">
        <a href="#">Tervetuloa:<?php print($name)?><br></a>
        <a class="login"><a href="index.html">Kirjaudu ulos</a>
    </nav> <!--First navigation box for the login link-->
    <nav>
        <ul class="top-menu">
            <li><a href="userIn.php">Etusivu</a></li>
            <li><a href="hinnasto2.php">Hinnasto</a></li>
            <li><a href="yhteystiedot2.php">Yhteystiedot</a></li>
            <li><a href="userlist.php">Tyytyväiset asiakkaat</a></li>

        </ul>
    </nav> <!--The second box for the nav bar-->
</body>
</html>
