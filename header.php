<?php
/**
 * Owner : Manu - CASES
 * Original by Cedric Mauny - Telindus PSF
 *      Sept. Oct. 2006
 *      update mai 2008
 *	Update février 2010 by Manu
 *	New rewrite september 2010 by Manu
 */

require_once "translations/translations.php";
require_once "include/functions.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

<head>
	<title><?=$trans["Tester la résistance d'un mot de passe"]?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<?php if ($indexFile): ?>
		<script type="text/javascript">
			var motDePasseMin=<?=LONG_MIN?>;
			var motDePasseMax=<?=LONG_MAX?>;
			var motDePasseDefaut=<?=LONG_DEFAUT?>;
		</script>
	<?php endif; ?>
	<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	<!--<script type="text/javascript" src="js/fancybox/jquery.easing-1.3.pack.js"></script>-->
	<!--<script type="text/javascript" src="js/fancybox/jquery.mousewheel-3.0.2.pack.js"></script>-->
	<script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.1.pack.js"></script>
	<?php if ($indexFile): ?>
		<script type="text/javascript" src="js/index.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.5.custom.min.js"></script>
		<link media="screen" rel="stylesheet" type="text/css" href="css/jquery-ui-1.8.5.custom.css" />
	<?php else: ?>
		<script type="text/javascript" src="js/eval.js"></script>
	<?php endif; ?>
	<link media="screen" rel="stylesheet" type="text/css" href="css/style.css" />
	<link media="screen" rel="stylesheet" type="text/css" href="js/fancybox/jquery.fancybox-1.3.1.css" />
</head>
<body>
<h1><?=$trans["Tester la résistance d'un mot de passe"]?></h1>

<br><br><br>
