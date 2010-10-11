<?php
/* ----------------------- FONCTIONS ----------------------- */


// ici on sécurise l'input, pour cela on n'accepte que les chiffres et seulement les chiffres
// on enleve tous les caractères qui ne sont pas des chiffres pour ne donner une chaîne de caractères ne contenant que des chiffres
function securiser_input($input)
{
	$input.='';
	$ret=preg_replace('/\D/','',$input);
	if (empty($ret))
	{
		$ret='8';
	}
	return $ret;
}


function separer_les_milliers($input)
{
	// Définition de la variable qui permet de donner le string qui permet de séparer les milliers
	$input=floor($input);
	$input="$input";
	$separateur_des_milliers = " ";

	$i = strlen($input);
	if ($i <= 3 || strstr($input,"E"))
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
	$input="$input";
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

function affiche_temps($nb_jours)
{
	if (round($nb_jours*24*3600/60, 0) == 0)
	{
		$ret=array('<b>','instantané','</b>','');
	}
	else
	{
		if ($nb_jours < 1)
		{
			if (round($nb_jours*24*3600/60, 0) < 60)
			{
				$ret=array(round($nb_jours*24*3600/60, 0) . ' ','minute(s)','','');
			}
			else
			{
				$ret=array(round(round($nb_jours*24*3600/60, 0)/60, 1) . ' ','heure(s)','','');
			}
		}
		elseif ($nb_jours<1000)
		{
			$ret=array(round($nb_jours, 2) . ' ','jours','','');
		}
		elseif ($nb_jours/365.25<1000)
		{
			$ret=array(round($nb_jours/365.25, 1) . ' ','année(s)','','');
		}
		elseif ($nb_jours/36525<1000)
		{
			$ret=array(round($nb_jours/36525, 1) . ' ','siècle(s)','','');
		}
		elseif ($nb_jours/365250<1000)
		{
			$ret=array(round($nb_jours/365250, 1) . ' ','millénaire(s)','','');
		}
		else
		{
			$value=$nb_jours/365250;
			$exponent=log10($value);
			$mantisse=$value/(pow(10,floor($exponent))*1.0);
			$ret=array('['.round($mantisse).' ','suivi de',' '.round($exponent).' ','zéros] millénaires');
		}
	}
	return $ret;
}