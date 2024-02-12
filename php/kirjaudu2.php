<?php
session_start();
$initials=parse_ini_file("./muuta/ht.tieto.ini");

// Yritï¿½ yhdistï¿½ï¿½ tietokantaan kï¿½yttï¿½en annettuja tietoja.
$yhteys = mysqli_connect($initials["dbs"], $initials["user"], $initials["password"], $initials["db"]);;
if (mysqli_connect_errno()) {
    // Jos yhteysvirhe, lopeta skripti ja näytä virhe.
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Tarkistetaan, onko kirjautumislomakkeelta saatu data.
if (!isset($_POST['name'], $_POST['pwd'])) {
    header("Location:../kirjautuminen.html");
    exit;
}

// Valmistellaan SQL-kysely.
if ($stmt = mysqli_prepare($yhteys,'SELECT * FROM users WHERE name = ? and pwd=?')) {
    // Bindataan parametrit, tï¿½ssï¿½ tapauksessa kï¿½yttï¿½jï¿½nimi on string, joten kï¿½ytetï¿½ï¿½n "s".
    mysqli_stmt_bind_param($stmt,'ss', $_POST['name'], $_POST['pwd']);
    mysqli_stmt_execute($stmt);
    $tulos=mysqli_stmt_get_result($stmt);
    // Tallennetaan tulos, jotta voimme tarkistaa, onko kï¿½yttï¿½jï¿½ tietokannassa.
    //$stmt->store_result();

if ($rivi=mysqli_fetch_object($tulos))
    {
    $_SESSION['name'] = $rivi->name;
    $_SESSION['isAdmin'] = $rivi->isAdmin;
    if ($_SESSION['isAdmin'] <> 0){
        header("Location:../admin/users.php");
        exit;
    }
    else{
        header("Location:../userIn.php");
        exit;
        }
    }
    else {
        // Redirect the user to a different page for incorrect credentials.
        header("Location:../kirjautuminen.html");
        exit;
    }
}

/*
    if ($stmt->num_rows > 0) {
        // Jos kï¿½yttï¿½jï¿½ lï¿½ytyi tietokannasta, haetaan hï¿½nen tiedot.
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        // Kï¿½yttï¿½jï¿½ lï¿½ytyi, tarkistetaan salasana.
        // Huomaa: kï¿½ytï¿½ rekisterï¿½itymisessï¿½ password_hash -funktiota salasanojen hashamiseen.
        if (password_verify($_POST['pwd'], $password)) {
            // Salasana oikein, kï¿½yttï¿½jï¿½ kirjautunut sisï¿½ï¿½n.
            // Luo sessiot, jotta tiedetï¿½ï¿½n, ettï¿½ kï¿½yttï¿½jï¿½ on kirjautunut sisï¿½ï¿½n.
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
        // Kï¿½yttï¿½jï¿½ï¿½ ei lï¿½ytynyt.
        echo 'Incorrect username and/or password!';
    }

    $stmt->close();
*/
?>
