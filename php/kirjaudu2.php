<?php
session_start();
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'trtkp23_6';
$DATABASE_PASS = 'AQP8stCZ';
$DATABASE_NAME = 'web_trtkp23_6';

// Yrit� yhdist�� tietokantaan k�ytt�en annettuja tietoja.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    // Jos yhteysvirhe, lopeta skripti ja n�yt� virhe.
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Tarkistetaan, onko kirjautumislomakkeelta saatu data.
if (!isset($_POST['name'], $_POST['pwd'])) {
    // Tietoja puuttuu, ohjataan takaisin kirjautumissivulle.
    exit('Please fill both the username and password fields!');
}

// Valmistellaan SQL-kysely.
if ($stmt = mysqli_prepare($con,'SELECT * FROM users WHERE name = ? and pwd=?')) {
    // Bindataan parametrit, t�ss� tapauksessa k�ytt�j�nimi on string, joten k�ytet��n "s".
    mysqli_stmt_bind_param($stmt,'ss', $_POST['name'], $_POST['pwd']);
    mysqli_stmt_execute($stmt);
    $tulos=mysqli_stmt_get_result($stmt);
    // Tallennetaan tulos, jotta voimme tarkistaa, onko k�ytt�j� tietokannassa.
    //$stmt->store_result();

if ($rivi=mysqli_fetch_object($tulos)){
    $_SESSION['name'] = $rivi->name;
    $_SESSION['isAdmin'] = $rivi->isAdmin;
    if ($isAdmin==1){
        header("Location:../admin/users.html");
        exit;
    }
header("Location:../userIn.php");
exit;
}
else{
    header("Location:../kirjautuminen.html");
    exit;
}

/*
    if ($stmt->num_rows > 0) {
        // Jos k�ytt�j� l�ytyi tietokannasta, haetaan h�nen tiedot.
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        // K�ytt�j� l�ytyi, tarkistetaan salasana.
        // Huomaa: k�yt� rekister�itymisess� password_hash -funktiota salasanojen hashamiseen.
        if (password_verify($_POST['pwd'], $password)) {
            // Salasana oikein, k�ytt�j� kirjautunut sis��n.
            // Luo sessiot, jotta tiedet��n, ett� k�ytt�j� on kirjautunut sis��n.
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['name'];
            $_SESSION['id'] = $id;
            echo 'Welcome ' . $_SESSION['name'] . '!';
        } else {
            // Virheellinen salasana.
            echo 'Incorrect username and/or password!';
        }
    } else {
        // K�ytt�j�� ei l�ytynyt.
        echo 'Incorrect username and/or password!';
    }

    $stmt->close();
*/
}
?>
