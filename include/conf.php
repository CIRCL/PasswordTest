<?php
	/*******************************************************************************
        Copyright 2011 CASES Luxembourg (www.cases.lu)
        Copyright 2011 SMILE GIE

           Licensed under the Apache License, Version 2.0 (the "License");
           you may not use this file except in compliance with the License.
           You may obtain a copy of the License at

               http://www.apache.org/licenses/LICENSE-2.0
        
           Unless required by applicable law or agreed to in writing, software
           distributed under the License is distributed on an "AS IS" BASIS,
           WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
           See the License for the specific language governing permissions and
           limitations under the License.

        CASES and BEE SECURE are registered trademarks of SMILE GIE, all rights reserved
        ********************************************************************************/	

	/* ----------------------- CONFIGURATION ----------------------- */

	// Estimation des puissances en nombre de combinaisons par seconde testées (en FLOPS)
	//$puissance_standard = 1000000; // estimation
	//$puissance_standard = 12400000000; // estimation (Source BOINC -> Manu) 2009
	//$puissance_standard = 16080499055; // estimation (Source BOINC -> Manu) 2013
	//$puissance_standard = 146209685715; // estimation (Source BOINC -> Manu) 2016
	$puissance_standard = 19593980442; // estimation (Source BOINCSTATS -> Manu credit/200 pour avoir les GFlops) novembre 2017


	$nombre_machines_dans_botnet = 2500; // estimation
	$puissance_distribuee = $puissance_standard * $nombre_machines_dans_botnet;


	// http://www.top500.org/list/2007/11/100
	//$puissance_top500_number_one = "280600000000000"; // Puissance en juin 2006
	//$puissance_top500_number_one = "478200000000000"; // Puissance en novembre 2007
	//$puissance_top500_number_one = "1750000000000000"; // Puissance en novembre 2009
	//$puissance_top500_number_one = "34000000000000000"; // Puissance en septembre 2013
	$puissance_top500_number_one = "93014600000000000"; // Puissance en juin 2016 - novembre 2017


	// http://www.top500.org/lists/2007/11/performance_development
	//$puissance_totalecomputing= 293000000000000; // Puissance en 2002
	//$puissance_totalecomputing = "2790050000000000"; // Puissance en juin 2006
	//$puissance_totalecomputing = "6965082000000000"; // Puissance en novembre 2007
	//$puissance_totalecomputing = "27600000000000000"; // Puissance en novembre 2009
	//$puissance_totalecomputing = "223000000000000000"; // Puissance en septembre 2013
	//$puissance_totalecomputing = "593400000000000000"; // Puissance en juin 2016
	$puissance_totalecomputing = "845121000000000000"; // Puissance en novembre 2017

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
