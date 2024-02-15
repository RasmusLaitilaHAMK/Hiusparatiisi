<?php
$initials = parse_ini_file("./muuta/ht.tieto.ini");
mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);

try {
    $yhteys = mysqli_connect($initials["dbs"], $initials["user"], $initials["password"], $initials["db"]);
} catch (Exception $e) {
    header("Location:./muuta/yhteysvirhe.html");
    exit;
}

$name = isset($_POST["name"]) ? $_POST["name"] : 0;
$pwd = isset($_POST["pwd"]) ? $_POST["pwd"] : 0;
$mobile = isset($_POST["mobile"]) ? $_POST["mobile"] : 0;
$isAdmin = isset($_POST["isAdmin"]) ? $_POST["isAdmin"] : 0;

// Check if the mobile number already exists
$checkSql = "SELECT * FROM users WHERE mobile = ?";
$checkStmt = mysqli_prepare($yhteys, $checkSql);
mysqli_stmt_bind_param($checkStmt, 's', $mobile);
mysqli_stmt_execute($checkStmt);
$result = mysqli_stmt_get_result($checkStmt);

if (mysqli_num_rows($result) > 0) {
    // Mobile number already exists, handle the duplicate entry (redirect or display an error)
    header("Location: ../duplicate.html");
    exit;
}

// Insert the new user if the mobile number is unique
$sql = "INSERT INTO users (name, pwd, mobile, isAdmin) VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, 'sssi', $name, $pwd, $mobile, $isAdmin);
mysqli_stmt_execute($stmt);

// Close the database connection
mysqli_close($yhteys);

// Redirect to the desired page
header("Location: ../index.html");
exit;
?>
