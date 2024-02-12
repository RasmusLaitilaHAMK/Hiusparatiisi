<?php
$initials=parse_ini_file("./ht.as.ini");
mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
try{
    $yhteys = mysqli_connect($initials["dbs"], $initials["user"], $initials["password"], $initials["db"]);
}
catch(Exception $e){
    header("Location:./error/virhe.html");
    exit;   
}


//Luetaan lomakkeelta tulleet tiedot funktiolla $_POST
$name=isset($_POST["name"]) ? $_POST["name"] : "";
$pwd=isset($_POST["pwd"]) ? $_POST["pwd"] : "";
$mobile=isset($_POST["mobile"]) ? $_POST["mobile"] : "";
$isAdmin=isset($_POST["isAdmin"]) ? $_POST["isAdmin"] : 0;


//Jos ei jompaa kumpaa tai kumpaakaan tietoa ole annettu
//if (empty($name) || empty($pwd) || empty($mobile)){
 //  header("Location:./lisaauser.html");
 //  exit;
//}

//Tehdään sql-lause, jossa kysymysmerkeillä osoitetaan paikat
$sql="INSERT INTO users (name, pwd, mobile, isAdmin) VALUES(?, ?, ?, ?)";

//Valmistellaan sql-lause
$stmt=mysqli_prepare($yhteys, $sql);
//Sijoitetaan muuttujat oikeisiin paikkoihin
mysqli_stmt_bind_param($stmt, 'sssi', $name, $pwd, $mobile, $isAdmin); //statement, string string string, int, name, pwd, mobile, isAdmin
//Suoritetaan sql-lause
mysqli_stmt_execute($stmt);
//Suljetaan tietokantayhteys
mysqli_close($yhteys);
header("Location:./users.php");
exit;
?>