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
	<nav id="navbar">
		<div class="leftnav">
			<a href="index.html"><img src="img/logometropolis.jpg" alt="Metropolis VOD" class="logo" /></a>
			<a href="listefilms.html" class="films">Films</a>
			<div class="searchbar">

				<a id="flip" class="fas fa-search" href="#"></a>






			</div>
		</div>

		<div class="connexion">
			<div class="">
				<input type="text" name="identifiant" placeholder="identifiant">
				<input type="text" name="password" placeholder="mot de passe">
			</div>
			<div class="">
				<a href="buy.php" class="connexion">Connexion</a>
				<a id="flip2" class="nouveaucompte" href="#">s'inscrire</a>
			</div>

		</div>
	</nav>
	<input id="panel" type="text" class="btn-extended" placeholder="Recherchez votre film par son titre,réalisateur,acteur" />
	<main>

		<?php

		###########################################
		############ PDO-Extension #############
		###########################################

		$serveur = 'localhost';

		$login = 'root';

		$mot_de_passe = '1';

		$nom_bd = 'vodmetropolis';


		$dbh = null;
		try {
		  $dbh = new PDO("mysql:host=$serveur; dbname=$nom_bd;", $login, $mot_de_passe);
			$dbh->exec("SET CHARACTER SET utf8");
		} catch (PDOException $e) {
		  echo "Erreur!: " . $e->getMessage() . "<br/>";
		  die();
		}

		$adresse = $_SERVER['REQUEST_URI'];
		$identite = substr($adresse, strpos($adresse, "&")+1, strpos($adresse, ".php")-strlen($adresse));
		$identitefilm = print_r($identite);
		$reponse = $dbh->query('SELECT ID_films FROM films');







		?>


		<div id="listefilms">
			<section class="filtre">
				<form action="#" method="post">
					<p class="select">
						<select id="genre" name="genre">
							<option value="none" selected>Genre</option>
							<option value="1">Action</option>
							<option value="2">Comédie</option>
							<option value="3">Aventure</option>
							<option value="4">Science-fiction</option>
							<option value="5">Humour</option>
							<option value="6">Fantastique</option>
							<option value="7">Jeunesse</option>
							<option value="8">Animation</option>
						</select>
					</p>

					<p class="select">
						<select id="realisateur" name="realisateur">
							<option value="none" selected>Réalisateur</option>
						</select>
					</p>

					<p class="select">
						<select id="acteur" name="acteur">
							<option value="none" selected>Acteur</option>
						</select>
					</p>

					<p class="select">
						<select id="annee" name="annee">
							<option value="annee" selected>Année</option>
						</select>
					</p>

					<p>
						<input type="submit" value="Valider" />
						<input type="reset" value="Annuler">
					</p>
				</form>
			</section>

			<section class="liste">
				<ul>
					<?php while ($donnees = $reponse->fetch())
			{echo  $donnees['prenom'], " ",$donnees['nom'], " "; }?>
					<li><a href="./fichefilm-&1.php"><img src="img/1.jpeg" alt="Metropolis VOD" class="pres1" /></a>
						<p class="fontroger">Titre</p>
					</li>
					<li><a href="./fichefilm-&2.php"><img src="img/2.jpeg" alt="Metropolis VOD" class="pres1" /></a>
						<p class="fontroger">Titre</p>
					</li>
					<li><a href="./fichefilm-&3.php"><img src="img/3.jpeg" alt="Metropolis VOD" class="pres1" /></a>
						<p class="fontroger">Titre</p>
					</li>
					<li><a href="./film-4"><img src="img/4.jpeg" alt="Metropolis VOD" class="pres1" /></a>
						<p class="fontroger">Titre</p>
					</li>
					<li><a href="./film-5"><img src="img/5.jpeg" alt="Metropolis VOD" class="pres1" /></a>
						<p class="fontroger">Titre</p>
					</li>
					<li><a href="./film-6"><img src="img/6.jpeg" alt="Metropolis VOD" class="pres1" /></a>
						<p class="fontroger">Titre</p>
					</li>
					<li><a href="./film-7"><img src="img/7.jpeg" alt="Metropolis VOD" class="pres1" /></a>
						<p class="fontroger">Titre</p>
					</li>
				</ul>
			</section>
		</div>

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
				<h3><a href="index.html">Films</a></h3>
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
			<a href="index.html">Mentions légales</a>
			<a href="index.html">Conditions de vente</a>
			<a href="index.html">Cookies</a>
			<a href="index.html">Confidentialité</a>

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
