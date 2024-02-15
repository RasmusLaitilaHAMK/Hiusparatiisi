<?php
$initials = parse_ini_file("./ht.as.ini");
mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);

try {
    $yhteys = mysqli_connect($initials["dbs"], $initials["user"], $initials["password"], $initials["db"]);
} catch (Exception $e) {
    header("Location:./error/virhe.html");
    exit;
}

//Jos ei jompaa kumpaa tai kumpaakaan tietoa ole annettu ohjataan pyyntö takaisin lomakkeelle
if (empty($_POST["name"]) || empty($_POST["pwd"])) {
    header("Location:./error/tyhja.html");
    exit;
}

$sql_update_user = "UPDATE users SET name=?, pwd=?, mobile=? WHERE ID=?";
    $stmt_update_user = mysqli_prepare($yhteys, $sql_update_user);
    mysqli_stmt_bind_param($stmt_update_user, 'sssi', $name, $pwd, $mobile, $muokattava);
    mysqli_stmt_execute($stmt_update_user);

    // Suljetaan tietokantayhteys
    mysqli_close($yhteys);

    // Ohjaa takaisin users.php-sivulle
    header("Location: ./error/duplicate.html");
    exit;

$name = isset($_POST["name"]) ? $_POST["name"] : "";
$pwd = isset($_POST["pwd"]) ? $_POST["pwd"] : "";
$mobile = isset($_POST["mobile"]) ? $_POST["mobile"] : "";
$ID = isset($_POST["ID"]) ? $_POST["ID"] : "";

//joihin laitetaan muuttujien arvoja
$sql = "UPDATE users SET name=?, pwd=?, mobile=? WHERE ID=?";

//Valmistellaan sql-lause
$stmt = mysqli_prepare($yhteys, $sql);

//Sijoitetaan muuttujat oikeisiin paikkoihin
//EI SDI STRING DOUBLE INGEGER VAAN SSD, STRING STRING DOUBLE!!!!!!
mysqli_stmt_bind_param($stmt, 'sssi', $name, $pwd, $mobile, $ID);

//Suoritetaan sql-lause
mysqli_stmt_execute($stmt);

//Suljetaan tietokantayhteys
mysqli_close($yhteys);

header("Location:./users.php");
?>
