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
//on reagrde dans la BD si les infos du formulaire correspondent bien à un utilisateur (1 si oui )
$requete1 = $dbh->query("SELECT COUNT(*) FROM administrateur WHERE identifiant = '".$_POST['identifiant']."' AND password = '".$_POST['password']."'") ;
$donnees1 = $requete1->fetchColumn().'entrees\n';
//on reagrde dans la BD si les infos du formulaire correspondent bien à un administrateur (1 si oui)
$requete2 = $dbh->query("SELECT COUNT(*) FROM utilisateurs WHERE identifiant = '".$_POST['identifiant']."' AND password = '".$_POST['password']."'") ;
$donnees2 = $requete2->fetchColumn().'entrees\n';


// on teste si nos variables sont définies
if (isset($_POST['identifiant']) && isset($_POST['password'])) {

	if ($donnees2 == 1) {
		// dans ce cas, tout est ok, on peut démarrer notre session

		session_start ();
		// on enregistre les paramètres de notre visiteur comme variables de session
		$_SESSION['login'] = $_POST['identifiant'];
		$_SESSION['pwd'] = $_POST['password'];
    $_SESSION['test'] = $_POST['identifiant'];
		// on redirige notre utilisateur vers une page de notre section membre
		header ('Location: page_membre.php');
	}
	else {
    if($donnees1 == 1) {
      // dans ce cas, tout est ok, on peut démarrer notre session administrateur

      session_start ();
      // on enregistre les paramètres de notre visiteur comme variables de session
      $_SESSION['login'] = $_POST['identifiant'];
      $_SESSION['pwd'] = $_POST['password'];
      $_SESSION['test2'] = $_POST['identifiant'];
      // on redirige notre visiteur vers la page d'administration
      header ('Location: admin.php');
    }
    else {
      // Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
  		echo '<body onLoad="alert(\'Membre non reconnu...\')">';
  		// puis on le redirige vers la page d'accueil
  		echo '<meta http-equiv="refresh" content="0;URL=index.php">';
    }

	}
}
else {
	echo 'Les variables du formulaire ne sont pas déclarées.';
}
?>
