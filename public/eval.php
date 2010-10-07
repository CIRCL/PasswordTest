<?php
require_once "../include/conf.php";
require_once "../include/php_serial.class.php";
if (STORE_SESSION)
{
	session_start();
	$sessionId=session_id();
}
else
{
	$sessionId="NO_SESSION";
}

$indexFile=false;
require_once "../header.php";

if (!((isset($_POST['longueur_MdP']))))
	$longueur_MdP_ = 8;
else
{
	$longueur_MdP_ = securiser_input($_POST['longueur_MdP']);
	if ($longueur_MdP_>LONG_MAX)
	{
		$longueur_MdP_=LONG_MAX;
	}
	elseif ($longueur_MdP_<LONG_MIN)
	{
		$longueur_MdP_=LONG_MIN;
	}
}
if (!((isset($_POST['set_chars_minuscules']))))
	$set_chars_minuscules_ = 0;
else
	$set_chars_minuscules_ = 1;

if (!((isset($_POST['set_chars_majuscules']))))
	$set_chars_majuscules_ = 0;
else
	$set_chars_majuscules_ = 1;

if (!((isset($_POST['set_chars_chiffres']))))
	$set_chars_chiffres_ = 0;
else
{
	$set_chars_chiffres_ = 1;
}
if (!((isset($_POST['set_chars_speciaux']))))
	$set_chars_speciaux_ = 0;
else
	$set_chars_speciaux_ = 1;

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

	if (USE_DB)
	{
		$timestamp=date('U');

		$db=new SQLite3("../data/db.sqlite");

		$stmt = $db->prepare('INSERT INTO stats VALUES(:session_id,:timestamp,:length,:lcase,:ucase,:numbers,:special);');

		$stmt->bindValue(':lcase', $set_chars_minuscules_, SQLITE3_INTEGER);
		$stmt->bindValue(':ucase', $set_chars_majuscules_, SQLITE3_INTEGER);
		$stmt->bindValue(':numbers', $set_chars_chiffres_, SQLITE3_INTEGER);
		$stmt->bindValue(':special', $set_chars_speciaux_, SQLITE3_INTEGER);
		$stmt->bindValue(':length', $longueur_MdP_, SQLITE3_INTEGER);
		$stmt->bindValue(':session_id', $sessionId, SQLITE3_TEXT);
		$stmt->bindValue(':timestamp', $timestamp, SQLITE3_TEXT);

		$result = $stmt->execute();

		$db->close();
	}
	
	echo "<h2 style='text-align:center;'>".$trans["Evaluation de la résistance du mot de passe à différentes attaques brute-force"]."</h2>";

	//calcul des combinaisons possibles
	$nbr_combinaisons_possibles_du_MdP=0;
	for($t=1;$t<$longueur_MdP_;$t++)
	{
		$nbr_combinaisons_possibles_du_MdP += bcpow($nbr_caracteres_utilises,$t);
	}
	$nbr_combinaisons_possibles_du_MdP += bcpow($nbr_caracteres_utilises,$longueur_MdP_)*$facteur_chance;

	//calcul d'un force arbitraire du mot de passe
	if(SERIAL)
	{
		$strength=log($nbr_combinaisons_possibles_du_MdP,2);
		$facteur=($strength-25)/25;
		$strength*=1/(1+exp(-$facteur));
		if ($strength<0) $strength=0;
		if ($strength>100) $strength=100;
		$scale=SCALE_MAX-SCALE_MIN;
		$scaledStrength=($strength/100)*$scale;
		$scaledStrength+=SCALE_MIN;
		$scaledStrength=round($scaledStrength);

		$setting=ini_get('display_errors');
		if (!SERIAL_DEBUG)
		{
			ini_set('display_errors',false);
		}
		else
		{
			ini_set('display_errors',true);
		}
		$serial=new phpSerial();
		$serial->deviceSet(SERIAL_DEVICE);
		$serial->deviceOpen();
		$serial->sendMessage($scaledStrength);
		$serial->deviceClose();
		ini_set('display_errors',$setting);
	}

	if ($longueur_MdP_ == 0)
		echo $trans["Votre mot de passe ne comprend aucun caractère, il s'agit donc du mot de passe vide qui est trivial à deviner ;)"];

	$nbr_jours_standard = (($nbr_combinaisons_possibles_du_MdP*$flopsParMD5)/$puissance_standard)/(3600*24);
	$nbr_jours_distribuee = (($nbr_combinaisons_possibles_du_MdP*$flopsParMD5)/$puissance_distribuee)/(3600*24);
	$nbr_jours_top500_number_one = (($nbr_combinaisons_possibles_du_MdP*$flopsParMD5)/$puissance_top500_number_one)/(3600*24);
	$nbr_jours_totalcomputing = (($nbr_combinaisons_possibles_du_MdP*$flopsParMD5)/$puissance_totalecomputing)/(3600*24);
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
	echo "<a href='index.php?lang=".$currentLang."'>".$trans["Retour"]."</a>";
	echo "</center>";
}

require_once "../footer.php";
