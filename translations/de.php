<?php
	$trans=array();

	//***page d'aide, plus d'informations
	$trans["Plus d'informations"]="Weitere Informationen";
	$trans["1. On suppose que l'attaquant effectue des attaques de type brute-force, c'est à dire que l'attaquant teste exhaustivement et les unes après les autres toutes les combinaisons de caractères qui pourraient avoir été utilisés pour écrire le mot de passe."]="1. Es wird angenommen, dass der Angreifer eine brute-force Attacke macht, also alle erdenklichen Kombinationen von Zeichen ausprobiert.";
	$trans["L'attaquant ne considère l'attaque par dictionnaire à aucun moment. Il faut toutefois garder en mémoire que si la victime choisissait son mot de passe comme un mot du dictionnaire, le temps nécessaire pour casser son mot de passe serait grandement réduit."]="Der Angreifer versucht zu keinem Moment eine Wörterbuch-Attacke. Falls das Opfer jedoch ein Wort aus einem Wörterbuch als Passwort benutzt, wäre die benötigte Zeit, das Passwort herauszufinden stark reduziert.";
	$trans["2. On suppose qu'il n'existe pas de vulnérabilités dans l'algorithme permettant de chiffrer le mot de passe. Si tel était le cas, le temps nécessaire pour trouver le mot de passe serait fortemment réduit."]="2. Es wird angenommen, dass sich keine Schwachstelle im Algorithmus befindet, der zur Verschlüsselung des Passworts benutzt wird. Falls dies der Fall wäre, dann wäre die Zeit um das Passwort zu finden stark reduziert.";
	$trans["3. Lorsque l'on effectue plusieurs attaques de type brute-force, en moyenne on estime que l'attaquant devine le mot de passe après avoir testé la moitié des combinaisons de mots de passe possibles."]="3. Falls eine brute-force Attacke gemacht wird, nimmt man an, dass der Angreifer im Mittel nur die Hälfte alle Kombinationen testen muss bis er das richtige Passwort gefunden hat.";
	$trans["4. On estime que l'attaquant ne possède pas les informations liées à la longeur du mot de passe avant de lancer toute attaque."]="4. Es wird angenommen, dass der Angreifer keine Informationen darüber hat, wie lange das Passwort in Wirklichkeit ist.";
	$trans["À titre d'illustration, pour brute-forcer un mot de passe de 8 caractères, l'attaquant doit faire des brute-force successifs pour des mots de passe de 1, 2, 3, 4, 5, 6, 7 et finalement 8 caractères."]="Um eine brute-force Attacke auf ein Passwort mit einer Länge von 8 Zeichen durchzuführen, muss der Angreifer sukzessive Passwörter der Länge 1, 2, 3, 4, 5, 6, 7 und schlussendlich 8 Zeichen durchprobieren.";
	
	//une phrase
	$trans["5. Nous avons considéré qu'il fallait"]="5. Es wird angenommen, dass es";
	$trans["opérations à virgule flottante pour évaluer un mot de passe."]="Fließkommaoperationen die benötigt werden um das Passwort herauszufinden.";

	$trans["Pour plus d'informations, se reporter aux articles CASES Luxembourg suivants :"]="Für weitere Informationen, lesen Sie folgende Artikel von CASES:";
	
	$trans["Fiche thématique <i>mots de passe</i>"]="Themenblatt <i>Passwörter</i>";
	$transUrl["Fiche thématique mots de passe"]="http://www.cases.lu/de/publications/fiches/mots_de_passe/";

	$trans["Règles de comportement <i>mots de passe</i>"]="Verhaltensregeln <i>Passwörter</i>";
	$transUrl["Règles de comportement mots de passe"]="http://www.cases.public.lu/de/pratique/comportement/mot_de_passe/";

	$trans["Fiche thématique <i>gestion des accès - menaces sur le déchiffrage</i>"]="Themenblatt <i>Zugriffsverwaltung</i>";
	$transUrl["Fiche thématique gestion des accès - menaces sur le déchiffrage"]="http://www.cases.public.lu/de/publications/fiches/Zugriffsverwaltung/index.html#3";

	$trans["Liens externes : www.top500.org et boincstats.com"]="Externe Links : www.top500.org und boincstats.com";
	$trans["Fermer la fenêtre"]="Fenster schließen";

	//***Aide attaque standard
	$trans["Attaque standard"]="Standardangriff";
	$trans["Attaque de type brute-force exécutée sur un PC familial récent utilisant des outils de cassage de mot de passe disponibles gratuitement sur internet."]="Brute-force Aegriff, der auf einem Familien-Rechner neuerer Bauart durchgeführt wird, mit Hilfe von Programmen, die frei im Internet erhältlich sind.";
	
	//une phrase
	$trans["Puissance estimée :"]="Geschätzte Stärke :";
	$trans["combinaisons testées par seconde."]="Kombinationen, die pro Sekunde getestet werden können.";

	//***Aide attaque distribuée
	$trans["Attaque distribuée"]="Verteilter Angriff";
	
	//une phrase
	$trans["Mise en parallèle d'un réseau de"]="Parallel geschaltetes Netzwerk";
	$trans["ordinateurs zombies au sein d'un même botnet (estimation) pour se répartir la tâche de casser un mot de passe."]="Zombierechner eines Botnets (Schätzung) die gemeinsam versuchen ein Passwort zu brechen.";
	
	//***Aide attaque top500 - number one
	$trans["Attaque avec l'ordinateur le plus puissant de la planète"]="Angriff mit dem leistungsfähigsten Rechner der Welt.";
	$trans["Puissance de calcul de l'ordinateur le plus puissant de la planète."]="Rechenleistung des leistungsstärksten Rechners der Welt.";
	
	$trans["GFlops soit"]="GFlops sprich";

	$trans["source : http://www.top500.org/"]="source : http://www.top500.org/";

	//***Aide attaque top500	
	$trans["Attaque utilisant les 500 plus puissants ordinateurs de la planète"]="Angriff mit den 500 leichtungsstärksten Rechner der Welt.";
	$trans["Puissance de calcul obtenue en combinant le travail des 500 plus puissants ordinateurs de la planète (scénario peu concevable dans les faits)."]="Rechenleistung, die man durch den Zusammenschluss der 500 leistungsstärksten Rechner erhält (eher unrealistisches Szenario).";
	

	//***Page principale
	$trans["Tester la résistance d'un mot de passe"]="Die Güte eines Passworts testen";
	$trans["1. Combien de caractères composent le mot de passe ?"]="1. Aus wievielen Zeichen besteht das Passwort ?";
	$trans["Le mot de passe est composé de"]="Das Passwort besteht aus ";
	$trans["caractères."]="Zeichen.";
	$trans["2. Quels sont les caractères utilisés dans le mot de passe ?"]="2. Welche Zeichen werden im Passwort verwendet ?";
	$trans["Minuscules - a..z"]="Kleinbuchstaben - a..z";
	$trans["Majuscules - A..Z"]="Großbuchstaben - A..Z";
	$trans["Chiffres - 0..9"]="Zahlen - 0..9";
	$trans["Caractères spéciaux et signes de ponctuation - [](){}@#*.;-_!?, etc."]="Sonderzeichen und Interpunktionszeichen - [](){}@#*.;-_!?, etc.";
	$trans["Evaluer la résistance du mot de passe"]="Güte des Passworts bestimmen";
	
	//***Partie résultats
	$trans["Evaluation de la résistance du mot de passe à différentes attaques brute-force"]="Die Güte des Passworts in Hinblick auf verschiedene brute-force Angriffe bestimmen.";
	$trans["Votre mot de passe ne comprend aucun caractère, il s'agit donc du mot de passe vide qui est trivial à deviner ;)"]="Ihr Passwort enthält keine Zeichen, es handelt sich also um ein triviales Passwort, das leicht zu erraten ist ;)";
	$trans["Jours"]="Tage";
	$trans["Années"]="Jahre";
	$trans["Siècles"]="Jahrhunderte";
	$trans["Résistance à une"]="Güte gegenüber";
	$trans["attaque standard"]="einem Standardangriff";
	$trans["attaque distribuée"]="einem verteilten Angriff";
	$trans["attaque avec l'ordinateur le plus puissant de la planète"]="eines Angriffs mit dem leistungsfähisten Rechners der Welt";
	$trans["attaque utilisant les 500 plus puissants ordinateurs de la planète"]="eines Angriffs mit Hilfe der 500 leistungsfähsten Rechner der Welt.";
	
	$trans["instantané"]="augenblicklich";
	$trans["minute(s)"]="Minute(n)";
	$trans["heure(s)"]="Stunde(n)";
	$trans["jours"]="Tage";
	$trans["année(s)"]="Jahr(e)";
	$trans["siècle(s)"]="Jahrhundert(e)";
	$trans["soit"]="sprich";
	$trans["Retour"]="Zurück";
	$trans["Suivant"]="Weiter";
	$trans["Vous devez choisir au moins un jeu de caractères!"]="Sie müssen wenigstens einen Zeichensatz auswählen!";