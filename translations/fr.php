<?php
	$trans=array();

	//***page d'aide, plus d'informations
	$trans["Plus d'informations"]="Plus d'informations";
	$trans["1. On suppose que l'attaquant effectue des attaques de type brute-force, c'est à dire que l'attaquant teste exhaustivement et les unes après les autres toutes les combinaisons de caractères qui pourraient avoir été utilisés pour écrire le mot de passe."]="1. On suppose que l'attaquant effectue des attaques de type brute-force, c'est à dire que l'attaquant teste exhaustivement et les unes après les autres toutes les combinaisons de caractères qui pourraient avoir été utilisés pour écrire le mot de passe.";
	$trans["L'attaquant ne considère l'attaque par dictionnaire à aucun moment. Il faut toutefois garder en mémoire que si la victime choisissait son mot de passe comme un mot du dictionnaire, le temps nécessaire pour casser son mot de passe serait grandement réduit."]="L'attaquant ne considère l'attaque par dictionnaire à aucun moment. Il faut toutefois garder en mémoire que si la victime choisissait son mot de passe comme un mot du dictionnaire, le temps nécessaire pour casser son mot de passe serait grandement réduit.";
	$trans["2. On suppose qu'il n'existe pas de vulnérabilités dans l'algorithme permettant de chiffrer le mot de passe. Si tel était le cas, le temps nécessaire pour trouver le mot de passe serait fortemment réduit."]="2. On suppose qu'il n'existe pas de vulnérabilités dans l'algorithme permettant de chiffrer le mot de passe. Si tel était le cas, le temps nécessaire pour trouver le mot de passe serait fortemment réduit.";
	$trans["3. Lorsque l'on effectue plusieurs attaques de type brute-force, en moyenne on estime que l'attaquant devine le mot de passe après avoir testé la moitié des combinaisons de mots de passe possibles."]="3. Lorsque l'on effectue plusieurs attaques de type brute-force, en moyenne on estime que l'attaquant devine le mot de passe après avoir testé la moitié des combinaisons de mots de passe possibles.";
	$trans["4. On estime que l'attaquant ne possède pas les informations liées à la longeur du mot de passe avant de lancer toute attaque."]="4. On estime que l'attaquant ne possède pas les informations liées à la longeur du mot de passe avant de lancer toute attaque.";
	$trans["À titre d'illustration, pour brute-forcer un mot de passe de 8 caractères, l'attaquant doit faire des brute-force successifs pour des mots de passe de 1, 2, 3, 4, 5, 6, 7 et finalement 8 caractères."]="À titre d'illustration, pour brute-forcer un mot de passe de 8 caractères, l'attaquant doit faire des brute-force successifs pour des mots de passe de 1, 2, 3, 4, 5, 6, 7 et finalement 8 caractères.";
	
	//une phrase
	$trans["5. Nous avons considéré qu'il fallait"]="5. Nous avons considéré qu'il fallait";
	$trans["opérations à virgule flottante pour évaluer un mot de passe."]="opérations à virgule flottante pour évaluer un mot de passe.";

	$trans["Pour plus d'informations, se reporter aux articles CASES Luxembourg suivants :"]="Pour plus d'informations, se reporter aux articles CASES Luxembourg suivants :";
	
	$trans["Fiche thématique <i>mots de passe</i>"]="Fiche thématique <i>mots de passe</i>";
	$transUrl['Fiche thématique mots de passe']="http://www.cases.lu/fr/publications/fiches/mots_de_passe/";

	$trans["Règles de comportement <i>mots de passe</i>"]="Règles de comportement <i>mots de passe</i>";
	$transUrl["Règles de comportement mots de passe"]="http://www.cases.public.lu/fr/pratique/comportement/mot_de_passe/";

	$trans["Fiche thématique <i>gestion des accès - menaces sur le déchiffrage</i>"]="Fiche thématique <i>gestion des accès - menaces sur le déchiffrage</i>";
	$transUrl["Fiche thématique gestion des accès - menaces sur le déchiffrage"]="http://www.cases.public.lu/fr/publications/fiches/gestion_acces/index.html#3";

	$trans["Liens externes : www.top500.org et boincstats.com"]="Liens externes : www.top500.org et boincstats.com";
	$trans["Fermer la fenêtre"]="Fermer la fenêtre";

	//***Aide attaque standard
	$trans["Attaque standard"]="Attaque standard";
	$trans["Attaque de type brute-force exécutée sur un PC familial récent utilisant des outils de cassage de mot de passe disponibles gratuitement sur internet."]="Attaque de type brute-force exécutée sur un PC familial récent utilisant des outils de cassage de mot de passe disponibles gratuitement sur internet.";
	
	//une phrase
	$trans["Puissance estimée :"]="Puissance estimée :";
	$trans["combinaisons testées par seconde."]="combinaisons testées par seconde.";

	//***Aide attaque distribuée
	$trans["Attaque distribuée"]="Attaque distribuée";
	
	//une phrase
	$trans["Mise en parallèle d'un réseau de"]="Mise en parallèle d'un réseau de";
	$trans["ordinateurs zombies au sein d'un même botnet (estimation) pour se répartir la tâche de casser un mot de passe."]="ordinateurs zombies au sein d'un même botnet (estimation) pour se répartir la tâche de casser un mot de passe.";
	
	//***Aide attaque top500 - number one
	$trans["Attaque avec l'ordinateur le plus puissant de la planète"]="Attaque avec l'ordinateur le plus puissant de la planète";
	$trans["Puissance de calcul de l'ordinateur le plus puissant de la planète."]="Puissance de calcul de l'ordinateur le plus puissant de la planète.";
	
	$trans["GFlops soit"]="GFlops soit";

	$trans["source : http://www.top500.org/"]="source : http://www.top500.org/";

	//***Aide attaque top500	
	$trans["Attaque utilisant les 500 plus puissants ordinateurs de la planète"]="Attaque utilisant les 500 plus puissants ordinateurs de la planète";
	$trans["Puissance de calcul obtenue en combinant le travail des 500 plus puissants ordinateurs de la planète (scénario peu concevable dans les faits)."]="Puissance de calcul obtenue en combinant le travail des 500 plus puissants ordinateurs de la planète (scénario peu concevable dans les faits).";
	

	//***Page principale
	$trans["Tester la résistance d'un mot de passe"]="Tester la résistance d'un mot de passe";
	$trans["1. Combien de caractères composent le mot de passe ?"]="1. Combien de caractères composent le mot de passe ?";
	$trans["Le mot de passe est composé de"]="Le mot de passe est composé de";
	$trans["caractères."]="caractères.";
	$trans["2. Quels sont les caractères utilisés dans le mot de passe ?"]="2. Quels sont les caractères utilisés dans le mot de passe ?";
	$trans["Minuscules - a..z"]="Minuscules - a..z";
	$trans["Majuscules - A..Z"]="Majuscules - A..Z";
	$trans["Chiffres - 0..9"]="Chiffres - 0..9";
	$trans["Caractères spéciaux et signes de ponctuation - [](){}@#*.;-_!?, etc."]="Caractères spéciaux - [](){}@#*.;-_!?, etc.";
	$trans["Evaluer la résistance du mot de passe"]="Evaluer la résistance du mot de passe";
	
	//***Partie résultats
	$trans["Evaluation de la résistance du mot de passe à différentes attaques brute-force"]="Evaluation de la résistance du mot de passe à différentes attaques brute-force";
	$trans["Votre mot de passe ne comprend aucun caractère, il s'agit donc du mot de passe vide qui est trivial à deviner ;)"]="Votre mot de passe ne comprend aucun caractère, il s'agit donc du mot de passe vide qui est trivial à deviner ;)";
	$trans["Jours"]="Jours";
	$trans["Années"]="Années";
	$trans["Siècles"]="Siècles";
	$trans["Résistance à une"]="Résistance à une";
	$trans["attaque standard"]="attaque standard";
	$trans["attaque distribuée"]="attaque distribuée";
	$trans["attaque avec l'ordinateur le plus puissant de la planète"]="attaque avec l'ordinateur le plus puissant de la planète";
	$trans["attaque utilisant les 500 plus puissants ordinateurs de la planète"]="attaque utilisant les 500 plus puissants ordinateurs de la planète";

	$trans["instantané"]="instantané";
        $trans["minute"]="minute";
        $trans["minutes"]="minutes";
        $trans["heure"]="heure";
        $trans["heures"]="heures";
        $trans["jour"]="jour";
        $trans["jours"]="jours";
        $trans["année"]="année";
        $trans["années"]="années";
        $trans["siècle"]="siècle";
        $trans["siècles"]="siècles";
	$trans["millénaire"]="millénaire";
        $trans["millénaires"]="millénaires";
        $trans["soit"]="soit";
        $trans["Retour"]="Recommencer";
        $trans["Suivant"]="Suivant";
        $trans["Vous devez choisir au moins un jeu de caractères!"]="Vous devez choisir au moins un jeu de caractères!";
	
	$trans['']='';
	$trans["Temps requis"]="Temps requis";
