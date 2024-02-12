<?php
session_start();

$name = isset($_SESSION['name']) ? $_SESSION['name'] : 'Default';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="descripton" content="Explore our transparent and affordable barber pricing. From stylish haircuts to different trims, discover our range of grooming services and their corresponding prices. Get the perfect look without any hidden costs. Check out our barber pricing page and book your appointment today!">
    <link rel="stylesheet" href="css/rasmus-style.css">
    <link rel="stylesheet" href="css/hinnasto.css">

    <title>Hinnasto</title>

</head>
<body>
    <header>
            <!--Hiuskaiedas HAMK otsikko-->

        <h1>Hamkin Hiusparatiisi</h1>
    </header>
 <nav class="login">
        <a href="#">Tervetuloa:<?php print($name)?><br></a>
        <a class="login"><a href="index.html">Kirjaudu ulos</a>
    </nav> <!--First navigation box for the login link-->

    <nav>
        <ul class="top-menu">
            <li><a href="userIn.php">Etusivu</a></li>
            <li><a href="#">Hinnasto</a></li>
            <li><a href="yhteystiedot2.php">Yhteystiedot</a></li>
	<li><a href="userlist.php">Tyytyväiset asiakkaat</a></li>
            <!--csstyylirt-->
        </ul>
    </nav>
    <main>
        <!--tables-->
        <h2>Lyhyet hiukset</h2>
        <table>
            <tr>
                <td><b>Palvelu</b></td>
                <td></td>
                <td>Hinta</td>
            </tr>
            <tr>
                <td>Hiustenleikkuu</td>
                <td></td>
                <td>30€</td>
            </tr>
            <tr>

                <td>Hiustenleikkuu + Pesu</td>
                <td></td>
                <td>38€</td>
            </tr>
            <tr>

                <td>Värjäys</td>
                <td></td>
                <td>70€</td>
            </tr>
            <tr>
                <td>Kiharrus</td>
                <td></td>
                <td>70€</td>
            </tr>

            <tr>
                <td>Kampaus</td>
                <td></td>
                <td>38€</td>
            </tr>
        </table>

        <h2>Pitkät hiukset</h2> 

        <table>
            <tr>
                <td><b>Palvelu</b></td>
                <td>Hinta</td>
            </tr>
            <tr>

                <td>Hiustenleikkuu</td>
                <td>38€</td>
            </tr>
            <tr>

                <td>Hiustenleikkuu + Pesu</td>
                <td>46€</td>
            </tr>
            <tr>
                <td>Värjäys</td>
                <td>90€</td>
            </tr>
            <tr>
                <td>Kiharrus</td>
                <td>90€</td>
            </tr>
            <tr>
                <td>Kampaus</td>
                <td>58€</td>
            </tr>
            <tr>

                <td>Juhlakampaus</td>
                <td>88€</td>
            </tr>

        </table>

    </main>
    <!--footer linkki ja copyright-->

    <footer>
        <a href="http://shell.hamk.fi/~trtkp23_6/">© 2024 Rasmus Laitila, Iiro Käki, Lauri Raatikainen</a>
    </footer>
</body>

</html>