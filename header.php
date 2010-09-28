<?php
/**
 * Owner : Manu - CASES
 * Original by Cedric Mauny - Telindus PSF
 *      Sept. Oct. 2006
 *      update mai 2008
 *	Update février 2010 by Manu
 *	New rewrite september 2010 by Manu
 */


require_once "conf.php";
require_once "translations/translations.php";
require_once "functions.php";


?>

<html>

<head>
	<title><?=$trans["Tester la résistance d'un mot de passe"]?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="/css/style.css" type="text/css" title="Main CSS" />
	<?php if ($loadjs): ?>
		<script type="text/javascript" src="/js/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="/js/index.js"></script>
	<?php endif; ?>
</head>
<body>





<script language="JavaScript">
function aide_plus_informations()
{
	var win2="<html><head><link rel='stylesheet' href='http://www.cases.public.lu/pictures/layout/main.css' type='text/css' title='Main CSS'><link rel='stylesheet' href='http://www.cases.public.lu/pictures/layout/sitemap.css' type='text/css' title='Sitemap-CSS'></head><body><h1><center><?=$trans["Plus d'informations"]?></center></h1><p><?=$trans["1. On suppose que l'attaquant effectue des attaques de type brute-force, c'est à dire que l'attaquant teste exhaustivement et les unes après les autres toutes les combinaisons de caractères qui pourraient avoir été utilisés pour écrire le mot de passe."]?><br><?=$trans["L'attaquant ne considère l'attaque par dictionnaire à aucun moment. Il faut toutefois garder en mémoire que si la victime choisissait son mot de passe comme un mot du dictionnaire, le temps nécessaire pour casser son mot de passe serait grandement réduit."]?><br><br><?=$trans["2. On suppose qu'il n'existe pas de vulnérabilités dans l'algorithme permettant de chiffrer le mot de passe. Si tel était le cas, le temps nécessaire pour trouver le mot de passe serait fortemment réduit."]?><br><br><?=$trans["3. Lorsque l'on effectue plusieurs attaques de type brute-force, en moyenne on estime que l'attaquant devine le mot de passe après avoir testé la moitié des combinaisons de mots de passe possibles."]?></font><br><br><?=$trans["4. On estime que l'attaquant ne possède pas les informations liées à la longeur du mot de passe avant de lancer toute attaque."]?><br><?=$trans["À titre d'illustration, pour brute-forcer un mot de passe de 8 caractères, l'attaquant doit faire des brute-force successifs pour des mots de passe de 1, 2, 3, 4, 5, 6, 7 et finalement 8 caractères."]?><br><br><?=$trans["5. Nous avons considéré qu'il fallait"]?> <?=$flopsParMD5?> <?=$trans["opérations à virgule flottante pour évaluer un mot de passe."]?><br><br><?=$trans["Pour plus d'informations, se reporter aux articles CASES Luxembourg suivants :"]?><br><img src = 'http://www.cases.public.lu/pictures/fiches/flchebleue.gif'> <a href=\"#\" onclick=\"window.open('<?=$transUrl['Fiche thématique mots de passe']?>')\"><?=$trans["Fiche thématique <i>mots de passe</i>"]?></a><br><img src = 'http://www.cases.public.lu/pictures/fiches/flchebleue.gif'> <a href=\"#\" onclick=\"window.open('<?=$transUrl["Règles de comportement mots de passe"]?>')\"><?=$trans["Règles de comportement <i>mots de passe</i>"]?></a><br><img src = 'http://www.cases.public.lu/pictures/fiches/flchebleue.gif'> <a href=\"#\" onclick=\"window.open('<?=$transUrl["Fiche thématique gestion des accès - menaces sur le déchiffrage"]?>')\"><?=$trans["Fiche thématique <i>gestion des accès - menaces sur le déchiffrage</i>"]?></a><br><br><br><?=$trans["Liens externes : www.top500.org et boincstats.com"]?><br><br><center><a href = '#' onclick = 'javascript:window.close()'><?=$trans["Fermer la fenêtre"]?></a></body></html>";
var doc2=window.open("#","doc2","resizable=no,height=570,width=500");
doc2.document.write(win2);
}
</script>



