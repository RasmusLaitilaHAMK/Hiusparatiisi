<?php
include "userlist2.php";
$name = isset($_SESSION['name']) ? $_SESSION['name'] : 'Default';
$initials = parse_ini_file("./php/muuta/ht.tieto.ini");
mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
try {
    $yhteys = mysqli_connect($initials["dbs"], $initials["user"], $initials["password"], $initials["db"]);
} catch(Exception $e) {
    header("Location:./virhe.html");
    exit;
}

$tulos = mysqli_query($yhteys, "SELECT * FROM users WHERE isAdmin <> 1");

echo "<table border='1'>";
echo "<tr><th>Nimi: </th>";

while ($rivi = mysqli_fetch_object($tulos)) {
    echo "<tr><td>" . $rivi->name ;
}
echo "</table>";

mysqli_close($yhteys);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
            body {
    font-size: 21px;
    display: flex;
    flex-direction: column;
    margin: 10px;
    text-align: center;
    
}
    </style>
</head>
<body>
</body>
<footer>
        <a href="https://github.com/RasmusLaitilaHAMK/Hiusparatiisi">© 2024 Rasmus Laitila, Iiro Käki, Lauri Raatikainen</a>
        <!--Link to github-->
    </footer>
</html>