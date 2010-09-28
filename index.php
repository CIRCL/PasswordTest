<?php

/*******************************/
/* Cedric Mauny - Telindus PSF */
/*      Sept. Oct. 2006        */
/*      update mai 2008        */
/*     CASES Luxembourg        */
/*******************************/



/* ----------------------- CONFIGURATION ----------------------- */


// Estimation des puissances en nombre de combinaisons par seconde testées (en FLOPS)
$puissance_standard = 1000000; // estimation


$nombre_machines_dans_botnet = 2500; // estimation
$puissance_distribuee = $puissance_standard*$nombre_machines_dans_botnet;


// http://www.top500.org/list/2007/11/100
//$puissance_top500_number_one = "280600000000000"; // Puissance en juin 2006
$puissance_top500_number_one = "478200000000000"; // Puissance en novembre 2007


// http://www.top500.org/lists/2007/11/performance_development
//$puissance_totalecomputing= 293000000000000; // Puissance en 2002
//$puissance_totalecomputing = "2790050000000000"; // Puissance en juin 2006
$puissance_totalecomputing = "6965082000000000"; // Puissance en novembre 2007


// on estime qu'en moyenne on trouve un mot de passe après avoir fait la moitié des tentatives de bruteforce
$facteur_chance = 0.5;






/* ----------------------- FONCTIONS ----------------------- */


// ici on sécurise l'input, pour cela on n'accepte que les chiffres et seulement les chiffres
// on enleve tous les caractères qui ne sont pas des chiffres pour ne donner une chaîne de caractères ne contenant que des chiffres
function securiser_input($input) 
{
	$chaine_constituee_que_de_chiffres = "";
	for($i = 0; $i < strlen($input); $i++)
	{
		$position_premier_chiffre_rencontre = strcspn($input[$i], "0123456789");
		if ($position_premier_chiffre_rencontre == 0)
			$chaine_constituee_que_de_chiffres = $chaine_constituee_que_de_chiffres . $input[$i];
	}	
	return $chaine_constituee_que_de_chiffres;
}


function separer_les_milliers($input) 
{
	// Définition de la variable qui permet de donner le string qui permet de séparer les milliers
	$separateur_des_milliers = " ";

	$i = strlen($input);
	if ($i <= 3)
		return $input;
	else
	{
		if (($i - 3) >= 0)
		{
			$tmp = "";
			for($j = 0; $j < ($i - 3); $j++)
				$tmp = $tmp . $input[$j];
			return (separer_les_milliers($tmp) . $separateur_des_milliers . $input[$i-3] . $input[$i-2] . $input[$i-1]);
		}	
	}
}


function separer_les_milliers_de_nbr_a_virgules($input) 
{
	$ipart = "";
	$dpart = "";
	$stop = 0;
	for($i = 0; $i < strlen($input); $i++)
	{
		if (!($stop))
		{
			if ($input[$i] != ".")
				$ipart .= $input[$i];
			else
				$stop = 1;
		}
		else
		{
			if ($input[$i] != ".")
				$dpart .= $input[$i];
		}
	}
	return separer_les_milliers($ipart) . "." . $dpart;
}

?>

<html>
<head>
<title>Resistance</title>
<link rel="stylesheet" href="http://www.cases.public.lu/pictures/layout/main.css" type="text/css" title="Main CSS">
<link rel="stylesheet" href="http://www.cases.public.lu/pictures/layout/sitemap.css" type="text/css" title="Sitemap-CSS">
</head>
<body>





