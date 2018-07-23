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
	//si c'est un utilisateur, chargement de sa navbar
	if(isset($_SESSION['test'])) {
		include 'include/navbarutil.html';
	}  else {
		//si c'est un administrateur, chargement de sa navbar
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
						<p>pas encore inscrit ?   <a id="flip2" class="nouveaucompte" href="#" onclick="inscron()">s'inscrire</a></p>

					</div>

				</div>
			</nav>
	<?php }} ?>
	<input id="panel" type="text" class="btn-extended" placeholder="Recherchez votre film par son titre,réalisateur,acteur" />


	<div id="wrapper" style="margin-top:80px;">

		<div class="carrousel">
			<div class="plan p1"><a href="index.php"><img src="img/1.jpeg" alt="Metropolis VOD" class="affiche" /></a></div>
			<div class="plan p2"><a href="index.php"><img src="img/2.jpeg" alt="Metropolis VOD" class="affiche" /></a></div>
			<div class="plan p3"><a href="index.php"><img src="img/3.jpeg" alt="Metropolis VOD" class="affiche" /></a></div>
			<div class="plan p4"><a href="index.php"><img src="img/4.jpeg" alt="Metropolis VOD" class="affiche" /></a></div>
			<div class="plan p5"><a href="index.php"><img src="img/5.jpeg" alt="Metropolis VOD" class="affiche" /></a></div>
			<div class="plan p6"><a href="index.php"><img src="img/6.jpeg" alt="Metropolis VOD" class="affiche" /></a></div>
			<div class="plan p7"><a href="index.php"><img src="img/7.jpeg" alt="Metropolis VOD" class="affiche" /></a></div>
			<div class="plan p8"><a href="index.php"><img src="img/8.jpeg" alt="Metropolis VOD" class="affiche" /></a></div>
		</div>

	</div>
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

		$reponse = $dbh->query('SELECT ID_films, affiche FROM films WHERE annee =2018');
		$reponse2 = $dbh->query('SELECT ID_films, affiche FROM films NATURAL JOIN A NATURAL JOIN genre WHERE ID_genre =4');
		$reponse3 = $dbh->query('SELECT ID_films, affiche FROM films NATURAL JOIN A NATURAL JOIN genre WHERE ID_genre =2 OR ID_genre =5 OR ID_genre =7 OR ID_genre =8');

		?>

		<h2>Nouveautés</h2>
		<div class="nouveautes">
			<ul>
				<?php while ($a = $reponse->fetch())
		{ ?>
				<li><a href="fichefilm.php?idfilm=<?php echo $a['ID_films'];?>"><img src="<?php echo $a['affiche'];?>" alt="Metropolis VOD" class="pres1" /></a>
				</li><?php } ?>
			</ul>
		</div>
		<h2>Science-fiction</h2>
		<div class="anepasmanquer">
			<ul>
				<?php while ($a = $reponse2->fetch())
		{ ?>
				<li><a href="fichefilm.php?idfilm=<?php echo $a['ID_films'];?>"><img src="<?php echo $a['affiche'];?>" alt="Metropolis VOD" class="pres1" /></a>
				</li><?php } ?>
			</ul>
		</div>

		<h2>pour la famille</h2>
		<div class="pourfamille">
			<ul>
				<?php while ($a = $reponse3->fetch())
		{ ?>
				<li><a href="fichefilm.php?idfilm=<?php echo $a['ID_films'];?>"><img src="<?php echo $a['affiche'];?>" alt="Metropolis VOD" class="pres1" /></a>
				</li><?php } ?>
			</ul>
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

	<div id="overlay2">
		<div id="form-wrapper2">
			<a href="#" onclick="inscroff()" class="fas fa-times-circle"></a>
		<form id="forminscription" action="traitform.php" method="post">
			<h3>INSCRIPTION</h3>

  <div class="input-wrap">
    <label>Nom</label>
    <input type="text" placeholder="Votre nom" name="nom" required>
    <span class="clear">x</span>
  </div>

	<div class="input-wrap">
    <label>Prenom</label>
    <input type="text" placeholder="Votre prénom" name="prenom" required>
    <span class="clear">x</span>
  </div>

  <div class="input-wrap">
    <label>Votre Email</label>
    <input type="email" placeholder="mail@host.com" name="email" required>
    <span class="clear">x</span>
  </div>

	<div class="input-wrap">
    <label>Identifiant</label>
    <input type="text" placeholder="Votre identifiant" name="identifiant" required>
    <span class="clear">x</span>
  </div>

  <div class="input-wrap">
    <label>Password</label>
    <input type="password" placeholder="Votre mot de passe" name="motpasse" required>
    <span class="clear">x</span>
  </div>

  <input type="submit" value="Créer un compte">
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

	<?php
	}
	else {
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
						<p>pas encore inscrit ?   <a  href="#" onclick="inscron()" id="flip2" class="nouveaucompte" >s'inscrire</a></p>

					</div>

				</div>
			</nav>
					<input id="panel" type="text" class="btn-extended" placeholder="Recherchez votre film par son titre,réalisateur,acteur" />


					<main>
						<?php

						$nom = $_POST["nom"];
						$prenom = $_POST["prenom"];
						$email = $_POST["email"];
						$password = $_POST["motpasse"];
						$identifiant= $_POST["identifiant"];


						$serveur = 'sql.free.fr';

						$login = 'gregl74';

						$mot_de_passe = 'Thomas1974';

						$nom_bd = 'greggl74';

						try {
						    $conn = new PDO("mysql:host=$serveur;dbname=$nom_bd", $login, $mot_de_passe);
						    // set the PDO error mode to exception
						    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						    $conn->exec("SET CHARACTER SET utf8");








						    //test de l'existence ou non de l'utilisateur
						    $lienidutilisateur = $conn->query('SELECT ID_utilisateurs FROM utilisateurs WHERE identifiant = "'.$identifiant.'"');
						    $lienid = $lienidutilisateur->fetch();
						    $testutil = $lienid['ID_utilisateurs'];
						    if (empty($testutil)) {
						      //ajout dans la base si pas présent
						      $sql1 = "INSERT INTO utilisateurs (nom, prenom, email, password, identifiant, ID_administrateur)
						      VALUES ('$nom','$prenom','$email','$password','$identifiant','1')";
						      $conn->exec($sql1);
						      echo '<p class="modifphp">Votre compte a bien été créer !!! connectez-vous en entrant vos infos en haut à droite</p></br>';

						      echo '<a class="modifphp" href="index.php">ou retour à la page d accueil </a>';
						    }
						    else {
						          //message d'erreur si déja présent
						          echo '<p class="modifphp">Identifiant déja utilisé. Réessayez avec un autre</p></br>';
						    }



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

			<?php } ?>
