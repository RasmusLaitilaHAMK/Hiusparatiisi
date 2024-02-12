<?php
session_start();

$name = isset($_SESSION['name']) ? $_SESSION['name'] : 'Default';
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <!--Meta keywords, description, css links and title-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Reach out to us easily through our contacts page. Whether you have questions about our services, want to book an appointment, or inquire about our barbershop, our contact information is just a click away. We're here to assist you in every step towards a fantastic grooming experience. Contact us today!">
    <link rel="stylesheet" href="css/yhteystiedot.css">
    <link rel="stylesheet" href="css/rasmus-style.css">
    
    <title>Yhteystiedot</title>


</head>  
<body>
    
    <!--Header for the page-->
    <header>
        <h1>Hamkin Hiusparatiisi</h1>
    </header>
	 <nav class="login">
        <a href="#">Tervetuloa:<?php print($name)?><br></a>
        <a class="login"><a href="index.html">Kirjaudu ulos</a>
    </nav> <!--First navigation box for the login link-->

    <!--Links to every page-->
    <nav>
        <ul class="top-menu">
            <li><a href="userIn.php">Etusivu</a></li>
            <li><a href="hinnasto2.php">Hinnasto</a></li>
            <li><a href="#">Yhteystiedot</a></li>
	<li><a href="userlist.php">Tyytyväiset asiakkaat</a></li>
        </ul>
    </nav>

    <!--Map image-->
<main class="main-content">
    <p><img id="image" class="aligncenter size-full wp-image-130" src="images/Map2.jpg" alt="" width="660" height="500"/></p>

    <!--Address and phone number-->
<article>
    <h2>Osoite</h2>
    <p>Visamäentie 35 A, 13100 Hämeenlinna</p>

    <h2>Puhelinnumero</h2>
    <p>09 36461</p>
</article>
   
    <!--Displays business hours and days-->
    <h2><a style="text-align: center;"><strong>Aukioloajat</strong></a></h2>
    <table class="table">
    <tr>
        <td><b>Päivä</b></td>
        <td></td>
        <td>Auki</td>
    </tr>
    <tr>
        <td>maanantai:</td>
        <td></td>
        <td>8–16</td>
    </tr>
    <tr>
        <td>tiistai:</td>
        <td></td>
        <td>8–16</td>
    </tr>
    <tr>
        <td>keskiviikko:</td>
        <td></td>
        <td>8–16</td>
    </tr>
    <tr>
        <td>torstai:</td>
        <td></td>
        <td>8–16</td>
    </tr>
    <tr>
        <td>perjantai:</td>
        <td></td>
        <td>8–16</td>
    </tr>
    <tr>
        <td>lauantai:</td>
        <td></td>
        <td>Suljettu</td>
    </tr>
    <tr>
        <td>sunnutai:</td>
        <td></td>
        <td>Suljettu</td>
    </tr>

</table>    
        
        

</main>

<!--Copyrights-->
<footer>
    <a href="http://shell.hamk.fi/~trtkp23_6/">© 2024 Rasmus Laitila, Iiro Käki, Lauri Raatikainen</a>
</footer>
</body>



</html>