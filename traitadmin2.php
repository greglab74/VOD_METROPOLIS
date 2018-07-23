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

    $supprimerfilm = $_POST["idsuppr"];


    $serveur = 'sql.free.fr';

    $login = 'gregl74';

    $mot_de_passe = 'Thomas1974';

    $nom_bd = 'greggl74';

    try {
        $conn = new PDO("mysql:host=$serveur;dbname=$nom_bd", $login, $mot_de_passe);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("SET CHARACTER SET utf8");
        $sql1 = "DELETE FROM films
        WHERE ID_films ='$supprimerfilm'";

        $conn->exec($sql1);

        echo '<p class="modifphp">Suppression du film réussie</p></br>';
        echo '<a class="modifphp" href="admin.html">retour à l interface administrateur</a>';
        }
    catch(PDOException $e)
        {

        echo $sql1 . "<br>" . $e->getMessage();
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
