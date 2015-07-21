<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Inscription</title>
  </head>
  
  <body>	

	<?php
		require_once('connectBase.php');
		$membres = $m->rbunel35->ListeMembres;

		// cette fonction récupère depuis $_POST les champs rentrés en input et renvoie
		// le tableau associatif correspondant
		function document_from_post(){	
			$a = $_POST['nom'];
			$b = $_POST['prenom'];
			$c = intval($_POST['age']);
			$d = $_POST['pseudo'];
			$e = $_POST['mail'];
			return array('Nom'=>$a, 'Prenom'=>$b, 'Age'=>$c, 'Pseudo'=>$d, 'Adresse'=>$e);
		}

		// si l'utilisateur n'est pas déjà dans la collection et que le champs sont tous pleins
		// alors on l'ajoute (pour le if, la chaine vide éventuellement renvoyée par isInCollection correspond à false)
		// renvoie true si l'insertion a fonctionné, false sinon
		function insert_from_post($collec, $doc1, $b){
			if(!isInCollection($collec, $doc1) && champsPleins($doc1)){
				$a = hash('sha256', $b);
				$doc1['Password'] = $a;
				$collec->insert($doc1);
				return true; 
			}
			else return false;		 
		}

		// renvoie une chaîne vide si l'utilsateur n'est pas dans la collection, et renvoie sinon
		// une chaine correspondant à ce qui n'a pas fonctionné
		function isInCollection($collec, $doc1){
			$query = array();
			$cursor = $collec->find($query);
			foreach($cursor as $cle=>$valeur){
				if ($valeur['Adresse'] == $doc1['Adresse']) return "adresse";
				if ($valeur['Pseudo'] == $doc1['Pseudo']) return "pseudo";
			}
			return "";
		}

		// renvoie false si un des champs n'est pas rempli, true sinon
		function champsPleins($doc1){
			if(empty($doc1['Nom']) || empty($doc1['Prenom']) || empty($doc1['Adresse']) || empty($doc1['Pseudo']) || empty($doc1['Age']))
				return false;
			return true;
		}
	
		// renvoie un mot de passe de 10 caractères aléatoires
		function motDePasseAleatoire(){
			$a = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	
			$b = "";
			for($i = 0; $i <10; $i++)
				$b .= $a[rand(0,61)];
			return $b;
		}
			
		$doc1 = document_from_post();
		$b = motDePasseAleatoire();
		if(insert_from_post($membres, $doc1, $b)){
			$a = $_POST['mail'];
			echo "Félicitations, vous êtes désormais incrits !<br />Notez bien votre mot de passe pour vous connecter: $b";
		}
		else{ // si l'insertion n'a pas eu lieu, on affiche un message en fonction du résultat de isInCollection
			if(isInCollection($membres, $doc1) == "adresse") echo "Cette adresse mail est déjà utilisée par un autre membre.";
			else if(isInCollection($membres, $doc1) == "pseudo") echo "Ce pseudo existe déjà.";
			else echo "Un champ est manquant, veuillez réessayer";
		}
		
		echo "<br /><a href='.'> Retour </a>"
	?>

   </body>
</html>
