<?php

		// je vide toutes les collections et je remet Admin par la suite.
		require_once('connectBase.php');
		$membres = $m->rbunel35->ListeMembres;			
		$query = array();
		$membres->remove($query);
		$article = $m->rbunel35->ArticlesEnAttente;
		$article->remove($query);
		$articlesValidés = $m->rbunel35->Articles;
		$articlesValidés->remove($query);
		$com = $m->rbunel35->CommentairesEnAttente;
		$com->remove($query);
		$comValidés = $m->rbunel35->Commentaires;
		$comValidés->remove($query);
		$b = hash('sha256', 'admin');
		$a = array('Pseudo'=>'Admin', 'Nom'=>'Admin', 'Prenom'=>'Admin', 'Age'=>'42', 'Adresse'=>'admin@admin', 'Password'=>"$b");
		$membres->insert($a);
?>
