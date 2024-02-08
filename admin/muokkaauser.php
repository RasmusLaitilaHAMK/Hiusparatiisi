
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Muokkaa</title>
    <link rel="stylesheet" href="admin.css">

</head>
<body>

</body>
</html>
<?php

$muokattava=isset($_GET["muokattava"]) ? $_GET["muokattava"]  : "";

//Jos tietoa ei ole annettu, palataan listaukseen
if (empty($muokattava)){
    header("Location:./virhe.html");
    exit;
}
$initials=parse_ini_file("./ht.as.ini");
mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
try{
    $yhteys = mysqli_connect($initials["dbs"], $initials["user"], $initials["password"], $initials["db"]);
}

catch(Exception $e){
    header("Location:./virhe.html");
    exit;
}

$sql="select * from users where ID=?";
$stmt=mysqli_prepare($yhteys, $sql);
//Sijoitetaan muuttuja sql-lauseeseen
mysqli_stmt_bind_param($stmt, 'i', $muokattava);
//Suoritetaan sql-lause
mysqli_stmt_execute($stmt);
//Koska luetaan prepared statementilla, tulos haetaan 
//metodilla mysqli_stmt_get_result($stmt);
$tulos=mysqli_stmt_get_result($stmt);
if (!$rivi=mysqli_fetch_object($tulos)){
    header("Location:../html/tietuettaeiloydy.html");
    exit;
}
?>

<!-- Lomake tavallisena html-koodina php tagien ulkopuolella -->
<!-- Lomake sisältää php-osuuksia, joilla tulostetaan syötekenttiin luetun tietueen tiedot -->
<!-- id-kenttä on readonly, koska sitä ei ole tarkoitus muuttaa -->

<form action='./paivitauser.php' method='post'>
    <p>ID: <span><?php echo $rivi->ID; ?></span></p>
    <input type='hidden' name='ID' value='<?php echo $rivi->ID; ?>'>
    <p>name: <input type='text' name='name' value='<?php echo $rivi->name; ?>'></p>
    <p>password: <input type='text'minlength="8" name='pwd' value='<?php echo $rivi->pwd; ?>'></p>
    <p>mobile: <input type='text' minlength="10" maxlength="10" name='mobile' value='<?php echo $rivi->mobile; ?>'></p>

    <input type='submit' name='Päivitä' value='Päivitä'><br>
</form>



<!-- loppuun uusi php-osuus -->
<?php
//Suljetaan tietokantayhteys
mysqli_close($yhteys);
?>