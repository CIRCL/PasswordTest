<?php
$loadindexjs=false;
require_once "header.php";

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

$nbr_caracteres_utilises = 0;
$nbr_familles_caracteres_utilisees = 0;
$caracteres_utilises = "";

if (isset($set_chars_minuscules_))
{
	if ($set_chars_minuscules_)
	{
		$caracteres_utilises .= "<img src = 'images/flchebleue.gif'> minuscules<br>";
		$nbr_caracteres_utilises += 26;
		$nbr_familles_caracteres_utilisees++;
	}
}

if (isset($set_chars_majuscules_))
{
	if ($set_chars_majuscules_)
	{
		$caracteres_utilises .= "<img src = 'images/flchebleue.gif'> majuscules<br>";
		$nbr_caracteres_utilises += 26;
		$nbr_familles_caracteres_utilisees++;
	}
}

if (isset($set_chars_chiffres_))
{
	if ($set_chars_chiffres_)
	{
		$caracteres_utilises .= "<img src = 'images/flchebleue.gif'> chiffres<br>";
		$nbr_caracteres_utilises += 10;
		$nbr_familles_caracteres_utilisees++;
	}
}

if (isset($set_chars_speciaux_))
{
	if ($set_chars_speciaux_)
	{
		$caracteres_utilises .= "<img src = 'images/flchebleue.gif'> caractères speciaux<br>";
		$nbr_caracteres_utilises += 30;
		$nbr_familles_caracteres_utilisees++;
	}
}

