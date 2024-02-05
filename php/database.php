<?php
$initials=parse_ini_file("./muuta/ht.tieto.ini");
mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
try{
    $yhteys=mysqli_connect($initials["databaseserver"], $initials["username"], $initials["password"], $initials["hiusparatiisi"]);}
catch(Exception $e){
    header("Location:./muuta/yhteysvirhe.html");
    exit;
}
$name=isset($_POST["name"]) ? $_POST["name"] : 0;
$pwd=isset($_POST["pwd"]) ? $_POST["pwd"] : 0;
$pwd=isset($_POST["mobile"]) ? $_POST["mobile"] : 0;

$sql="insert into user (name, pwd) values(?, ?)";

//Valmistellaan sql-lause
$stmt=mysqli_prepare($yhteys, $sql);
//Sijoitetaan muuttujat oikeisiin paikkoihin
mysqli_stmt_bind_param($stmt, 'sss', $name, $pwd, $mobile); //statement, string string, name, pwd
//Suoritetaan sql-lause
mysqli_stmt_execute($stmt);
//Suljetaan tietokantayhteys
mysqli_close($yhteys);

header("Location:../index.html");
exit;
?>