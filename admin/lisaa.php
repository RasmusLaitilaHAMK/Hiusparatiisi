<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>(ADMIN) HAMK Hiusparatiisi</title>
    <link rel="stylesheet" href="admin.css">



</head>
<body>
<header>
        <h1> (ADMIN) Hamkin Hiusparatiisi</h1>

    </header>
    <h1>lisää käyttäjä</h1>

<nav class="users">
        <a href="../admin/users.php">takaisin</a> 
    </nav> <!--First navigation box for the frontpage-->

<form action='./lisaauser.php' method='post'>

    <p>name: <input type='text' name='name' value=''></p>
    <p>password: <input type='text' name='pwd'minlength="8" value=''></p>
    <p>mobile: <input type='tel' minlength="10" maxlength="10" name='mobile' value=''></p>

    <input type='submit' name='Päivitä' value='Päivitä'>
</form>

<footer>
        <a href="https://github.com/RasmusLaitilaHAMK/WebDevTeam6">© 2024 Rasmus Laitila, Iiro Käki, Lauri Raatikainen</a>
        <!--Link to github-->
    </footer>
</body>
</html>