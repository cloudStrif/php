Voil� un grand nombre d'informations utiles:



- Je te conseille de lire tout le readme avant de commencer � travailler avec mes fichiers.


- j'ai test� tous mes fichiers, ils fontionnent tous comme pr�vu.


- Normalement j'ai s�curis� le site au maximum (des methodes qu'on a vues au moins).


- j'ai �crit mes fichiers avec notepad (windows) alors l'indentation sera peut-etre diff�rente sous emacs/gedit,
essaye de l'adapter car je pense que les profs corrigeront sous linux et pas windows


- j'ai �crit un fichier 'index.php' pour mes tests, mais t'es pas oblig� de la reprendre, il ne contient que des liens
vers les autres fichiers.


- dans beaucoup de page, je met un lien "Retour � l'accueil", il est pas n�c�ssaire vu que normalement tu met un menu
sur toutes les pages. Si tu veux, tu pourra donc les enlever.


- $_SESSION['User'] sert � d�finir si un utlisateur est connect� et si oui lequel (c'est le pesudo qui est retenu).


- j'ai inclus un fichier 'remove.php' qui n'affiche rien mais qui enl�ve tous les articles en attente de validation et valid�s,
tous les commentaires en attente et valid�s et tous les membres sauf Admin. Ce fichier ne sera pas dans le projet final, c'est
juste pour t'aider.


- Justement, le membre 'Admin' poss�de des droits particuliers: dans mon plan, le seul moyen d'acc�der � 'admin.php' est un lien
depuis 'profil.php' ssi 'Admin' est connect�. Son mot de passe par d�faut est 'admin' (sans majuscule au 'a').


- le fonctionnement de 'admin.php' et 'validation.php' est un peu compliqu�. M�me si tu le comprend pas, laisse le tel quel,
il fonctionne comme �a.


- j'utilise souvent pour des liens un href='.', ce lien renvoie vers le dossier courant et donc par d�faut vers index.php


- lorsque je met un bouton 'deconnexion', j'utilise $_SERVER['PHP_SELF'] qui r�cup�re l'adresse courante d'un fichier php, fais
attention de ne pas l'utiliser sur un fichier html.


- le fichier ListeArticles.php peut etre appel� de trois mani�re diff�rentes:
	- directement depuis le menu, il affiche dans ce cas tous les articles, si l'utilisateur est connect�
	- depuis un champ de recherche, il affiche les articles correspondant � un mot cl� donn�
	- depuis profil.php, il affiche alors les articles soumis par l'utilisateur courant


- Si tu n'est pas connect�, tu ne peut acc�der � aucun article.


- je n'ai pas �crit de champ de recherche, ce n'est que du html, je te laisse l'ins�rer o� tu veux, il ressemblera
� �a: <form method='get' action='ListeArticles.php'><input type='text' name='keyword'><input type='submit' value='Rechercher'></form>"
(on peut le passer par $_GET vu que ce n'est rien d'important.


- Utilise bien 'keyword' comme nom, car c'est le mot que j'ai utiliser dans ListeArticles.php


- Si tu veux tester tes fichiers, tu peut les mettre en ligne depuis l'ent (section d�pot) puis les executer avec wpams.


- Le serveur wpams bug parfois mais faut insister et rafraichir la page plusieurs fois...


- Attention cependant, dans beaucoup de mes fichiers, je me connecte � la base 'rbunel35', si tu veux te connecter � la tienne,
il faudra modifier �a dans CHAQUE fichier (je sais c'est chiant mais pas le choix....)


- Je t'envoie d'ailleurs mes fichiers azerty.php et connectBase.php mais tu dois avoir les tiens (ceux l� correspondent � MA base de donn�es).


- J'ai essay� d'expliquer ce que je faisais avec des commentaires mais si il y a des trucs que tu ne comprend pas ou alors si je
me suis tromp� quelque part, demande moi sur facebook, ou corrige toi m�me si c'est une erreur.


- Si ce que je fais est trop �vident (genre j'affiche juste des formulaires) j'ai pas mis de commentaires.


- Cependant, je sais pas si j'aurais internet la semaine prochaine � Amsterdam...


- je te laisse bien sur modifier les affichages que j'ai fait � ta mani�re.


- si tu veux ajouter du code html dans du php, pense bien a mettre un "\n" apr�s chaque balise refermante pour a�rer le code comme 
je l'ai fait.


- Pense aussi � r�guli�rement valider tes pages sur le validateur.


- Finalement, je pr�f�re ne pas mettre mon morpion. Si tu veux mettre des captures d'�cran de tes jeux JAVA, tu peut d�poser des 
articles avec comme lien des hebergeur d'images de tes captures d'�cran (imageshack par exemple).


- N'h�site pas � rajouter des commentaires pour les correcteurs.


- Si tu as fini avant la fin des vacances, n'h�site pas � m'envoyer sur facebook ton code pour que je vois ce que t'as fait.


- Si je repense � des trucs que j'ai oubliez de te dire, je te les enverrai sur facebook.


- Voil�, normalement tu as toutes les infos qu'il te faut, je te laisse travailler...
