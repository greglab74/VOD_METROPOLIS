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
		###########################################
		############ PDO-Extension #############
		###########################################

		$serveur = 'sql.free.fr';

		$login = 'gregl74';

		$mot_de_passe = 'Thomas1974';

		$nom_bd = 'greggl74';


		$dbh = null;
		try {
		  $dbh = new PDO("mysql:host=$serveur; dbname=$nom_bd;", $login, $mot_de_passe);
			$dbh->exec("SET CHARACTER SET utf8");
		} catch (PDOException $e) {
		  echo "Erreur!: " . $e->getMessage() . "<br/>";
		  die();
		}
		$identite = $_GET['idfilm'];
		$util = $_SESSION['login'];
		$recupidutil = $dbh->query('SELECT ID_utilisateurs FROM utilisateurs WHERE identifiant = "'.$util.'"');
		$donnees8 = $recupidutil->fetch();
		$idutil = $donnees8['ID_utilisateurs'];
		$testjoint = $dbh->query('SELECT ID_films FROM films NATURAL JOIN utilisateurs NATURAL JOIN regarde WHERE ID_films = "'.$identite.'" AND ID_utilisateurs = "'.$idutil.'"');
		$reponse = $dbh->query('SELECT nom FROM acteurs NATURAL JOIN joue NATURAL JOIN films WHERE ID_films = "'.$identite.'"');
		$reponse2 = $dbh->query('SELECT titre FROM films WHERE ID_films = "'.$identite.'"');
		$reponse3 = $dbh->query('SELECT affiche FROM films WHERE ID_films = "'.$identite.'"');
		$reponse4 = $dbh->query('SELECT nom FROM genre NATURAL JOIN A NATURAL JOIN films WHERE ID_films = "'.$identite.'"');
		$reponse5 = $dbh->query('SELECT nom FROM realisateurs NATURAL JOIN realise NATURAL JOIN films WHERE ID_films = "'.$identite.'"');
		$reponse6 = $dbh->query('SELECT synopsis FROM films WHERE ID_films = "'.$identite.'"');
		$reponse7 = $dbh->query('SELECT bandeannonce FROM films WHERE ID_films = "'.$identite.'"');


		$donnees9 = $testjoint->fetch();
		$idtestjoint = $donnees9['ID_films'];

		$donnees2 = $reponse2->fetch();
		$donnees3 = $reponse3->fetch();
		$donnees4 = $reponse4->fetch();
		$donnees5 = $reponse5->fetch();
		$donnees6 = $reponse6->fetch();
		$donnees7 = $reponse7->fetch();
		?>
		<?php if(isset($_POST['favoris'])) {

			if (empty($idtestjoint)) {

				echo '<p class="modifphp" style="color:red;text-align:center;">Film ajouté à vos favoris</p>';

			}
			else {
						//message d'erreur si déja présent
						echo '<p class="modifphp" style="color:red;text-align:center;">Le film est déja dans vos favoris !!!</p>';
			}
		}
		else {

		} ?>
		<div id="section1">
			<div class="aff">
				<a href="#"><img src="<?php echo $donnees3['affiche']; ?>" alt="Metropolis VOD" class="affichefilm" /></a>
			</div>
			<div class="bandeannonce">
				<p>Bande annonce:</p>
				<video width="700" controls>

					<source src="<?php echo $donnees7['bandeannonce']; ?>" type="video/mp4">
  				Your browser does not support HTML5 video.
				</video>
			</div>
		</div>
		<form id="ajfavoris" action="#" method="post">
			<input type='checkbox' id='favoris' name='favoris' value='1' checked='checked'>
			<input type="submit" id="butfav" value="ajouter aux favoris" />
		</form>
		<div id="section2">

			<?php if(isset($_POST['favoris'])) {

				if (empty($idtestjoint)) {
					//ajout dans la base si pas présent
					$sql1 = "INSERT INTO regarde (ID_films, ID_utilisateurs)
					VALUES ('$identite','$idutil')";
					$dbh->exec($sql1);


				}
				else {
							//message d'erreur si déja présent

				}
			}
			else {

			} ?>
			<div class="titrefilm">
				<h3><?php echo $donnees2['titre']; ?></h3>
			</div>
			<div class="genrefilm">
				<h3>Genre: <?php echo $donnees4['nom']; ?></h3>
			</div>
			<div class="realisateur">
				<h3>réalisateur: <?php echo $donnees5['nom']; ?></h3>
			</div>


			<div class="acteurs">

				<h3>Acteurs: <?php while ($donnees = $reponse->fetch())
		{echo $donnees['nom'], ", "; }?></h3>
			</div>
			<div class="scenario">
				<h3>Synopsis:</h3>
				<p><?php echo $donnees6['synopsis']?></p>
			</div>
			<div class="avis">

			</div>
			<div class="louer">

			</div>
		</div>
		<?php

		$reponse->closeCursor(); // Termine le traitement de la requête

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
else { ?>
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
							<p>pas encore inscrit ?   <a id="flip2" class="nouveaucompte" href="#" onclick="inscron()">s'inscrire</a></p>

						</div>

					</div>
				</nav>

		<input id="panel" type="text" class="btn-extended" placeholder="Recherchez votre film par son titre,réalisateur,acteur" />
		<main>

			<?php
			###########################################
			############ PDO-Extension #############
			###########################################

			$serveur = 'sql.free.fr';

			$login = 'gregl74';

			$mot_de_passe = 'Thomas1974';

			$nom_bd = 'greggl74';


			$dbh = null;
			try {
				$dbh = new PDO("mysql:host=$serveur; dbname=$nom_bd;", $login, $mot_de_passe);
				$dbh->exec("SET CHARACTER SET utf8");
			} catch (PDOException $e) {
				echo "Erreur!: " . $e->getMessage() . "<br/>";
				die();
			}
			$identite = $_GET['idfilm'];

			$reponse = $dbh->query('SELECT nom FROM acteurs NATURAL JOIN joue NATURAL JOIN films WHERE ID_films = "'.$identite.'"');
			$reponse2 = $dbh->query('SELECT titre FROM films WHERE ID_films = "'.$identite.'"');
			$reponse3 = $dbh->query('SELECT affiche FROM films WHERE ID_films = "'.$identite.'"');
			$reponse4 = $dbh->query('SELECT nom FROM genre NATURAL JOIN A NATURAL JOIN films WHERE ID_films = "'.$identite.'"');
			$reponse5 = $dbh->query('SELECT nom FROM realisateurs NATURAL JOIN realise NATURAL JOIN films WHERE ID_films = "'.$identite.'"');
			$reponse6 = $dbh->query('SELECT synopsis FROM films WHERE ID_films = "'.$identite.'"');
			$reponse7 = $dbh->query('SELECT bandeannonce FROM films WHERE ID_films = "'.$identite.'"');


			$donnees2 = $reponse2->fetch();
			$donnees3 = $reponse3->fetch();
			$donnees4 = $reponse4->fetch();
			$donnees5 = $reponse5->fetch();
			$donnees6 = $reponse6->fetch();
			$donnees7 = $reponse7->fetch();
			?>

			<div id="section1">
				<div class="aff">
					<a href="#"><img src="<?php echo $donnees3['affiche']; ?>" alt="Metropolis VOD" class="affichefilm" /></a>
				</div>
				<div class="bandeannonce">
					<p>Bande annonce:</p>
					<video width="700" controls>

						<source src="<?php echo $donnees7['bandeannonce']; ?>" type="video/mp4">
						Your browser does not support HTML5 video.
					</video>
				</div>
			</div>
			<div id="section2">


				<div class="titrefilm">
					<h3><?php echo $donnees2['titre']; ?></h3>
				</div>
				<div class="genrefilm">
					<h3>Genre: <?php echo $donnees4['nom']; ?></h3>
				</div>
				<div class="realisateur">
					<h3>réalisateur: <?php echo $donnees5['nom']; ?></h3>
				</div>


				<div class="acteurs">

					<h3>Acteurs: <?php while ($donnees = $reponse->fetch())
			{echo $donnees['nom'], ", "; }?></h3>
				</div>
				<div class="scenario">
					<h3>Synopsis:</h3>
					<p><?php echo $donnees6['synopsis']?></p>
				</div>
				<div class="avis">

				</div>
				<div class="louer">

				</div>
			</div>
			<?php

			$reponse->closeCursor(); // Termine le traitement de la requête

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

		<div id="overlay2">
			<div id="form-wrapper2">
				<a href="#" onclick="inscroff()" class="fas fa-times-circle"></a>
			<form id="forminscription" action="traitform.php" method="post">
				<h3>INSCRIPTION</h3>

		<div class="input-wrap">
			<label>Nom</label>
			<input type="text" placeholder="Votre nom" name="nom" required>

		</div>

		<div class="input-wrap">
			<label>Prenom</label>
			<input type="text" placeholder="Votre prénom" name="prenom" required>

		</div>

		<div class="input-wrap">
			<label>Votre Email</label>
			<input type="email" placeholder="mail@host.com" name="email" required>

		</div>

		<div class="input-wrap">
			<label>Identifiant</label>
			<input type="text" placeholder="Votre identifiant" name="identifiant" required>

		</div>

		<div class="input-wrap">
			<label>Password</label>
			<input type="password" placeholder="Votre mot de passe" name="motpasse" required>

		</div>
		<div class="creer">
			<input id="creercompte" type="submit" value="Créer un compte">
		</div>

			</form>

		</div>
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
		function inscron() {
			$('#overlay2').fadeIn(1000);

		}

		function inscroff() {
			$('#overlay2').fadeOut(700);

		}
	</script>

	</html>

<?php }
	?>
