<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Deconnexion</title>
  </head>
  
  <body>
  
  <?php
	// url contient l'adresse où se situait l'utilisateur quand il a cliqué sur déconnexion,
	// le lien de retour pointe alors vers cette adresse
	if(isset($_POST['url'])){
		$a = $_POST['url'];
		unset($_SESSION['User']);
		echo "Déconnexion réussie ! <a href=\"$a\"> Retour</a>";
	}
	// si on accède à cette page sans passer par un bouton déconnexion, le lien de retour
	// pointe vers l'accueil
	else{
		unset($_SESSION['User']);
		echo "Déconnexion réussie ! <a href='.'> Retour à l'accueil</a>";
	}
?>