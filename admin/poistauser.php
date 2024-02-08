<?php
$initials=parse_ini_file("./ht.as.ini");
mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
try{
    $yhteys = mysqli_connect($initials["dbs"], $initials["user"], $initials["password"], $initials["db"]);
}

catch(Exception $e){
    header("Location:./virhe.html");
    exit;
}

$poistettava=isset($_GET["poistettava"]) ? $_GET["poistettava"] : "";

//Jos tieto on annettu, poistetaan kala tietokannasta
if (!empty($poistettava)){
    $sql="delete from users where ID=?";
    $stmt=mysqli_prepare($yhteys, $sql);
    //Sijoitetaan muuttuja sql-lauseeseen
    mysqli_stmt_bind_param($stmt, 'i', $poistettava);
    //Suoritetaan sql-lause
    mysqli_stmt_execute($stmt);
}   
//Suljetaan tietokantayhteys
mysqli_close($yhteys);
//ja ohjataan pyyntö takaisin listaukseen
header("Location:./users.php");
exit;
?>