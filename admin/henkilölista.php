<?php
$initials=parse_ini_file("./ht.tieto.ini");
mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
try{
    $yhteys=mysqli_connect($initials["databaseserver"], $initials["username"], $initials["password"], $initials["database"]);}
catch(Exception $e){
    header("Location:../php/muuta/yhteysvirhe.html");
    exit;
}
include "muuta/header.html";
$numero=1;
$tulos=mysqli_query($yhteys, "select * from user");
while ($rivi=mysqli_fetch_object($tulos)){
    print "$numero. $rivi->etunimi $rivi->sukunimi <a href='./mods/remuser.php?poistettava=$rivi->id'>Poista</a> <a href='./mods/moduser.php?muokattava=$rivi->id'>Muokkaa</a></p>";
    $numero=$numero+1;
}
mysqli_close($yhteys);
include "muuta/footer.html";
?>
