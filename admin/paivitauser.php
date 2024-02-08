<?php
//Luetaan lomakkeelta tulleet tiedot funktiolla $_POST
//jos syötteet ovat olemassa

$ID = isset($_POST["ID"]) ? $_POST["ID"] : "";
$name = isset($_POST["name"]) ? $_POST["name"] : "";
$pwd = isset($_POST["pwd"]) ? $_POST["pwd"] : "";
$mobile = isset($_POST["mobile"]) ? $_POST["mobile"] : "";


//Jos ei jompaa kumpaa tai kumpaakaan tietoa ole annettu
//ohjataan pyyntö takaisin lomakkeelle
//if  (empty($name) || empty($pwd)){
 //   header("Location:../virhe.html");
 //   exit;

    //(empty($ID) || empty($mobile)
//}
$initials=parse_ini_file("./ht.as.ini");
mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
try{
    $yhteys=mysqli_connect($initials["dbs"], $initials["username"], $initials["password"], $initials["db"]);}

catch(Exception $e){
    header("Location:./virhe.html");
    exit;
}

//joihin laitetaan muuttujien arvoja
$sql = "UPDATE users SET name=?, pwd=?, mobile=? WHERE ID=?";

//Valmistellaan sql-lause
$stmt=mysqli_prepare($yhteys, $sql);
//Sijoitetaan muuttujat oikeisiin paikkoihin

//EI SDI STRING DOUBLE INGEGER VAAN SSD, STRING STRING DOUBLE!!!!!!
mysqli_stmt_bind_param($stmt, 'sssi', $name, $pwd, $mobile, $ID);//Suoritetaan sql-lause
mysqli_stmt_execute($stmt);
//Suljetaan tietokantayhteys
mysqli_close($yhteys);

header("Location:./users.php");

?>