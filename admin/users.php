<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="descripton" content="Experience exceptional grooming at our barber shop. Our skilled barbers offer modern and classic haircuts and grooming services. Step into a welcoming atmosphere where style meets precision. Book your appointment for a fresh look today!">
    <title>(ADMIN) HAMK Hiusparatiisi</title>
</head>
<body>
    <!--Hiuskaiedas HAMK tervetuloa-->
    <header>
        <h1> (ADMIN) Hamkin Hiusparatiisi</h1>
    </header>
    <?php
$initials=parse_ini_file("./ht.as.ini");
mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
try{
    $yhteys=mysqli_connect($initials["databaseserver"], $initials["username"], $initials["password"], $initials["database"]);}
catch(Exception $e){
    header("Location:../php/muuta/yhteysvirhe.html");
    exit;
}
//include ".html";
$numero=1;
$tulos = mysqli_query($yhteys, "SELECT * FROM users WHERE isAdmin <> 1");
while ($rivi=mysqli_fetch_object($tulos)){
    print "$numero. $rivi->ID $rivi->name $rivi->pwd $rivi->mobile <a href='./poistauser.php?poistettava=$rivi->ID'>Poista</a> <a href='./muokkaauser.php?muokattava=$rivi->ID'>Muokkaa</a></p>";
    $numero=$numero+1;
}
mysqli_close($yhteys);
//include ".html";
?>
    
    <footer>
        <a href="https://github.com/RasmusLaitilaHAMK/WebDevTeam6">© 2024 Rasmus Laitila, Iiro Käki, Lauri Raatikainen</a>
        <!--Link to github-->
    </footer>
</body>
</html>
