<?php

$nom = $_POST["film"];
$genre = $_POST["genre"];
$annee = $_POST["annee"];
$reaalisateur = $_POST["realisateur"];
$acteurs= $_POST["acteurs"];
$synopsis = $_POST["synopsis"];




$serveur = 'localhost';

$login = 'root';

$mot_de_passe = '1';

$nom_bd = 'metropolisvod';



try {
    $conn = new PDO("mysql:host=$serveur;dbname=$nom_bd", $login, $mot_de_passe);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql1 = "INSERT INTO films (nom, synopsis, annee)
    VALUES ('$nom','$synopsis','$annee')";
    $sql2 = "INSERT INTO genre (nom)
    VALUES ('$genre')";
    $sql3 = "INSERT INTO realisateurs (nom)
    VALUES ('$realisateur')";
    $sql4 = "INSERT INTO acteur (nom)
    VALUES ('$acteurs')";

    // use exec() because no results are returned
    $conn->exec($sql1);
    $conn->exec($sql2);
    $conn->exec($sql3);
    $conn->exec($sql4);
    
    echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;

?>