if ($nbr_familles_caracteres_utilisees > 0)
{

	echo "<h2 style='text-align:center;'>".$trans["Evaluation de la résistance du mot de passe à différentes attaques brute-force"]."</h2>";

	$nbr_combinaisons_possibles_du_MdP=0;
	for($t=1;$t<$longueur_MdP_;$t++)
	{
		$nbr_combinaisons_possibles_du_MdP += bcpow($nbr_caracteres_utilises,$t);
	}
	$nbr_combinaisons_possibles_du_MdP += bcpow($nbr_caracteres_utilises,$longueur_MdP_)*$facteur_chance;

	if ($longueur_MdP_ == 0)
		echo $trans["Votre mot de passe ne comprend aucun caractère, il s'agit donc du mot de passe vide qui est trivial à deviner ;)"];

	$nbr_jours_standard = (($nbr_combinaisons_possibles_du_MdP*$flopsParMD5)/$puissance_standard)/(3600*24);
	$nbr_jours_distribuee = (($nbr_combinaisons_possibles_du_MdP*$flopsParMD5)/$puissance_distribuee)/(3600*24);
	$nbr_jours_top500_number_one = (($nbr_combinaisons_possibles_du_MdP*$flopsParMD5)/$puissance_top500_number_one)/(3600*24);
	$nbr_jours_totalcomputing = (($nbr_combinaisons_possibles_du_MdP*$flopsParMD5)/$puissance_totalecomputing)/(3600*24);
	echo "<div id='container'>";
	echo "<center>";
	echo "<table border = '1'>";

	echo "<tr>";
		echo "<td align = 'center'>&nbsp;</td>";
		echo "<td align = 'center'><b>".$trans["Jours"]."</b></td>";
		echo "<td align = 'center'><b>".$trans["Années"]."</b></td>";
		//echo "<td align = 'center'><b>Temps nécessaire moyen pour <i>brute-forcer</i> un tel mot de passe<b></td>";
		echo "<td align = 'center'><b>".$trans["Siècles"]."</b></td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td align = 'center'><b>".$trans["Résistance à une"]." <a href = '#attaque_standard_content' id='attaque_standard_link'>".$trans["attaque standard"]."</a></b></td>";
		if (round($nbr_jours_standard*24*3600/60, 0) == 0)
		{
			echo "<td align = 'center'>_</td>";
			echo "<td align = 'center'><b>".$trans["instantané"]."</b></td>";
			echo "<td align = 'center'>_</td>";
		}
		else
		{
			if (($nbr_jours_standard) < 1)
			{
				if (round($nbr_jours_standard*24*3600/60, 0) < 60)
					echo "<td align = 'center'>" . round($nbr_jours_standard*24*3600/60, 0) . " ".$trans["minute(s)"]."</td>";
				else
					echo "<td align = 'center'>" . round(round($nbr_jours_standard*24*3600/60, 0)/60, 1) . " ".$trans["heure(s)"]."</td>";
			}
			else
				echo "<td align = 'center'>" . round($nbr_jours_standard, 2) . " ".$trans["jours"]."</td>";
			if (round($nbr_jours_standard/365.25, 1) == 0)
				echo "<td align = 'center'>_</td>";
			else
				echo "<td align = 'center'>".$trans["soit"]." " . round($nbr_jours_standard/365.25, 1) . " ".$trans["année(s)"]."</td>";
			if (round($nbr_jours_standard/36525, 1) == 0)
				echo "<td align = 'center'>_</td>";
			else
				echo "<td align = 'center'>".$trans["soit"]." " . round($nbr_jours_standard/36525, 1) . " ".$trans["siècle(s)"]."</td>";
		}
	echo "</tr>";

	echo "<tr>";
		echo "<td align = 'center'><b>".$trans["Résistance à une"]." <a href = '#attaque_distribuee_content' id='attaque_distribuee_link' >".$trans["attaque distribuée"]."</a></b></td>";
		if (round($nbr_jours_distribuee*24*3600/60, 0) == 0)
		{
			echo "<td align = 'center'>_</td>";
			echo "<td align = 'center'><b>".$trans["instantané"]."</b></td>";
			echo "<td align = 'center'>_</td>";
		}
		else
		{
			if (($nbr_jours_distribuee) < 1)
			{
				if (round($nbr_jours_distribuee*24*3600/60, 0) < 60)
					echo "<td align = 'center'>" . round($nbr_jours_distribuee*24*3600/60, 0) . " ".$trans["minute(s)"]."</td>";
				else
					echo "<td align = 'center'>" . round(round($nbr_jours_distribuee*24*3600/60, 0)/60, 1) . " ".$trans["heure(s)"]."</td>";
			}
			else
				echo "<td align = 'center'>" . round($nbr_jours_distribuee, 2) . " ".$trans["jours"]."</td>";
			if (round($nbr_jours_distribuee/365.25, 1) == 0)
				echo "<td align = 'center'>_</td>";
			else
				echo "<td align = 'center'>".$trans["soit"]." " . round($nbr_jours_distribuee/365.25, 1) . " ".$trans["année(s)"]."</td>";
			if (round($nbr_jours_distribuee/36525, 1) == 0)
				echo "<td align = 'center'>_</td>";
			else
				echo "<td align = 'center'>".$trans["soit"]." " . round($nbr_jours_distribuee/36525, 1) . " ".$trans["siècle(s)"]."</td>";
		}
	echo "</tr>";

	echo "<tr>";
		echo "<td align = 'center'><b>".$trans["Résistance à une"]." <a href = '#attaque_top500_number_one_content' id = 'attaque_top500_number_one_link'>".$trans["attaque avec l'ordinateur le plus puissant de la planète"]."</a></b></td>";
		if (round($nbr_jours_top500_number_one*24*3600/60, 0) == 0)
		{
			echo "<td align = 'center'>_</td>";
			echo "<td align = 'center'><b>".$trans["instantané"]."</b></td>";
			echo "<td align = 'center'>_</td>";
		}
		else
		{
			if (($nbr_jours_top500_number_one) < 1)
			{
				if (round($nbr_jours_top500_number_one*24*3600/60, 0) < 60)
					echo "<td align = 'center'>" . round($nbr_jours_top500_number_one*24*3600/60, 0) . " ".$trans["minute(s)"]."</td>";
				else
					echo "<td align = 'center'>" . round(round($nbr_jours_top500_number_one*24*3600/60, 0)/60, 1) . " ".$trans["heure(s)"]."</td>";
			}
			else
			{
				$tmp = round($nbr_jours_top500_number_one, 2);
				//echo "<td align = 'center'>" . separer_les_milliers_de_nbr_a_virgules("$tmp") . " jours</td>";
				echo "<td align = 'center'>" . $tmp . " ".$trans["jours"]."</td>";
			}
			if (round($nbr_jours_top500_number_one/365.25, 1) == 0)
				echo "<td align = 'center'>_</td>";
			else
			{
				$tmp = round($nbr_jours_top500_number_one/365.25, 1);
				echo "<td align = 'center'>".$trans["soit"]." " . separer_les_milliers_de_nbr_a_virgules("$tmp") . " ".$trans["année(s)"]."</td>";
				//echo "<td align = 'center'>soit " . $tmp . " année(s)</td>";
			}
			if (round($nbr_jours_top500_number_one/36525, 1) == 0)
				echo "<td align = 'center'>_</td>";
			else
				echo "<td align = 'center'>".$trans["soit"]." " . round($nbr_jours_top500_number_one/36525, 1) . " ".$trans["siècle(s)"]."</td>";
		}
	echo "</tr>";

	echo "<tr>";
		echo "<td align = 'center'><b>".$trans["Résistance à une"]." <a href = '#attaque_totalcomputing_content' id = 'attaque_totalcomputing_link'>".$trans["attaque utilisant les 500 plus puissants ordinateurs de la planète"]."</a></b></td>";
		if (round($nbr_jours_totalcomputing*24*3600/60, 0) == 0)
		{
			echo "<td align = 'center'>_</td>";
			echo "<td align = 'center'><b>".$trans["instantané"]."</b></td>";
			echo "<td align = 'center'>_</td>";
		}
		else
		{
			if (($nbr_jours_totalcomputing) < 1)
			{
				if (round($nbr_jours_totalcomputing*24*3600/60, 0) < 60)
					echo "<td align = 'center'>" . round($nbr_jours_totalcomputing*24*3600/60, 0) . " ".$trans["minute(s)"]."</td>";
				else
					echo "<td align = 'center'>" . round(round($nbr_jours_totalcomputing*24*3600/60, 0)/60, 1) . " ".$trans["heure(s)"]."</td>";
			}
			else
				echo "<td align = 'center'>" . round($nbr_jours_totalcomputing, 2) . " ".$trans["jours"]."</td>";
			if (round($nbr_jours_totalcomputing/365.25, 1) == 0)
				echo "<td align = 'center'>_</td>";
			else
				echo "<td align = 'center'>".$trans["soit"]." " . round($nbr_jours_totalcomputing/365.25, 1) . " ".$trans["année(s)"]."</td>";
			if (round($nbr_jours_totalcomputing/36525, 1) == 0)
				echo "<td align = 'center'>_</td>";
			else
				echo "<td align = 'center'>".$trans["soit"]." " . round($nbr_jours_totalcomputing/36525, 1) . " ".$trans["siècle(s)"]."</td>";
		}
	echo "</tr>";
	echo "</table>";
	echo "<br/>";
	echo "<a href='/index.php?lang=".$currentLang."'>".$trans["Retour"]."</a>";
	echo "</center>";
	echo "</div>";
}

require_once "footer.php";