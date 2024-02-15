<?php
$initials = parse_ini_file("./ht.as.ini");
mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);

try {
    $yhteys = mysqli_connect($initials["dbs"], $initials["user"], $initials["password"], $initials["db"]);
} catch (Exception $e) {
    header("Location:./error/virhe.html");
    exit;
}

// Luetaan lomakkeelta tulleet tiedot funktiolla $_POST
$name = isset($_POST["name"]) ? $_POST["name"] : "";
$pwd = isset($_POST["pwd"]) ? $_POST["pwd"] : "";
$mobile = isset($_POST["mobile"]) ? $_POST["mobile"] : "";
$isAdmin = isset($_POST["isAdmin"]) ? $_POST["isAdmin"] : 0;

// Tarkista uniikki mobile ennen lisäystä
$sql_check_unique_mobile = "SELECT ID FROM users WHERE mobile = ?";
$stmt_check_unique_mobile = mysqli_prepare($yhteys, $sql_check_unique_mobile);
mysqli_stmt_bind_param($stmt_check_unique_mobile, 's', $mobile);
mysqli_stmt_execute($stmt_check_unique_mobile);
$tulos_check_unique_mobile = mysqli_stmt_get_result($stmt_check_unique_mobile);

// Tarkista, onko annettu mobile jo käytössä jollain toisella käyttäjällä
if ($rivi_check_unique_mobile = mysqli_fetch_object($tulos_check_unique_mobile)) {
    // Mobile ei ole uniikki, ohjaa virhesivulle
    header("Location:./error/duplicate.html");
    exit;
}

// Tehdään sql-lause, jossa kysymysmerkeillä osoitetaan paikat
$sql = "INSERT INTO users (name, pwd, mobile, isAdmin) VALUES(?, ?, ?, ?)";

// Valmistellaan sql-lause
$stmt = mysqli_prepare($yhteys, $sql);
// Sijoitetaan muuttujat oikeisiin paikkoihin
mysqli_stmt_bind_param($stmt, 'sssi', $name, $pwd, $mobile, $isAdmin); // statement, string string string, int, name, pwd, mobile, isAdmin
// Suoritetaan sql-lause
mysqli_stmt_execute($stmt);
// Suljetaan tietokantayhteys
mysqli_close($yhteys);

header("Location:./users.php");
exit;
?>