<script language="JavaScript">
function aide_plus_informations() 
{
var win2="<html><head><link rel='stylesheet' href='http://www.cases.public.lu/pictures/layout/main.css' type='text/css' title='Main CSS'><link rel='stylesheet' href='http://www.cases.public.lu/pictures/layout/sitemap.css' type='text/css' title='Sitemap-CSS'></head><body>"+"<h1><center>Plus d'informations</center></h1>"+"<p>1. On suppose que l'attaquant effectue des attaques de type brute-force, c'est à dire que l'attaquant teste exhaustivement et les unes après les autres toutes les combinaisons de caractères qui pourraient avoir été utilisé pour écrire le mot de passe. <br>L'attaquant ne considère l'attaque par dictionnaire à aucun moment. Il faut toutefois garder en mémoire que si la victime choisi son mot de passe comme un mot du dictionnaire, le temps nécessaire pour casser son mot de passe serait grandement réduit.<br><br>2. On suppose qu'il n'existe pas de vulnérabilités dans l'algorithme permettant de chiffrer le mot de passe. Si tel était le cas, le temps nécessaire pour trouver le mot de passe serait fortemment réduit.<br><br>3. Lorsque l'on effectue plusieurs attaques de type brute-force, en moyenne on estime que l'attaquant devine le mot de passe après avoir testé la moitié des combinaisons de mot de passe possibles.</font><br><br>4. Dans le cadre de cet outil d'évaluation à vocation didactique, on estime que l'attaquant possède les informations liées à la longeur du mot de passe et à sa composition avant de lancer toute attaque. <br>À titre d'illustration, pour brute-forcer un mot de passe 8 caractères, nous considérons que l'attaquant possède l'information <longueur du mot de passe> et n'a pas besoin de faire de brute-force successifs pour des mots de passe de 1, 2, 3, 4, 5, 6, 7 et finalement 8 caractères. Il en est de même pour l'aspect composition du mot de passe.<br><br>Pour plus d'informations, se reporter aux articles CASES Luxembourg suivants :<br><img src = 'http://www.cases.public.lu/pictures/fiches/flchebleue.gif'> <a href=\"#\" onclick=\"window.open('http://www.cases.lu/publications/fiches/mots_de_passe/')\">Fiche thématique <i>mots de passe</i></a><br><img src = 'http://www.cases.public.lu/pictures/fiches/flchebleue.gif'> <a href=\"#\" onclick=\"window.open('http://www.cases.public.lu/pratique/comportement/mot_de_passe/')\">Règles de comportement <i>mots de passe</i></a><br><img src = 'http://www.cases.public.lu/pictures/fiches/flchebleue.gif'> <a href=\"#\" onclick=\"window.open('http://www.cases.public.lu/publications/fiches/gestion_acces/index.html#3')\">Fiche thématique <i>gestion des accès - menaces sur le déchiffrage</i></a><br><br><br>Liens externes : www.top500.org et www.cryptme.com<br><br><center><a href = '#' onclick = 'javascript:window.close()'>Fermer la fenêtre</a></body></html>"
var doc2=open("CASES","doc2","resizable=no,height=570,width=500")
doc2.document.write(win2)
}
</script>



<script language="JavaScript">
function aide_attaque_standard() 
{
var win2="<html><head><link rel='stylesheet' href='http://www.cases.public.lu/pictures/layout/main.css' type='text/css' title='Main CSS'><link rel='stylesheet' href='http://www.cases.public.lu/pictures/layout/sitemap.css' type='text/css' title='Sitemap-CSS'></head><body>"
+"<h1><center>Attaque standard</center></h1>"+
"<p>Attaque de type brute-force exécutée sur un PC familial récent utilisant des outils de cassage de mot de passe disponibles gratuitement sur internet.<br>Puissance estimée : <?php echo separer_les_milliers("$puissance_standard"); ?> combinaisons testées par seconde.<br><br><center><a href = '#' onclick = 'javascript:window.close()'>Fermer la fenêtre</a></body></html>"
var doc2=open("CASES","doc2","resizable=no,height=200,width=500")
doc2.document.write(win2)
}
</script>

<script language="JavaScript">
function aide_attaque_distribuee() 
{
var win2="<html><head><link rel='stylesheet' href='http://www.cases.public.lu/pictures/layout/main.css' type='text/css' title='Main CSS'><link rel='stylesheet' href='http://www.cases.public.lu/pictures/layout/sitemap.css' type='text/css' title='Sitemap-CSS'></head><body>"
+"<h1><center>Attaque distribuée</center></h1>"+
"<p>Mise en parallèle d'un réseau de <?php echo $nombre_machines_dans_botnet?> ordinateurs zombies au sein d'un même botnet (estimation) pour se répartir la tâche de casser un mot de passe.<br>Puissance estimée : <?php echo separer_les_milliers("$puissance_distribuee");?> combinaisons testées par seconde.<br><br><center><a href = '#' onclick = 'javascript:window.close()'>Fermer la fenêtre</a></body></html>"
var doc2=open("CASES","doc2","resizable=no,height=175,width=500")
doc2.document.write(win2)
}
</script>

