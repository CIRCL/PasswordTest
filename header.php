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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

<head>
	<title><?=$translate("Tester la résistance d'un mot de passe")?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<script type="text/javascript">
		var motDePasseMin=<?=LONG_MIN?>;
		var motDePasseMax=<?=LONG_MAX?>;
		var motDePasseDefaut=<?=LONG_DEFAUT?>;
	</script>
	<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	<!--<script type="text/javascript" src="js/fancybox/jquery.easing-1.3.pack.js"></script>-->
	<!--<script type="text/javascript" src="js/fancybox/jquery.mousewheel-3.0.2.pack.js"></script>-->
	<script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.1.pack.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.8.5.custom.min.js"></script>
	<link media="screen" rel="stylesheet" type="text/css" href="css/jquery-ui-1.8.5.custom.css" />
	<link media="screen" rel="stylesheet" type="text/css" href="css/style.css" />
	<link media="screen" rel="stylesheet" type="text/css" href="js/fancybox/jquery.fancybox-1.3.1.css" />
</head>
<body>
<h1><?=$translate("Tester la résistance d'un mot de passe")?></h1>

<br><br><br>
