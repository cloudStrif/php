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
	if(!isset($_SESSION['User'])) echo "Veuillez vous connecter pour accéder à votre profil.\n<br />\n<a href='.'>Retour à l'accueil.</a>\n";
	else{
		require_once('connectBase.php');
		$membres = $m->rbunel35->ListeMembres;
		$user = $_SESSION['User'];
		$cursor = $membres->find(array('Pseudo'=>$user));
		foreach($cursor as $cle=>$valeur){
			// cette boucle ne s'éxecute en réalité qu'une seule fois
			$a = $valeur['Nom'];
			$b = $valeur['Prenom'];
			$c = $valeur['Age'];
			$d = $valeur['Adresse'];
		}
		echo "Vous pouvez configurer vos données. Un champ laissé vide ne provoquera aucune modification :\n<br /><br />\n";
		echo "<form method='post' action='changementProfil.php'>\nNom: <input type='text' name='Nom' placeholder=$a>\n<br /><br />\nPrénom: <input type='text' name='Prénom' placeholder=$b>\n<br /><br />\nAge: <input type='text' name='Age' placeholder=$c>\n<br /><br />\nE-mail: <input type='mail' name='mail' placeholder=$d>\n<br /><br />\n";
		echo "Pour changer votre mot de passe, tapez votre mot de passe actuel puis votre mot de passe souhaité :<br /><br />";
		echo "<input type='password' name='currentPW' placeholder='Mot de passe actuel...'>\n<br /><br />\n<input type='password' name='newPW' placeholder='Nouveau mot de passe...'>\n<br /><br />\n<input type='hidden' name='check' value='ok'>\n\n<input type='submit' value='Valider'>\n</form>\n<br /><br />\n";
		
		echo "<a href='ListeArticles.php?mode=user'>Cliquer ici pour voir les articles que vous avez publiés.</a>\n<br /><br />\n";
		
		//si l'utilisateur est l'amdinistrateur:
		if($user == 'Admin') echo "<br />\n<a href='admin.php'>Page administrateur<a>\n";
	}	
	?>
    
  </body>
</html>