<script language="JavaScript">
function aide_attaque_top500_number_one() 
{
var win2="<html><head><link rel='stylesheet' href='http://www.cases.public.lu/pictures/layout/main.css' type='text/css' title='Main CSS'><link rel='stylesheet' href='http://www.cases.public.lu/pictures/layout/sitemap.css' type='text/css' title='Sitemap-CSS'></head><body>"
+"<h1><center>Attaque avec l'ordinateur le plus puissant de la planète</center></h1>"+
"<p>Puissance de calcul de l'ordinateur le plus puissant de la planète, un ordinateur IBM BlueGene/L - eServer Blue Gene Solution du Lawrence Livermore National Laboratory (Californie - USA) utilisé en recherche. <br>Puissance estimée : <?php $tmp = $puissance_top500_number_one/1000000000 ; echo separer_les_milliers("$tmp");?> GFlops soit <?php echo separer_les_milliers("$puissance_top500_number_one");?> combinaisons testées par seconde.<br><font size = '-1'>source : www.top500.org/list/2007/11/100/</font><br><br><center><a href = '#' onclick = 'javascript:window.close()'>Fermer la fenêtre</a></body></html>"
var doc2=open("CASES","doc2","resizable=no,height=200,width=500")
doc2.document.write(win2)
}
</script>

<script language="JavaScript">
function aide_attaque_totalcomputing() 
{
var win2="<html><head><link rel='stylesheet' href='http://www.cases.public.lu/pictures/layout/main.css' type='text/css' title='Main CSS'><link rel='stylesheet' href='http://www.cases.public.lu/pictures/layout/sitemap.css' type='text/css' title='Sitemap-CSS'></head><body>"
+"<h1><center>Attaque utilisant les 500 plus puissants ordinateurs de la planète</center></h1>"+
"<p>Puissance de calcul obtenue en combinant le travail des 500 plus puissants ordinateurs de la planète (scénario peu concevable dans les faits).<br>Puissance estimée : <?php $tmp = $puissance_totalecomputing/1000000000 ; echo separer_les_milliers("$tmp");?> GFlops soit <?php echo separer_les_milliers("$puissance_totalecomputing");?> combinaisons testées par seconde.<br><font size = '-1'>source : http://www.top500.org/lists/2007/11/performance_development</font><br><br><center><a href = '#' onclick = 'javascript:window.close()'>Fermer la fenêtre</a></body></html>"
var doc2=open("CASES","doc2","resizable=no,height=220,width=500")
doc2.document.write(win2)
}
</script>




<center>
<h1>Tester la résistance d'un mot de passe</h1>
</center>

<br><br><br>

<form action = 'index.php' method = 'post' name = 'form'>

<?php

if (!((isset($_POST['longueur_MdP']))))
	$longueur_MdP_ = 8;
else
	$longueur_MdP_ = securiser_input($_POST['longueur_MdP']);

if (!((isset($_POST['set_chars_minuscules']))))
	$set_chars_minuscules_ = 0;
else
	$set_chars_minuscules_ = securiser_input($_POST['set_chars_minuscules']);

if (!((isset($_POST['set_chars_majuscules']))))
	$set_chars_majuscules_ = 0;
else
	$set_chars_majuscules_ = securiser_input($_POST['set_chars_majuscules']);

if (!((isset($_POST['set_chars_chiffres']))))
	$set_chars_chiffres_ = 0;
else
	$set_chars_chiffres_ = securiser_input($_POST['set_chars_chiffres']);

if (!((isset($_POST['set_chars_speciaux']))))
	$set_chars_speciaux_ = 0;
else
	$set_chars_speciaux_ = securiser_input($_POST['set_chars_speciaux']);
?>

<h4>1. Combien de caractères composent le mot de passe ?</h4>
Le mot de passe est composé de 
<?php
echo "<input type = 'text' name = 'longueur_MdP' value = '".$longueur_MdP_."' size = '2'>"
?>
 caractères.

<br><br><br>


<h4>2. Quels sont les caractères utilisés dans le mot de passe ?</h4>
<table width = '45%' border = '0'>
<tr>
<!--<td align = 'center'>a..z</td>-->
<td>
<?php
if ($set_chars_minuscules_ == 1)
	echo "<input type='checkbox' name='set_chars_minuscules' value='1' checked>";
else
	echo "<input type='checkbox' name='set_chars_minuscules' value='1'>";
