<?php
include "users.html";
$initials = parse_ini_file("./ht.as.ini");
mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
try {
    $yhteys = mysqli_connect($initials["databaseserver"], $initials["name"], $initials["password"], $initials["database"]);
} catch(Exception $e) {
    header("Location:./virhe.html");
    exit;
}

$tulos = mysqli_query($yhteys, "SELECT * FROM users WHERE isAdmin <> 1");

echo "<table border='1'>";
echo "<tr><th>ID</th><th>Name</th><th>Password</th><th>Phone Number</th><th>Actions</th></tr>";

while ($rivi = mysqli_fetch_object($tulos)) {
    echo "<tr><td>" . $rivi->ID . "</td><td>" . $rivi->name . "</td><td>" . $rivi->pwd . "</td><td>" . $rivi->mobile . "</td><td><a href='./poistauser.php?poistettava=" . $rivi->ID . "'>Poista</a> <a href='./muokkaauser.php?muokattava=" . $rivi->ID . "'>Muokkaa</a></td></tr>";
}

echo "</table>";
include "adminfooter.html";

mysqli_close($yhteys);
?>
