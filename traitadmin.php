<?php

$nom = $_POST["film"];
$genre = $_POST["genre"];
$annee = $_POST["annee"];
$realisateur = $_POST["realisateur"];
$acteurs= $_POST["acteurs"];
$synopsis = $_POST["synopsis"];
$affiche = $_POST["affiche"];
$bandeannonce = $_POST["bandeannonce"];


$test = $_POST["acteurs"];
$aff = explode(",", $test);

$serveur = 'localhost';

$login = 'root';

$mot_de_passe = '1';

$nom_bd = 'vodmetropolis';

try {
    $conn = new PDO("mysql:host=$serveur;dbname=$nom_bd", $login, $mot_de_passe);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql1 = "INSERT INTO films (nom, synopsis, annee, affiche, bandeannonce)
    VALUES ('$nom','$synopsis','$annee','$affiche','$bandeannonce')";
    $sql2 = "INSERT INTO genre (nom)
    VALUES ('$genre')";
    $sql3 = "INSERT INTO realisateurs (nom)
    VALUES ('$realisateur')";
    $sql4 = "INSERT INTO acteurs (nom)
    VALUES ('$aff[0]', '$aff[1]', '$aff[2]', '$aff[3]')";
    INSERT INTO `joue` (`ID_films`, `ID_acteurs`) VALUES ('SELECT ID_films FROM films WHERE name = "'.$nom.'";', 'SELECT ID_acteurs FROM acteurs WHERE name = '$aff[0]';'), ('13', '10'), ('13', '9'), ('13', '11');
    INSERT INTO `A` (`ID_films`, `ID_genre`) VALUES ('SELECT ID_films FROM films WHERE name = "'.$nom.'";', 'SELECT ID_genre FROM genre WHERE name = "'.$genre.'";');
    INSERT INTO `realise` (`ID`, `ID_realisateurs`) VALUES ('SELECT id FROM films WHERE name = "'.$nom.'";', 'SELECT ID_realisateurs FROM realisateurs WHERE name = "'.$realisateur.'";');

    // use exec() because no results are returned
    $conn->exec($sql1);
    $conn->exec($sql2);
    $conn->exec($sql3);
    $conn->exec($sql4);
    $conn->exec($sql5);

    echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $sql1, $sql2, $sql3, $sql4, $sql5 . "<br>" . $e->getMessage();
    }

$conn = null;

?>
