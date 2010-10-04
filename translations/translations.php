<?php
	/* ----------------------- TRADUCTIONS --------------------- */

	if (isset($_REQUEST['lang']) && $_REQUEST['lang']=='de')
	{
		include_once "de.php";
		$currentLang="de";
	}
	elseif (isset($_REQUEST['lang']) && $_REQUEST['lang']=='en')
	{
		include_once "en.php";
		$currentLang="en";
	}
	else
	{
		include_once "fr.php";
		$currentLang="fr";
	}

