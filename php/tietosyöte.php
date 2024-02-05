
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <title>Database syöte</title>
    </head>
    <body style="margin: 10px;">
        <header>
            <h1>Tietosyöte database.php tiedostoon</h1>
        </header>
        <form action="./database.php" method="post">
            <input type="text" name="etunimi" value=""placeholder="Etunimi" required="true" minlength="2" maxlength="24"><br>
            <input type="text" name="sukunimi" value="" placeholder="Sukunimi" required="true" minlength="2" maxlength="24"><br>
            <input type="submit" name="tiedot" value="Submit"><br>
         </form>
         <?php
         include("henkilölista.php");
         ?>  
    </body>
</html>