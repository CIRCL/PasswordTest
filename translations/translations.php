<?php
	/* ----------------------- TRADUCTIONS --------------------- */

	if (isset($_REQUEST['lang']) && $_REQUEST['lang']=='de')
	{
		include_once "de.php";
		$transLangText="Version française";
		$transLang="fr";
		$currentLang="de";
	}
	else
	{
		include_once "fr.php";
		$transLangText="Deutsche Fassung";
		$transLang="de";
		$currentLang="fr";
	}

