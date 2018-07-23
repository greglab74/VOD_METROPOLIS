<?php

session_start ();

// On récupère nos variables de session
if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) {
?>



<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/x-icon" href="favicon.ico">
	<link rel="shortcut icon" type="image/x-icon" href="resource/img/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/reset.css">

	<link rel="stylesheet" type="text/css" href="css/style.css">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script>
		$(document).ready(function() {
			$("#flip").click(function() {
				$("#panel").slideToggle("slow");
			});
			$("#flip2").click(function() {
				$("#panel2").slideToggle("slow");
			});
		});
	</script>

	<title>METROPOLIS VOD</title>
</head>

<body>
	<?php
	if(isset($_SESSION['test'])) {
		include 'include/navbarutil.html';
	}  else {
		if(isset($_SESSION['test2'])) {
			include 'include/navbaradmin.html';
		}  else { ?>
			<nav id="navbar">
				<div class="leftnav">
					<a href="index.php"><img src="img/logometropolis.jpg" alt="Metropolis VOD" class="logo" /></a>
					<a href="listefilms.php" class="films">Films</a>
					<div class="searchbar">
						<a id="flip" class="fas fa-search" href="#"></a>
					</div>
				</div>

				<div class="connexion">
					<div class="">
						<form class="" action="login.php" method="post">
							<input type="text" name="identifiant" placeholder="identifiant">
							<input type="password" name="password" placeholder="mot de passe">
							<input type="submit" name="soumettre" value="connexion" class="connexion">
						</form>

					</div>
					<div class="">
						<p>pas encore inscrit ?   <a id="flip2" class="nouveaucompte" href="#">s'inscrire</a></p>

					</div>

				</div>
			</nav>
	<?php }} ?>
	<input id="panel" type="text" class="btn-extended" placeholder="Recherchez votre film par son titre,réalisateur,acteur" />
	<main>

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

    $serveur = 'sql.free.fr';

    $login = 'gregl74';

    $mot_de_passe = 'Thomas1974';

    $nom_bd = 'greggl74';

    try {
        $conn = new PDO("mysql:host=$serveur;dbname=$nom_bd", $login, $mot_de_passe);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("SET CHARACTER SET utf8");
        $sql1 = "INSERT INTO films (titre, annee, affiche, bandeannonce, synopsis)
        VALUES ('$nom','$annee','$affiche','$bandeannonce','$synopsis')";

				//test de l'existence de realisateur et ajout dans la base si pas présent
				$lienidreal = $conn->query('SELECT ID_realisateurs FROM realisateurs WHERE nom = "'.$realisateur.'"');
        $lienid2 = $lienidreal->fetch();
        $zut2 = $lienid2['ID_realisateurs'];
				if (empty($zut2)) {
					$sql2 = "INSERT INTO realisateurs (nom)
					VALUES ('$realisateur')";
					$conn->exec($sql2);
				}
				else {
				}

				//test de l'existence de acteur 1 et ajout dans la base si pas présent
				$lienidacteur1 = $conn->query('SELECT ID_acteurs FROM acteurs WHERE nom = "'.$acteur1.'"');
        $lienid3 = $lienidacteur1->fetch();
        $zut3 = $lienid3['ID_acteurs'];
				if (empty($zut3)) {
					$sql3 = "INSERT INTO acteurs (nom)
	        VALUES ('$acteur1')";
					$conn->exec($sql3);
				}
				else {

				}

				//test de l'existence de acteur 2 et ajout dans la base si pas présent
				$lienidacteur2 = $conn->query('SELECT ID_acteurs FROM acteurs WHERE nom = "'.$acteur2.'"');
        $lienid4 = $lienidacteur2->fetch();
        $zut4 = $lienid4['ID_acteurs'];
				if (empty($zut4)) {
					$sql4 = "INSERT INTO acteurs (nom)
	        VALUES ('$acteur2')";
					$conn->exec($sql4);
				}
				else {
				}

				//test de l'existence de acteur 3 et ajout dans la base si pas présent
				$lienidacteur3 = $conn->query('SELECT ID_acteurs FROM acteurs WHERE nom = "'.$acteur3.'"');
        $lienid5 = $lienidacteur3->fetch();
        $zut5 = $lienid5['ID_acteurs'];
				if (empty($zut4)) {
					$sql5 = "INSERT INTO acteurs (nom)
	        VALUES ('$acteur3')";
					$conn->exec($sql5);
				}
				else {
				}

				//test de l'existence de acteur 4 et ajout dans la base si pas présent
				$lienidacteur4 = $conn->query('SELECT ID_acteurs FROM acteurs WHERE nom = "'.$acteur4.'"');
        $lienid6 = $lienidacteur4->fetch();
        $zut6 = $lienid6['ID_acteurs'];
				if (empty($zut6)) {
					$sql6 = "INSERT INTO acteurs (nom)
	        VALUES ('$acteur4')";
					$conn->exec($sql6);
				}
				else {
				}

        // use exec() because no results are returned
        $conn->exec($sql1);

				$lienidfilm = $conn->query('SELECT ID_films FROM films WHERE titre = "'.$nom.'"');
        $lienid = $lienidfilm->fetch();
        $zut = $lienid['ID_films'];
				//jointure film/genre
				$sql7 = "INSERT INTO A (ID_films, ID_genre) VALUES ('$zut', '$genre')";
				$conn->exec($sql7);
        //jointure film/realisateur
				$filmreal = $conn->query('SELECT ID_realisateurs FROM realisateurs WHERE nom = "'.$realisateur.'"');
        $filmrealis = $filmreal->fetch();
        $jointurefilmreal = $filmrealis['ID_realisateurs'];
        $sql8 = "INSERT INTO realise (ID_films, ID_realisateurs) VALUES ('$zut', '$jointurefilmreal')";
				$conn->exec($sql8);
      	//jointure film/acteur1
				$filmact1 = $conn->query('SELECT ID_acteurs FROM acteurs WHERE nom = "'.$acteur1.'"');
        $filmacteur1 = $filmact1->fetch();
        $jointurefilmacteur1 = $filmacteur1['ID_acteurs'];
        $sql9 = "INSERT INTO joue (ID_films, ID_acteurs) VALUES ('$zut', '$jointurefilmacteur1')";
				$conn->exec($sql9);
				//jointure film/acteur2
				$filmact2 = $conn->query('SELECT ID_acteurs FROM acteurs WHERE nom = "'.$acteur2.'"');
        $filmacteur2 = $filmact2->fetch();
        $jointurefilmacteur2 = $filmacteur2['ID_acteurs'];
				$sql10 = "INSERT INTO joue (ID_films, ID_acteurs) VALUES ('$zut', '$jointurefilmacteur2')";
				$conn->exec($sql10);
				//jointure film/acteur3
				$filmact3 = $conn->query('SELECT ID_acteurs FROM acteurs WHERE nom = "'.$acteur3.'"');
        $filmacteur3 = $filmact3->fetch();
        $jointurefilmacteur3 = $filmacteur3['ID_acteurs'];
        $sql11 = "INSERT INTO joue (ID_films, ID_acteurs) VALUES ('$zut', '$jointurefilmacteur3')";
				$conn->exec($sql11);
				//jointure film/acteur4
				$filmact4 = $conn->query('SELECT ID_acteurs FROM acteurs WHERE nom = "'.$acteur4.'"');
        $filmacteur4 = $filmact4->fetch();
        $jointurefilmacteur4 = $filmacteur4['ID_acteurs'];
        $sql12 = "INSERT INTO joue (ID_films, ID_acteurs) VALUES ('$zut', '$jointurefilmacteur4')";
        $conn->exec($sql12);


        echo '<p class="modifphp">Film correctement enregistré dans la vidéothèque</p></br>';
        echo '<a class="modifphp" href="fichefilm.php?idfilm='.$zut.'">voir la fiche du film</a></br>';
        echo '<a class="modifphp" href="admin.html">retour à l interface administrateur</a>';
        }
    catch(PDOException $e)
        {

        echo $sql1, $sql2, $sql3, $sql4, $sql5, $sql6, $sql7, $sql8, $sql9, $sql10, $sql11, $sql12 . "<br>" . $e->getMessage();
        }

    $conn = null;

    ?>

	</main>
	<div id="overlay">
		<div id="form-wrapper">
			<a href="#" onclick="off()" class="fas fa-times-circle"></a>
			<h3>Formulaire de contact</h3>
			<div id="alignement">
				<form action="" accept-charset="utf-8" id="commentform" class="cmxform" method="post">

					<div id="form">


						<div class="input-coord">
							<div class="input-name">
								<label for="name">* Nom:</label><br>
								<input name="name" id="name" class="required" type="text">
							</div>
							<!--end-->

							<div class="input-email">
								<label for="email">* Email:</label><br>
								<input name="email" id="email" class="required" type="text">
							</div>
							<!--end-->
						</div>


						<div class="input-message">
							<label for="message">Votre message:</label>
							<textarea name="message" id="message" rows="10"></textarea>
						</div>
						<!--end-->

						<p><input name="submit" class="submit" id="submit" value="Envoyer!" type="submit"></p>
					</div>
					<!-- end form -->

				</form>

				<div id="form-sidebar">

					<h4>METROPOLIS VOD</h4>
					<p>6 Rue de longueville<br> 08000 Charleville-Mézières</p>


					<ul>
						<li id="contact-twitter"><a href="https://facebook.com" class="fab fa-facebook-square" target="blank"></a></li>
						<li id="contact-dribbble"><a href="https://twitter.com" class="fab fa-twitter-square" target="blank"></a></li>
						<li id="contact-flickr"><a href="http://www.instagram.com" class="fab fa-instagram" target="blank"></a></li>
					</ul>

				</div>
				<!-- end form sidebar  -->
			</div>
		</div>
		<!-- end form wrapper -->

	</div>
	<footer>
		<div class="up">
			<div class="films">
				<h3><a href="index.php">Films</a></h3>
				<div class="genre">
					<ul class="rang">
						<li><a href="index.html">Action</a></li>
						<li><a href="index.html">Comédie</a></li>
						<li><a href="index.html">Aventure</a></li>
						<li><a href="index.html">Sci-fi</a></li>
					</ul>
					<ul class="rang">
						<li><a href="index.html">Humour</a></li>
						<li><a href="index.html">Fantastique</a></li>
						<li><a href="index.html">Jeunesse</a></li>
						<li><a href="index.html">Animation</a></li>
					</ul>
				</div>
			</div>

			<div class="reso">
				<a href="https://facebook.com" class="fab fa-facebook-square" target="blank"></a>
				<a href="https://twitter.com" class="fab fa-twitter-square" target="blank"></a>
				<a href="http://www.instagram.com" class="fab fa-instagram" target="blank"></a>

			</div>
			<div class="contact">
				<button type="button" onclick="on()" name="button" class="bouton">CONTACT</button>
			</div>
		</div>
		<div class="down">
			<a href="index.php">Mentions légales</a>
			<a href="index.php">Conditions de vente</a>
			<a href="index.php">Cookies</a>
			<a href="index.php">Confidentialité</a>

		</div>
	</footer>
</body>
<script>
	function on() {
		$('#overlay').fadeIn(1000);

	}

	function off() {
		$('#overlay').fadeOut(700);

	}
</script>

</html>

<?php
}
else {
	echo 'Vous devez vous connecter pour avoir accès à cette page. Merci';
}
	?>
