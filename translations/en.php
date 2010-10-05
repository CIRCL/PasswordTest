<?php
	$trans=array();

	//***page d'aide, plus d'informations
	$trans["Plus d'informations"]="Further information";
	$trans["1. On suppose que l'attaquant effectue des attaques de type brute-force, c'est à dire que l'attaquant teste exhaustivement et les unes après les autres toutes les combinaisons de caractères qui pourraient avoir été utilisés pour écrire le mot de passe."]
	="1. Presumably the attacker uses the brute-force technique which means that the attacker tries every possible combination of passwords one after another.";
	$trans["L'attaquant ne considère l'attaque par dictionnaire à aucun moment. Il faut toutefois garder en mémoire que si la victime choisissait son mot de passe comme un mot du dictionnaire, le temps nécessaire pour casser son mot de passe serait grandement réduit."]
	="The attacker does not consider a dictionary attack. Nevertheless you have to bear in mind that if the victim choses a dictionary word the time to guess the password could be greatly shortened as the attacker would only need to try words from a dictionary.";
	$trans["2. On suppose qu'il n'existe pas de vulnérabilités dans l'algorithme permettant de chiffrer le mot de passe. Si tel était le cas, le temps nécessaire pour trouver le mot de passe serait fortemment réduit."]
	="2. Presumably there is no flaw in the cryptographic algorithm. If this was not the case the time to guess the password would be greatly shortened.";
	$trans["3. Lorsque l'on effectue plusieurs attaques de type brute-force, en moyenne on estime que l'attaquant devine le mot de passe après avoir testé la moitié des combinaisons de mots de passe possibles."]
	="3. When using brute-force attacks, in average the passwords are found after 50% of tested permutations.";
	$trans["4. On estime que l'attaquant ne possède pas les informations liées à la longeur du mot de passe avant de lancer toute attaque."]
	="4. Presumably the attacker does not know the size of the password before any attack.";
	$trans["À titre d'illustration, pour brute-forcer un mot de passe de 8 caractères, l'attaquant doit faire des brute-force successifs pour des mots de passe de 1, 2, 3, 4, 5, 6, 7 et finalement 8 caractères."]
	="To illustrate this, to brute-force a password composed of 8 characters, the attacker has to try first the passwords with 1,2,3,4,5,6,7 and finally 8 characters.";
	
	//une phrase
	$trans["5. Nous avons considéré qu'il fallait"]="5. We considered you need";
	$trans["opérations à virgule flottante pour évaluer un mot de passe."]="floating point operations to check a password.";
	$trans["Pour plus d'informations, se reporter aux articles CASES Luxembourg suivants :"]="For further information please read the following CASES Luxembourg articles (in french):";

// On n'a pas de trucs en Anglais :(	
	$trans["Fiche thématique <i>mots de passe</i>"]="Publication on <i>passwords</i>";
	$transUrl['Fiche thématique mots de passe']="http://www.cases.lu/en/publications/fiches/mots_de_passe/";

	$trans["Règles de comportement <i>mots de passe</i>"]="Good practices <i>passwords</i>";
	$transUrl["Règles de comportement mots de passe"]="http://www.cases.public.lu/fr/pratique/comportement/mot_de_passe/";

	$trans["Fiche thématique <i>gestion des accès - menaces sur le déchiffrage</i>"]="Publication on <i>access management - threats on decryption</i>";
	$transUrl["Fiche thématique gestion des accès - menaces sur le déchiffrage"]="http://www.cases.public.lu/fr/publications/fiches/gestion_acces/index.html#3";

	$trans["Liens externes : www.top500.org et boincstats.com"]="External links : www.top500.org and boincstats.com";
	$trans["Fermer la fenêtre"]="Close window";

	//***Aide attaque standard
	$trans["Attaque standard"]="Standard attack";
	$trans["Attaque de type brute-force exécutée sur un PC familial récent utilisant des outils de cassage de mot de passe disponibles gratuitement sur internet."]
	="Brute-force attack from a contemporary home computer using free password guessing tools.";
	
	//une phrase
	$trans["Puissance estimée :"]="Estimated power :";
	$trans["combinaisons testées par seconde."]="combinations tested per second.";

	//***Aide attaque distribuée
	$trans["Attaque distribuée"]="Distributed attack";
	
	//une phrase
	$trans["Mise en parallèle d'un réseau de"]="Distributed network with";
	$trans["ordinateurs zombies au sein d'un même botnet (estimation) pour se répartir la tâche de casser un mot de passe."]
	="zombie Computers from the same botnet (estimate) to break a password.";
	
	//***Aide attaque top500 - number one
	$trans["Attaque avec l'ordinateur le plus puissant de la planète"]="Attack with the most powerful Computer on earth";
	$trans["Puissance de calcul de l'ordinateur le plus puissant de la planète."]="Computing power of the fastest Computer on the planet";

// WTF?
	$trans["GFlops soit"]="GFlops or";

	$trans["source : http://www.top500.org/"]="source : http://www.top500.org/";

	//***Aide attaque top500	
	$trans["Attaque utilisant les 500 plus puissants ordinateurs de la planète"]="Attack using the 500 most powerful computers on the planet";
	$trans["Puissance de calcul obtenue en combinant le travail des 500 plus puissants ordinateurs de la planète (scénario peu concevable dans les faits)."]
	="Combined Computing power of the 500 most powerful computers on the planet (very unlikely scenario).";
	

	//***Page principale
	$trans["Tester la résistance d'un mot de passe"]="Test your password strength";
	$trans["1. Combien de caractères composent le mot de passe ?"]="1. How long is your password ?";
	$trans["Le mot de passe est composé de"]="The password contains";
	$trans["caractères."]="characters.";
	$trans["2. Quels sont les caractères utilisés dans le mot de passe ?"]="2. Which characters are used in your password?";
	$trans["Minuscules - a..z"]="Lower case letters - a..z";
	$trans["Majuscules - A..Z"]="Upper case letters - A..Z";
	$trans["Chiffres - 0..9"]="Numbers - 0..9";
	$trans["Caractères spéciaux et signes de ponctuation - [](){}@#*.;-_!?, etc."]="Special characters - [](){}@#*.;-_!?, etc.";
	$trans["Evaluer la résistance du mot de passe"]="Evaluate your password strength";
	
	//***Partie résultats
	$trans["Evaluation de la résistance du mot de passe à différentes attaques brute-force"]="Password strengths against different brute-force attacks";
	$trans["Votre mot de passe ne comprend aucun caractère, il s'agit donc du mot de passe vide qui est trivial à deviner ;)"]="Your password contains no characters, which means an empty password and which is too easy to guess ;)";
	$trans["Jours"]="Days";
	$trans["Années"]="Years";
	$trans["Siècles"]="Centuries";
	$trans["Résistance à une"]="Resistance to a";
	$trans["attaque standard"]="standard attack";
	$trans["attaque distribuée"]="distributed attack";
	$trans["attaque avec l'ordinateur le plus puissant de la planète"]="attack with the most powerful computer on earth";
	$trans["attaque utilisant les 500 plus puissants ordinateurs de la planète"]="attack using the top 500 Computers on earth";
	
	$trans["instantané"]="instantly";
	$trans["minute(s)"]="minute(s)";
	$trans["heure(s)"]="hour(s)";
	$trans["jours"]="days";
	$trans["année(s)"]="year(s)";
	$trans["siècle(s)"]="centur-y(-ies)";
	$trans["soit"]="or";
	$trans["Retour"]="Back";
	$trans["Suivant"]="Next";
	$trans["Vous devez choisir au moins un jeu de caractères!"]="You need to select at least one character set!";