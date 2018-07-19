<?php

$nom = $_POST["film"];
$genre = $_POST["genre"];
$annee = $_POST["annee"];
$realisateur = $_POST["realisateur"];
$acteurs= $_POST["acteurs"];
$synopsis = addslashes($_POST["synopsis"]);
$affiche = $_POST["affiche"];
$bandeannonce = $_POST["bandeannonce"];



$test = $_POST["acteurs"];
$aff = explode(",", $acteurs);
$acteur1 = $aff[0];
$acteur2 = $aff[1];
$acteur3 = $aff[2];
$acteur4 = $aff[3];

$serveur = 'localhost';

$login = 'root';

$mot_de_passe = '1';

$nom_bd = 'vodmetropolis';

try {
    $conn = new PDO("mysql:host=$serveur;dbname=$nom_bd", $login, $mot_de_passe);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("SET CHARACTER SET utf8");
    $sql1 = "INSERT INTO films (titre, annee, affiche, bandeannonce, synopsis)
    VALUES ('$nom','$annee','$affiche','$bandeannonce','$synopsis')";
    $sql2 = "INSERT INTO realisateurs (nom)
    VALUES ('$realisateur')";
    $sql3 = "INSERT INTO acteurs (nom)
    VALUES ('$acteur1')";
    $sql4 = "INSERT INTO acteurs (nom)
    VALUES ('$acteur2')";
    $sql5 = "INSERT INTO acteurs (nom)
    VALUES ('$acteur3')";
    $sql6 = "INSERT INTO acteurs (nom)
    VALUES ('$acteur4')";
    //$sql7 = "INSERT INTO `joue` (`ID_films`, `ID_acteurs`) VALUES ('SELECT ID_films FROM films WHERE name = "'.$nom.'";', 'SELECT ID_acteurs FROM acteurs WHERE name = '$aff[0]';'), ('13', '10'), ('13', '9'), ('13', '11');"

    //$sql6 = "INSERT INTO realise (ID, ID_realisateurs) VALUES ('SELECT id FROM films WHERE name = '$nom';', 'SELECT ID_realisateurs FROM realisateurs WHERE name = '$realisateur';')";

    // use exec() because no results are returned
    $conn->exec($sql1);
    $lienidfilm = $conn->query('SELECT ID_films FROM films WHERE titre = "'.$nom.'"');
    $lienid = $lienidfilm->fetch();
    $zut = $lienid['ID_films'];
    $sql7 = "INSERT INTO A (ID_films, ID_genre) VALUES ('$zut', '$genre')";
    $conn->exec($sql2);
    $lienidreal = $conn->query('SELECT ID_realisateurs FROM realisateurs WHERE nom = "'.$realisateur.'"');
    $lienid2 = $lienidreal->fetch();
    $zut2 = $lienid2['ID_realisateurs'];
    $sql8 = "INSERT INTO realise (ID_films, ID_realisateurs) VALUES ('$zut', '$zut2')";
    $conn->exec($sql3);
    $conn->exec($sql4);
    $conn->exec($sql5);
    $conn->exec($sql6);
    $lienidacteur1 = $conn->query('SELECT ID_acteurs FROM acteurs WHERE nom = "'.$acteur1.'"');
    $lienid3 = $lienidacteur1->fetch();
    $zut3 = $lienid3['ID_acteurs'];
    $sql9 = "INSERT INTO joue (ID_films, ID_acteurs) VALUES ('$zut', '$zut3')";

    $lienidacteur2 = $conn->query('SELECT ID_acteurs FROM acteurs WHERE nom = "'.$acteur2.'"');
    $lienid4 = $lienidacteur2->fetch();
    $zut4 = $lienid4['ID_acteurs'];
    $sql10 = "INSERT INTO joue (ID_films, ID_acteurs) VALUES ('$zut', '$zut4')";

    $lienidacteur3 = $conn->query('SELECT ID_acteurs FROM acteurs WHERE nom = "'.$acteur3.'"');
    $lienid5 = $lienidacteur3->fetch();
    $zut5 = $lienid5['ID_acteurs'];
    $sql11 = "INSERT INTO joue (ID_films, ID_acteurs) VALUES ('$zut', '$zut5')";

    $lienidacteur4 = $conn->query('SELECT ID_acteurs FROM acteurs WHERE nom = "'.$acteur4.'"');
    $lienid6 = $lienidacteur4->fetch();
    $zut6 = $lienid6['ID_acteurs'];
    $sql12 = "INSERT INTO joue (ID_films, ID_acteurs) VALUES ('$zut', '$zut6')";
    $conn->exec($sql7);
    $conn->exec($sql8);
    $conn->exec($sql9);
    $conn->exec($sql10);
    $conn->exec($sql11);
    $conn->exec($sql12);

    //$conn->exec($sql5);
    //$conn->exec($sql6);

    echo "New record created successfully";

    }
catch(PDOException $e)
    {

    echo $sql1, $sql2, $sql3, $sql4, $sql5, $sql6, $sql7, $sql8, $sql9, $sql10, $sql11, $sql12 . "<br>" . $e->getMessage();
    }

$conn = null;

?>
