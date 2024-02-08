<?php
session_start();
$initials = parse_ini_file("./muuta/ht.tieto.ini");

/*
$databaseServer = $initials["dbs"];
$username = $initials["user"];
$password = $initials["password"];
$databaseName = $initials["db"];
*/

try {
    $yhteys = mysqli_connect($initials["dbs"], $initials["user"], $initials["password"], $initials["db"]);
} catch (Exception $e) {
    header("Location:./muuta/yhteysvirhe.html");
    exit;
}

if (!isset($_POST['name'], $_POST['pwd'])) {
    header("Location:../kirjautuminen2.html");
    exit('Please fill both the username and password fields!');
}

if ($stmt = $yhteys->prepare('SELECT id, pwd FROM users WHERE name = ?')) {
    $stmt->bind_param('s', $_POST['name']);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();

        if (password_verify($_POST['pwd'], $password)) {
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['name'];
            $_SESSION['id'] = $id;
            echo 'Welcome ' . $_SESSION['name'] . '!';
        } else {
            echo 'Incorrect username and/or password!';
            echo 'Entered Username: ' . $_POST['name'];
            echo 'Entered Password: ' . $_POST['pwd'];
            echo 'Hashed Password from Database: ' . $password;
            echo 'Password Verify Result: ' . (password_verify($_POST['pwd'], $password) ? 'true' : 'false');
        }
    } else {
        echo 'Incorrect username and/or password!';
        echo 'Entered Username: ' . $_POST['name'];
        echo 'Entered Password: ' . $_POST['pwd'];
    }

    $stmt->close();
} else {
    // Handle prepare error
    echo 'Prepare statement failed: ' . $yhteys->error;
}

// Close the database connection
mysqli_close($yhteys);
?>