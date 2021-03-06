<?php

session_start ();

// On récupère nos variables de session
if (isset($_SESSION['login']) && isset($_SESSION['pwd']) && isset($_SESSION['test2'])) {
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
	<nav id="navbar">
		<div class="leftnav">
			<a href="index.php"><img src="img/logometropolis.jpg" alt="Metropolis VOD" class="logo" /></a>
			<a href="listefilms.php" class="films">Films</a>
			<a href="admin.php" class="films">Administrer</a>
			<div class="searchbar">

				<a id="flip" class="fas fa-search" href="#"></a>
			</div>
		</div>

		<div class="connexion">
			<div class="" style="color:white;font-size:2rem;">
				<p>Bonjour <?php echo $_SESSION['login'] ?>

			</div>
			<div class="">

				<a href="logout.php">Déconnexion</a>
			</div>

		</div>
	</nav>
	<input id="panel" type="text" class="btn-extended" placeholder="Recherchez votre film par son titre,réalisateur,acteur" />

	<main>

		<div class="formulaireadmin">
			<h2>INTERFACE ADMINISTRATEUR</h2>
			<form class="" action="traitadmin.php" method="post">
				<ul>
					<li>
						<div><label for="film"><span>Nom Film :</span></div>
						<div><input id="film" name="film" type="text" size="28" required></div>
					</li>
					<li>
						<div class=""><label for="genre"><span>Genre :</span></div>
						<div class="">
							<select id="genre" name="genre">
										<option value="none" selected>Genre</option>
										<option value="1">Action</option>
										<option value="2">Comédie</option>
										<option value="3">Aventure</option>
										<option value="4">Sci-fi</option>
										<option value="5">Humour</option>
										<option value="6">Fantastique</option>
										<option value="7">Jeunesse</option>
										<option value="8">Animation</option>
									</select>
							</div>
					</li>
					<li>
						<div class=""><label for="annee"><span>Année :</span></div>
						<div class=""><input id="annee" name="annee" type="text" size="25" required></div>
					</li>
					<li>
							<div class=""><label for="realisateur"><span>Réalisateur(s) :</span></div>
							<div class=""><input id="realisateur" name="realisateur" type="text" size="25" required></div>
					</li>
					<li>
						<div class=""><label for="acteurs"><span>acteur(s) :</span></div>
						<div class=""><input id="acteurs" name="acteurs" type="text" size="25" required></div>
					</li>
					<li>
						<div class=""><label for="affiche"><span>Lien affiche :</span></div>
						<div class=""><input id="affiche" name="affiche" type="text" size="25" required></div>
					</li>
					<li>
						<div class=""><label for="bandeannonce"><span>Lien BA :</span></div>
						<div class=""><input id="bandeannonce" name="bandeannonce" type="text" size="25" required></div>
					</li>
					<li id="synop">
						<div class=""><label for="synopsis"><span>Synopsis :</span></div>
						<div class=""><textarea id="synopsis" name="synopsis" placeholder="" type="text" cols="45" rows="6" required></textarea></div>
					</li>
				</ul>
				<button class="pulse" type="submit" onclick="myfunction()">Envoyer</button>
			</form>
			<h2>SUPPRESSION D'UN FILM</h2>
			<form class="" action="traitadmin2.php" method="post">
				<ul>
					<li>
						<div><label for="film"><span>ID FILM A SUPPRIMER :</span></div>
						<div><input id="idsuppr" name="idsuppr" type="text" size="10" required></div>
					</li>
				</ul>
				<button class="pulse" type="submit">SUPPRIMER</button>
			</form>
		</div>




	</main>
	<div id="overlay" >
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
				<a href="logout.php">Déconnection</a>
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
<script>
function myFunction() {
    confirm("Confirmez la création du film ?");
}
</script>
</html>
<?php
}
else {
	echo 'Vous devez vous connecter pour avoir accès à cette page. Merci';
}
?>
