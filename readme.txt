Voilà un grand nombre d'informations utiles:



- Je te conseille de lire tout le readme avant de commencer à travailler avec mes fichiers.


- j'ai testé tous mes fichiers, ils fontionnent tous comme prévu.


- Normalement j'ai sécurisé le site au maximum (des methodes qu'on a vues au moins).


- j'ai écrit mes fichiers avec notepad (windows) alors l'indentation sera peut-etre différente sous emacs/gedit,
essaye de l'adapter car je pense que les profs corrigeront sous linux et pas windows


- j'ai écrit un fichier 'index.php' pour mes tests, mais t'es pas obligé de la reprendre, il ne contient que des liens
vers les autres fichiers.


- dans beaucoup de page, je met un lien "Retour à l'accueil", il est pas nécéssaire vu que normalement tu met un menu
sur toutes les pages. Si tu veux, tu pourra donc les enlever.


- $_SESSION['User'] sert à définir si un utlisateur est connecté et si oui lequel (c'est le pesudo qui est retenu).


- j'ai inclus un fichier 'remove.php' qui n'affiche rien mais qui enlève tous les articles en attente de validation et validés,
tous les commentaires en attente et validés et tous les membres sauf Admin. Ce fichier ne sera pas dans le projet final, c'est
juste pour t'aider.


- Justement, le membre 'Admin' possède des droits particuliers: dans mon plan, le seul moyen d'accéder à 'admin.php' est un lien
depuis 'profil.php' ssi 'Admin' est connecté. Son mot de passe par défaut est 'admin' (sans majuscule au 'a').


- le fonctionnement de 'admin.php' et 'validation.php' est un peu compliqué. Même si tu le comprend pas, laisse le tel quel,
il fonctionne comme ça.


- j'utilise souvent pour des liens un href='.', ce lien renvoie vers le dossier courant et donc par défaut vers index.php


- lorsque je met un bouton 'deconnexion', j'utilise $_SERVER['PHP_SELF'] qui récupère l'adresse courante d'un fichier php, fais
attention de ne pas l'utiliser sur un fichier html.


- le fichier ListeArticles.php peut etre appelé de trois manière différentes:
	- directement depuis le menu, il affiche dans ce cas tous les articles, si l'utilisateur est connecté
	- depuis un champ de recherche, il affiche les articles correspondant à un mot clé donné
	- depuis profil.php, il affiche alors les articles soumis par l'utilisateur courant


- Si tu n'est pas connecté, tu ne peut accéder à aucun article.


- je n'ai pas écrit de champ de recherche, ce n'est que du html, je te laisse l'insérer où tu veux, il ressemblera
à ça: <form method='get' action='ListeArticles.php'><input type='text' name='keyword'><input type='submit' value='Rechercher'></form>"
(on peut le passer par $_GET vu que ce n'est rien d'important.


- Utilise bien 'keyword' comme nom, car c'est le mot que j'ai utiliser dans ListeArticles.php


- Si tu veux tester tes fichiers, tu peut les mettre en ligne depuis l'ent (section dépot) puis les executer avec wpams.


- Le serveur wpams bug parfois mais faut insister et rafraichir la page plusieurs fois...


- Attention cependant, dans beaucoup de mes fichiers, je me connecte à la base 'rbunel35', si tu veux te connecter à la tienne,
il faudra modifier ça dans CHAQUE fichier (je sais c'est chiant mais pas le choix....)


- Je t'envoie d'ailleurs mes fichiers azerty.php et connectBase.php mais tu dois avoir les tiens (ceux là correspondent à MA base de données).


- J'ai essayé d'expliquer ce que je faisais avec des commentaires mais si il y a des trucs que tu ne comprend pas ou alors si je
me suis trompé quelque part, demande moi sur facebook, ou corrige toi même si c'est une erreur.


- Si ce que je fais est trop évident (genre j'affiche juste des formulaires) j'ai pas mis de commentaires.


- Cependant, je sais pas si j'aurais internet la semaine prochaine à Amsterdam...


- je te laisse bien sur modifier les affichages que j'ai fait à ta manière.


- si tu veux ajouter du code html dans du php, pense bien a mettre un "\n" après chaque balise refermante pour aérer le code comme 
je l'ai fait.


- Pense aussi à régulièrement valider tes pages sur le validateur.


- Finalement, je préfère ne pas mettre mon morpion. Si tu veux mettre des captures d'écran de tes jeux JAVA, tu peut déposer des 
articles avec comme lien des hebergeur d'images de tes captures d'écran (imageshack par exemple).


- N'hésite pas à rajouter des commentaires pour les correcteurs.


- Si tu as fini avant la fin des vacances, n'hésite pas à m'envoyer sur facebook ton code pour que je vois ce que t'as fait.


- Si je repense à des trucs que j'ai oubliez de te dire, je te les enverrai sur facebook.


- Voilà, normalement tu as toutes les infos qu'il te faut, je te laisse travailler...
