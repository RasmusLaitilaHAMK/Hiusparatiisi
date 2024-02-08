# Käki Iiro, Laitila Rasmus, Raatikainen Lauri, Team 6

## About the website
[Link to our layout](https://rajamäenhiuskeidas.fi/)

## Roles
5.2 Ryhmätyön aloitus 

Database nimi: hiusparatiisi 

Tehdään Rekisteröitymisjärjestelmä ohjeiden mukaisesti. Parturi sivulla käyttäjä voi rekisteröityä järjestelmään. Käyttäjä voi syöttää tietojaan (Nimi, Salasana, Puhelin numero) ja mahdollisesti voi lisätä kuvansa. Käyttäjä voi selata muita rekisteröityneitä käyttäjiä. Ylläpitäjä on yksi käyttäjistä laajemmilla admin oikeuksilla. Hän voi lisäksi poistaa ja muokata muiden käyttäjien tietoja. Toteutuksessa käytetään sessioita. Ylläpitopuoli suojatta "htaccessilla" tai omalla tietokantaan pohjautuvalla tavalla. 

 

Lauri: 

-Kirjautuminen ja tunnistautuminen 

- 

 

Iiro:  

-Tietojen haku tietokannasta. 

-Kirjautumisen jälkeen näkymä ja käytettävyys sivulla, adminin ja käyttäjän näkymät. Muokkaus ja poisto-oikeudet adminille, käyttäjä voi tarkastella muita profiileja.  

Admin kansiossa: admin.css, ht.as.ini, lisaa.php, lisaauser.php, muokkaauser.php, paivitauser.php, poistauser.php, users.php, virhe.html 

5.2 Admin-sivu, tuo käyttäjät käyttäjälistaan, käyttäjien poisto, muokkaus 

6.2 Rasmuksen kanssa Adminsivun, lisää käyttäjä tietokantaan, css, headerit, footerit, muotoilu, min 8, 10 merkkiä pituudet salasanalle ja puhelinnumerolle tekstikenttiin 

7.2 Footerit adminin sivulle kuntoon, html-tiedoston muotoilu,  korjaukset 

Rasmus: 

-Rekisteröinti, mysql databasen pohjan luominen, käyttäjän kirjautumisen valmistelu ja käyttäjän kotisivun luominen, ulos kirjautuminen, database ongelman korjaus, admin sivujen siirron jälkeinen korjaus, admin perus käyttäjän kirjautuminen ja niiden ero,  

 

 
 -- Table `hiusparatiisi`.`users` 
 -- ----------------------------------------------------- 
 CREATE TABLE IF NOT EXISTS `hiusparatiisi`.`users` ( 
   `ID` INT NOT NULL AUTO_INCREMENT, 
   `name` VARCHAR(16) NOT NULL, 
   `pwd` VARCHAR(30) NOT NULL, 
   `mobile` VARCHAR(10) NOT NULL, 
   `isAdmin` TINYINT NOT NULL DEFAULT 0, 
   PRIMARY KEY (`ID`)) 
 ENGINE = InnoDB; 

  

## Ohjeita ##

**Rasmus**
	-Rekisteröinti, kirjautuminen, admin/perus käyttäjän ero kirjautuessa, databasen luonti, yleissäätöä ja korjauksia, jne
	-Minun käsialaani on: web_trtkp23_6 - tietokanta, userIn.php, rekisteröinti.php/.html, database.php, ht.tieto.ini, pohja.php(ei käytössä), ja avustusta admin tiedostojen kanssa


**HINNASTO - Iiro - table**
	-Header: Nimi(HAMK hiuskeidas...), keskellä; paikantäyttäjä haku palkki;
	-Nav: linkit Etusivu, Hinnasto, Yhteystiedot; keskellä;
	-Tables: Hinnasto, lynyet, pitkät
	-Comments
	-body: Hinnasto tietoja, jonkinlainen table;
	-Footer: copyright

**YHTEYSTIEDOT - Lauri**
    -Header: Nimi(HAMK hiuskeidas)
    -Nav: linkit kaikille sivuille: Etusivu, Hinnasto, Yhteystiedot
    -Main: kuva
    -Article: Osoite, puhelinnumero
    -Table: Aukioloajat (Päivä, kellonaika)
    -Footer: Copyright
