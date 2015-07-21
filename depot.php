<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Depot</title>
  </head>
  
  <body>

  <?php
  
	// empêche l'utilisateur d'arriver par un autre chemin que depotArticle.php
	if(!isset($_SESSION['User']) || !isset($_POST['titre'])) echo "Vous ne pouvez accéder à cette page.\n<br />\n<a href='.'>Retour à l'accueil</a>\n";
	else{
		require_once('connectBase.php');
		$article = $m->rbunel35->ArticlesEnAttente;
		$cursor1 = $article->find(array());
		$articlesValidés = $m->rbunel35->Articles;
		$cursor2 = $articlesValidés->find(array());
		
		// fonctionne globalement de la même manière que inserer2.php
		
		// Pour qu'un article soit valide, on demande au moins le titre, une url et un mot clé.
		// De plus, deux articles différents ne peuvent pas avoir le même titre.
		function champsPleins($doc1){
		if(empty($doc1['Titre']) || empty($doc1['Tag1']) || empty($doc1['File1']))
			return false;
		return true;
		}

		function document_from_post(){	
		$a = $_POST['titre'];
		$b = $_POST['article'];
		$c = $_POST['tag1'];
		$d = $_POST['tag2'];
		$e = $_POST['tag3'];
		$f = $_POST['file1'];
		$g = $_POST['file2'];
		$h = $_POST['file3'];
		return array('Titre'=>$a, 'Article'=>$b, 'Tag1'=>$c, 'Tag2'=>$d, 'Tag3'=>$e, 'File1'=>$f, 'File2'=>$g, 'File3'=>$h);
		}
		
		// vérifie si un article ne possède pas déjà le même titre (dans les articles en attente ET les validés)
		function isInCollection($titre, $collec1, $collec2){
			foreach($collec1 as $cle=>$valeur){
				if($valeur['Titre'] == $titre) return true;
			}
			foreach($collec2 as $cle=>$valeur){
				if($valeur['Titre'] == $titre) return true;
			}		
			return false;
		}

		$doc = document_from_post();
		if(champsPleins($doc) && !isInCollection($doc['Titre'], $cursor1, $cursor2)){
			$doc['Owner'] = $_SESSION['User'];
			$article->insert($doc);
			echo "Insertion de l'article réussie. Celui-ci apparaitra dans la liste lorsque l'administrateur aura confirmé son contenu.\n<br />\n";
		}
		else echo "Des champs sont manquants ou un article possédant le même titre existe déjà, veuillez retenter.\n<br />\n";
		echo "<a href='.'>Retour à l'accueil<a>\n";
	}
  ?>

  </body>
</html>
