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
        <a href="./php/profiili.php">Tervetuloa:<?php print($name)?><br></a>
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
    <picture>
        <img id="image" src="images/kampaamo.jpg" alt="Kuva katos" width="660" height="500" title="https://www.flickr.com/photos/73265016@N00/1593870052"> <!--The source for this picture-->
    </picture>
    <article>
        <br>
        <h2>Tervetuloa HAMKin Hiusparatiisiin!</h2>
            <p>HAMKin Hiusparatiisi on nuorekas parturi-kampaamo Hämeenlinnassa. HAMKin Hiusparatiisi on toiminut jo vuodesta 2024.</p>
            <p>Teitä palvelevat alansa ammattilaiset Rasmus, Iiro ja Lauri.</p>
            <p>Meiltä saat parturi-kampaamopalvelut laajasti niin arkeen kuin juhlaan. Olemme auki Ma - Pe 8:00-16:00</p>
            <p>Tervetuloa!</p>
        <!--Introduction-->
            <img id="image2" src="images/2065072220_b34caec003_b.jpg" alt="Hiuksiatähän" title="The Hairmasters">
    </article>
    <footer>
        <a href="https://github.com/RasmusLaitilaHAMK/Hiusparatiisi">© 2024 Rasmus Laitila, Iiro Käki, Lauri Raatikainen</a>
        <!--Link to github-->
    </footer>
</body>
</html>
