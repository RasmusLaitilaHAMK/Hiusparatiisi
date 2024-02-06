<?php
$initials=parse_ini_file("./ht.as.ini");
mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
try{
    $yhteys=mysqli_connect($initials["databaseserver"], $initials["username"], $initials["password"], $initials["database"]);
}
catch(Exception $e){
    header("Location:./virhe.html");
    exit;   
}


//Luetaan lomakkeelta tulleet tiedot funktiolla $_POST
$name=isset($_POST["name"]) ? $_POST["name"] : "";
$pwd=isset($_POST["pwd"]) ? $_POST["pwd"] : "";
$mobile=isset($_POST["mobile"]) ? $_POST["mobile"] : "";


//Jos ei jompaa kumpaa tai kumpaakaan tietoa ole annettu
//if (empty($name) || empty($pwd) || empty($mobile)){
 //  header("Location:./lisaauser.html");
 //  exit;
//}

//Tehdään sql-lause, jossa kysymysmerkeillä osoitetaan paikat
$sql="insert into users (name, pwd, mobile) values(?, ?, ?)";

//Valmistellaan sql-lause
$stmt=mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, 'sss', $name, $pwd, $mobile);
mysqli_stmt_execute($stmt);
mysqli_close($yhteys);
header("Location:./users.php");

?>