<script language="JavaScript">
function aide_attaque_standard()
{
var win2="<html><head><link rel='stylesheet' href='http://www.cases.public.lu/pictures/layout/main.css' type='text/css' title='Main CSS'><link rel='stylesheet' href='http://www.cases.public.lu/pictures/layout/sitemap.css' type='text/css' title='Sitemap-CSS'></head><body><h1><center><?=$trans["Attaque standard"]?></center></h1><p><?=$trans["Attaque de type brute-force exécutée sur un PC familial récent utilisant des outils de cassage de mot de passe disponibles gratuitement sur internet."]?><br><?=$trans["Puissance estimée :"]?> <?=separer_les_milliers($puissance_standard/$flopsParMD5)?> <?=$trans["combinaisons testées par seconde."]?><br><br><center><a href = '#' onclick = 'javascript:window.close()'><?=$trans["Fermer la fenêtre"]?></a></body></html>";
var doc3=window.open("#","doc3","resizable=no,height=200,width=500");
doc3.document.write(win2);
}
</script>

<script language="JavaScript">
function aide_attaque_distribuee()
{
var win2="<html><head><link rel='stylesheet' href='http://www.cases.public.lu/pictures/layout/main.css' type='text/css' title='Main CSS'><link rel='stylesheet' href='http://www.cases.public.lu/pictures/layout/sitemap.css' type='text/css' title='Sitemap-CSS'></head><body><h1><center><?=$trans["Attaque distribuée"]?></center></h1><p><?=$trans["Mise en parallèle d'un réseau de"]?> <?=$nombre_machines_dans_botnet?> <?=$trans["ordinateurs zombies au sein d'un même botnet (estimation) pour se répartir la tâche de casser un mot de passe."]?><br><?=$trans["Puissance estimée :"]?> <?php echo separer_les_milliers($puissance_distribuee/$flopsParMD5);?> <?=$trans["combinaisons testées par seconde."]?><br><br><center><a href = '#' onclick = 'javascript:window.close()'><?=$trans["Fermer la fenêtre"]?></a></body></html>";
var doc4=window.open("#","doc4","resizable=no,height=175,width=500");
doc4.document.write(win2);
}
</script>

<script language="JavaScript">
function aide_attaque_top500_number_one()
{
var win2="<html><head><link rel='stylesheet' href='http://www.cases.public.lu/pictures/layout/main.css' type='text/css' title='Main CSS'><link rel='stylesheet' href='http://www.cases.public.lu/pictures/layout/sitemap.css' type='text/css' title='Sitemap-CSS'></head><body><h1><center><?=$trans["Attaque avec l'ordinateur le plus puissant de la planète"]?></center></h1><p><?=$trans["Puissance de calcul de l'ordinateur le plus puissant de la planète."]?> <br><?=$trans["Puissance estimée :"]?> <?php $tmp = $puissance_top500_number_one/1000000000 ; echo separer_les_milliers("$tmp");?> <?=$trans["GFlops soit"]?> <?=separer_les_milliers($puissance_top500_number_one/$flopsParMD5)?> <?=$trans["combinaisons testées par seconde."]?><br><font size = '-1'><?=$trans["source : http://www.top500.org/"]?></font><br><br><center><a href = '#' onclick = 'javascript:window.close()'><?=$trans["Fermer la fenêtre"]?></a></body></html>"
var doc5=window.open("#","doc5","resizable=no,height=200,width=500");
doc5.document.write(win2);
}
</script>

<script language="JavaScript">
function aide_attaque_totalcomputing()
{
var win2="<html><head><link rel='stylesheet' href='http://www.cases.public.lu/pictures/layout/main.css' type='text/css' title='Main CSS'><link rel='stylesheet' href='http://www.cases.public.lu/pictures/layout/sitemap.css' type='text/css' title='Sitemap-CSS'></head><body><h1><center><?=$trans["Attaque utilisant les 500 plus puissants ordinateurs de la planète"]?></center></h1><p><?=$trans["Puissance de calcul obtenue en combinant le travail des 500 plus puissants ordinateurs de la planète (scénario peu concevable dans les faits)."]?><br><?=$trans["Puissance estimée :"]?> <?php $tmp = $puissance_totalecomputing/1000000000 ; echo separer_les_milliers("$tmp");?> <?=$trans["GFlops soit"]?> <?=separer_les_milliers($puissance_totalecomputing/$flopsParMD5)?> <?=$trans["combinaisons testées par seconde."]?><br><font size = '-1'><?=$trans["source : http://www.top500.org/"]?></font><br><br><center><a href = '#' onclick = 'javascript:window.close()'><?=$trans["Fermer la fenêtre"]?></a></body></html>";
var doc6=window.open("#","doc6","resizable=no,height=220,width=500");
doc6.document.write(win2);
}
</script>




<center>
<h1><?=$trans["Tester la résistance d'un mot de passe"]?></h1>
</center>

<br><br><br>
