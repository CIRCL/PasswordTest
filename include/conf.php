<?php
	/* ----------------------- CONFIGURATION ----------------------- */

	// Estimation des puissances en nombre de combinaisons par seconde testées (en FLOPS)
	//$puissance_standard = 1000000; // estimation
	$puissance_standard = 12400000000; // estimation (Source BOINC -> Manu)


	$nombre_machines_dans_botnet = 2500; // estimation
	$puissance_distribuee = $puissance_standard*$nombre_machines_dans_botnet;


	// http://www.top500.org/list/2007/11/100
	//$puissance_top500_number_one = "280600000000000"; // Puissance en juin 2006
	//$puissance_top500_number_one = "478200000000000"; // Puissance en novembre 2007
	$puissance_top500_number_one = "1750000000000000"; // Puissance en novembre 2009


	// http://www.top500.org/lists/2007/11/performance_development
	//$puissance_totalecomputing= 293000000000000; // Puissance en 2002
	//$puissance_totalecomputing = "2790050000000000"; // Puissance en juin 2006
	//$puissance_totalecomputing = "6965082000000000"; // Puissance en novembre 2007
	$puissance_totalecomputing = "27600000000000000"; // Puissance en novembre 2009


	// on estime qu'en moyenne on trouve un mot de passe après avoir fait la moitié des tentatives de bruteforce
	$facteur_chance = 0.5;

	// Nombre de flops/md5 - Ajout Manu
	$flopsParMD5 = 250;

	//longueur du mot de passe par défaut
	define("LONG_DEFAUT",8);
	define("LONG_MAX",40);
	define("LONG_MIN",4);

	//save to database
	define("USE_DB",false);

	//store session id
	define("STORE_SESSION",true);

	//send through serial
	define("SERIAL",false);
	define("SERIAL_DEBUG",true);
	define("SERIAL_DEVICE","COM1");

	//Password strength scale
	define("SCALE_MIN",0);
	define("SCALE_MAX",100);