?>
</td>
<td>Minuscules - a..z</td>
</tr>
<tr>
<!--<td align = 'center'>A..Z</td>-->
<td>
<?php
if ($set_chars_majuscules_ == 1)
	echo "<input type='checkbox' name='set_chars_majuscules' value='1' checked>";
else
	echo "<input type='checkbox' name='set_chars_majuscules' value='1'>";
?>
</td>
<td>Majuscules - A..Z</td>
</tr>
<tr>
<!--<td align = 'center'>0..9</td>-->
<td>
<?php
if ($set_chars_chiffres_ == 1)
	echo "<input type='checkbox' name='set_chars_chiffres' value='1' checked>";
else
	echo "<input type='checkbox' name='set_chars_chiffres' value='1'>";
?>
</td>
<td>Chiffres - 0..9</td>
</tr>
<tr>
<!--<td align = 'center'>()[]{}@#*.!?</td>-->
<td>
<?php
if ($set_chars_speciaux_ == 1)
	echo "<input type='checkbox' name='set_chars_speciaux' value='1' checked>";
else
	echo "<input type='checkbox' name='set_chars_speciaux' value='1'>";
?>
</td>
<td>Caractères spéciaux et signes de ponctuation - [](){}@#*.;-_!?, <i>etc</i></td>
</tr>
</table>


<br><br><br>



<!--
<b><a href = "#" onclick="javascript:form.submit()">3. Tester la résistance du mot de passe</a></b>
-->
<h4>3. <input type = 'submit' value = 'Evaluer la résistance du mot de passe'></h4>



</form>



<?php

$nbr_caracteres_utilises = 0;
$nbr_familles_caracteres_utilisees = 0;
$caracteres_utilises = "";

if (isset($set_chars_minuscules_))
{
	if ($set_chars_minuscules_)
	{
		$caracteres_utilises .= "<img src = 'http://www.cases.public.lu/pictures/fiches/flchebleue.gif'> minuscules<br>";
		$nbr_caracteres_utilises += 26;
		$nbr_familles_caracteres_utilisees++;
	}
}

if (isset($set_chars_majuscules_))
{
	if ($set_chars_majuscules_)
	{
		$caracteres_utilises .= "<img src = 'http://www.cases.public.lu/pictures/fiches/flchebleue.gif'> majuscules<br>";
		$nbr_caracteres_utilises += 26;
		$nbr_familles_caracteres_utilisees++;
	}
}

if (isset($set_chars_chiffres_))
{
	if ($set_chars_chiffres_)
	{
		$caracteres_utilises .= "<img src = 'http://www.cases.public.lu/pictures/fiches/flchebleue.gif'> chiffres<br>";
		$nbr_caracteres_utilises += 10;
		$nbr_familles_caracteres_utilisees++;
	}
}

if (isset($set_chars_speciaux_))
{
	if ($set_chars_speciaux_)
	{
		$caracteres_utilises .= "<img src = 'http://www.cases.public.lu/pictures/fiches/flchebleue.gif'> caractères speciaux<br>";
		$nbr_caracteres_utilises += 30;
		$nbr_familles_caracteres_utilisees++;
	}
}

