<?php
	/*******************************************************************************
	Copyright 2010-2011 CASES Luxembourg (www.cases.lu)
	Copyright 2011 SMILE GIE

	   Licensed under the Apache License, Version 2.0 (the "License");
	   you may not use this file except in compliance with the License.
	   You may obtain a copy of the License at

	       http://www.apache.org/licenses/LICENSE-2.0

	CASES and BEE SECURE are registered trademarks of SMILE GIE, all rights reserved
	********************************************************************************/

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

