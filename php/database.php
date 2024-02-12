<?php
$initials=parse_ini_file("./muuta/ht.tieto.ini");
mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
try{
    //   $yhteys=mysqli_connect($initials["databaseserver"], $initials["username"], $initials["password"], $initials["database"]);
    $yhteys = mysqli_connect($initials["dbs"], $initials["user"], $initials["password"], $initials["db"]);
    }
    catch(Exception $e){
        header("Location:./muuta/yhteysvirhe.html");
        exit;
    }
$name=isset($_POST["name"]) ? $_POST["name"] : 0;
$pwd=isset($_POST["pwd"]) ? $_POST["pwd"] : 0;
$mobile=isset($_POST["mobile"]) ? $_POST["mobile"] : 0;
$isAdmin=isset($_POST["isAdmin"]) ? $_POST["isAdmin"] : 0;
if ($name == $initials["admin"] && $pwd == $initials["adminpwd"] && $mobile == $initials["adminmobile"]) {   
    $isAdmin = 1; 
}

$sql="INSERT INTO users (name, pwd, mobile, isAdmin) VALUES(?, ?, ?, ?)";

//Valmistellaan sql-lause
$stmt=mysqli_prepare($yhteys, $sql);
//Sijoitetaan muuttujat oikeisiin paikkoihin
mysqli_stmt_bind_param($stmt, 'sssi', $name, $pwd, $mobile, $isAdmin); //statement, string string string, int, name, pwd, mobile, isAdmin
//Suoritetaan sql-lause
mysqli_stmt_execute($stmt);
//Suljetaan tietokantayhteys
mysqli_close($yhteys);

header("Location: ../index.html");
exit;
?>