if ($nbr_familles_caracteres_utilisees > 0)
{

echo "<br><center>_________________</center><br>";
echo "<center>";
echo "<h2>Evaluation de la résistance du mot de passe à différentes attaques brute-force</h2>";
echo "</center>";



$nbr_combinaisons_possibles_du_MdP = bcpow($nbr_caracteres_utilises,$longueur_MdP_);

if ($longueur_MdP_ == 0)
	echo "Votre mot de passe ne comprend aucun caractère, il s'agit donc du mot de passe vide qui est trivial à deviner ;)";
/*
else
{
	echo "Le mot de passe à tester est construit à partir de " . $longueur_MdP_ . " caractères, ";
	if ($nbr_familles_caracteres_utilisees > 1)
		echo " mélange de<br>";
	else
		echo " et composé uniquement de<br>";
	echo $caracteres_utilises;
	echo "<br>";
	echo "On peut estimer qu'il existe <b>" . separer_les_milliers("$nbr_combinaisons_possibles_du_MdP") . " combinaisons</b> possibles différentes pour ce mot de passe";
	echo "<br>";
}
*/


$nbr_jours_standard = $nbr_combinaisons_possibles_du_MdP/$puissance_standard/3600/24;
$nbr_jours_distribuee = $nbr_combinaisons_possibles_du_MdP/$puissance_distribuee/3600/24;
$nbr_jours_top500_number_one = $nbr_combinaisons_possibles_du_MdP/$puissance_top500_number_one/3600/24;
$nbr_jours_totalcomputing = $nbr_combinaisons_possibles_du_MdP/$puissance_totalecomputing/3600/24;

echo "<center>";
echo "<table border = '1'>";

echo "<tr>";
	echo "<td align = 'center'>&nbsp;</td>";
	echo "<td align = 'center'><b>Jours</b></td>";
	echo "<td align = 'center'><b>Années</b></td>";
	//echo "<td align = 'center'><b>Temps nécessaire moyen pour <i>brute-forcer</i> un tel mot de passe<b></td>";
	echo "<td align = 'center'><b>Siècles</b></td>";
echo "</tr>";

echo "<tr>";
	echo "<td align = 'center'><b>Résistance à une <a href = '#' onclick='aide_attaque_standard()'>attaque standard</a></b></td>";
	if (round($nbr_jours_standard*$facteur_chance*24*3600/60, 0) == 0)
	{
		echo "<td align = 'center'>_</td>";
		echo "<td align = 'center'><b>instantan&eacute;</b></td>";
		echo "<td align = 'center'>_</td>";
	}
	else
	{
		if (($nbr_jours_standard*$facteur_chance) < 1)
		{
			if (round($nbr_jours_standard*$facteur_chance*24*3600/60, 0) < 60)
	 			echo "<td align = 'center'>" . round($nbr_jours_standard*$facteur_chance*24*3600/60, 0) . " minute(s)</td>";
			else
				echo "<td align = 'center'>" . round(round($nbr_jours_standard*$facteur_chance*24*3600/60, 0)/60, 1) . " heure(s)</td>";
		}
		else
			echo "<td align = 'center'>" . round($nbr_jours_standard*$facteur_chance, 2) . " jours</td>";
		if (round($nbr_jours_standard/365.25*$facteur_chance, 1) == 0)
			echo "<td align = 'center'>_</td>";
		else
			echo "<td align = 'center'>soit " . round($nbr_jours_standard/365.25*$facteur_chance, 1) . " année(s)</td>";
		if (round($nbr_jours_standard/36525*$facteur_chance, 1) == 0)
			echo "<td align = 'center'>_</td>";
		else
			echo "<td align = 'center'>soit " . round($nbr_jours_standard/36525*$facteur_chance, 1) . " siècle(s)</td>";
	}
echo "</tr>";

echo "<tr>";
	echo "<td align = 'center'><b>Résistance à une <a href = '#' onclick = 'aide_attaque_distribuee()'>attaque distribuée</a></b></td>";
	if (round($nbr_jours_distribuee*$facteur_chance*24*3600/60, 0) == 0)
	{
		echo "<td align = 'center'>_</td>";
		echo "<td align = 'center'><b>instantan&eacute;</b></td>";
		echo "<td align = 'center'>_</td>";
	}
	else
	{
		if (($nbr_jours_distribuee*$facteur_chance) < 1)
		{
			if (round($nbr_jours_distribuee*$facteur_chance*24*3600/60, 0) < 60)
	 			echo "<td align = 'center'>" . round($nbr_jours_distribuee*$facteur_chance*24*3600/60, 0) . " minute(s)</td>";
			else
				echo "<td align = 'center'>" . round(round($nbr_jours_distribuee*$facteur_chance*24*3600/60, 0)/60, 1) . " heure(s)</td>";
		}
		else
			echo "<td align = 'center'>" . round($nbr_jours_distribuee*$facteur_chance, 2) . " jours</td>";
		if (round($nbr_jours_distribuee/365.25*$facteur_chance, 1) == 0)
			echo "<td align = 'center'>_</td>";
		else
			echo "<td align = 'center'>soit " . round($nbr_jours_distribuee/365.25*$facteur_chance, 1) . " année(s)</td>";
		if (round($nbr_jours_distribuee/36525*$facteur_chance, 1) == 0)
			echo "<td align = 'center'>_</td>";
		else
			echo "<td align = 'center'>soit " . round($nbr_jours_distribuee/36525*$facteur_chance, 1) . " siècle(s)</td>";
	}
echo "</tr>";

echo "<tr>";
	echo "<td align = 'center'><b>Résistance à une <a href = '#' onclick = 'aide_attaque_top500_number_one()'>attaque avec l'ordinateur le plus puissant de la planète</a></b></td>";
	if (round($nbr_jours_top500_number_one*$facteur_chance*24*3600/60, 0) == 0)
	{
		echo "<td align = 'center'>_</td>";
		echo "<td align = 'center'><b>instantan&eacute;</b></td>";
		echo "<td align = 'center'>_</td>";
	}
	else
	{
		if (($nbr_jours_top500_number_one*$facteur_chance) < 1)
		{
			if (round($nbr_jours_top500_number_one*$facteur_chance*24*3600/60, 0) < 60)
	 			echo "<td align = 'center'>" . round($nbr_jours_top500_number_one*$facteur_chance*24*3600/60, 0) . " minute(s)</td>";
			else
				echo "<td align = 'center'>" . round(round($nbr_jours_top500_number_one*$facteur_chance*24*3600/60, 0)/60, 1) . " heure(s)</td>";
		}
		else
		{
			$tmp = round($nbr_jours_top500_number_one*$facteur_chance, 2);
			//echo "<td align = 'center'>" . separer_les_milliers_de_nbr_a_virgules("$tmp") . " jours</td>";
			echo "<td align = 'center'>" . $tmp . " jours</td>";
		}
		if (round($nbr_jours_top500_number_one/365.25*$facteur_chance, 1) == 0)
			echo "<td align = 'center'>_</td>";
		else
		{
			$tmp = round($nbr_jours_top500_number_one/365.25*$facteur_chance, 1);
			echo "<td align = 'center'>soit " . separer_les_milliers_de_nbr_a_virgules("$tmp") . " année(s)</td>";
			//echo "<td align = 'center'>soit " . $tmp . " année(s)</td>";
		}
		if (round($nbr_jours_top500_number_one/36525*$facteur_chance, 1) == 0)
			echo "<td align = 'center'>_</td>";
		else
			echo "<td align = 'center'>soit " . round($nbr_jours_top500_number_one/36525*$facteur_chance, 1) . " siècle(s)</td>";
	}
echo "</tr>";

echo "<tr>";
	echo "<td align = 'center'><b>Résistance à une <a href = '#' onclick = 'aide_attaque_totalcomputing()'>attaque utilisant les 500 plus puissants ordinateurs de la planète</a></b></td>";
	if (round($nbr_jours_totalcomputing*$facteur_chance*24*3600/60, 0) == 0)
	{
		echo "<td align = 'center'>_</td>";
		echo "<td align = 'center'><b>instantan&eacute;</b></td>";
		echo "<td align = 'center'>_</td>";
	}
	else
	{
		if (($nbr_jours_totalcomputing*$facteur_chance) < 1)
		{
			if (round($nbr_jours_totalcomputing*$facteur_chance*24*3600/60, 0) < 60)
	 			echo "<td align = 'center'>" . round($nbr_jours_totalcomputing*$facteur_chance*24*3600/60, 0) . " minute(s)</td>";
			else
				echo "<td align = 'center'>" . round(round($nbr_jours_totalcomputing*$facteur_chance*24*3600/60, 0)/60, 1) . " heure(s)</td>";
		}
		else
			echo "<td align = 'center'>" . round($nbr_jours_totalcomputing*$facteur_chance, 2) . " jours</td>";
		if (round($nbr_jours_totalcomputing/365.25*$facteur_chance, 1) == 0)
			echo "<td align = 'center'>_</td>";
		else
			echo "<td align = 'center'>soit " . round($nbr_jours_totalcomputing/365.25*$facteur_chance, 1) . " année(s)</td>";
		if (round($nbr_jours_totalcomputing/36525*$facteur_chance, 1) == 0)
			echo "<td align = 'center'>_</td>";
		else
			echo "<td align = 'center'>soit " . round($nbr_jours_totalcomputing/36525*$facteur_chance, 1) . " siècle(s)</td>";
	}
echo "</tr>";
echo "</table>";
echo "</center>";
}

?>
<br><br><br>
__________
<br>
<a href = '#' onclick = 'aide_plus_informations()'>Plus d'informations</a>

</body>
</html>
