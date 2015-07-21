<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Profil</title>
  </head>
  
  <body>
  
  <?php
  
	if(!isset($_POST['check']) || $_POST['check'] != 'ok')
		echo "Vous ne pouvez pas accéder à cette page.\n<br /><br />\<a href='.'>Retour à l'accueil</a>\n";
		// sert à prévenir le cas ou on tente d'accéder à cette page sans passer par la page "profil"
	else{
		require_once('connectBase.php');
		$membres = $m->rbunel35->ListeMembres;
		$user = $_SESSION['User'];
		$query = array('Pseudo'=>$user);
		$cursor = $membres->find($query);
		$pw = true;
		foreach($cursor as $cle=>$valeur){
			// cette boucle ne s'éxecute en réalité qu'une seule fois
			// si rien n'a été rentré (empty renvoie alors true) on garde l'ancienne valeur,
			// sinon on prend la nouvelle
			if(empty($_POST['Nom'])) $a = $valeur['Nom'];
			else $a = $_POST['Nom'];
			if(empty($_POST['Prénom'])) $b = $valeur['Prenom'];
			else $b = $_POST['Prénom'];
			if(empty($_POST['Age'])) $c = $valeur['Age'];
			else $c = $_POST['Age'];
			if(empty($_POST['mail'])) $d = $valeur['Adresse'];
			else $d = $_POST['mail'];
			$e = $_POST['currentPW'];
			$f = $_POST['newPW'];
			if(!empty($e) && !empty($f))
				if ((hash('sha256', $e) == $valeur['Password'])) $e = hash('sha256', $f);
				else{ $pw = false; $e = $valeur['Password']; }
			else $e = $valeur['Password'];
		}
		// on enlève l'utilisateur puis on le rajoute avec les modifications
		$membres->remove($query);
		$doc = array('Nom'=>$a, 'Prenom'=>$b, 'Age'=>$c, 'Pseudo'=>$user, 'Adresse'=>$d, 'Password'=>$e);
		$membres->insert($doc);
		echo "Les modification ont été effectuées !\n<br />\n";
		// pw sert juste à savoir si le mot de passe rentré était le bon
		if(!$pw) echo "Seul le mot de passe n'a pas pu être changé suite à une erreur de votre part.<br /><br />\n";
		echo "<a href='.'>Retour à l'accueil</a>\n";
	}
  ?>
 
 </body>
</html>
