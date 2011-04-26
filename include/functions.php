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

// ici on sécurise l'input, pour cela on n'accepte que les chiffres et seulement les chiffres
// on enleve tous les caractères qui ne sont pas des chiffres pour ne donner une chaîne de caractères ne contenant que des chiffres
function securiser_input($input)
{
	$input.='';
	$ret=preg_replace('/\D/','',$input);
	if (empty($ret) || $ret<1)
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
                $ret=array('<strong>','instantané','</strong>','');
        }
        else
        {
                if ($nb_jours < 1)
                {
                        if (round($nb_jours*24*3600/60, 0) < 60)
                        {
                                $res = round($nb_jours*24*3600/60, 0);
                                $ret=array('<strong>'. $res . '</strong> ', $res > 1 ? 'minutes' : 'minute','','');
                        }
                        else
                        {
                                $res = round(round($nb_jours*24*3600/60, 0)/60, 1);
                                $ret=array('<strong>'. $res . '</strong> ', $res > 1 ? 'heures' : 'heure','','');
                        }
                }
                elseif ($nb_jours<1000)
                {
                        $res = round($nb_jours, 2);
                        $ret=array('<strong>'. $res . '</strong> ', $res > 1 ? 'jours' : 'jour','','');
                }
                elseif ($nb_jours/365.25<1000)
                {
                        $res = round($nb_jours/365.25, 1);
                        $ret=array('<strong>'. $res . '</strong> ', $res > 1 ? 'années' : 'année','','');
                }
                elseif ($nb_jours/36525<1000)
                {
                        $res = round($nb_jours/36525, 1);
                        $ret=array('<strong>'. $res . '</strong> ', $res > 1 ? 'siècles' : 'siècle','','');
                }
                elseif ($nb_jours/365250<1000)
                {
                        $res = round($nb_jours/365250, 1);
                        $ret=array('<strong>'. $res . '</strong> ', $res > 1 ? 'millénaires' : 'millénaire','','');
                }
                else
                {
                        $value=$nb_jours/365250;
                        $exponent=log10($value);
                        $mantisse=$value/(pow(10,floor($exponent))*1.0);
                        $ret=array('<strong>'.round($mantisse).'</strong>','&times;10','<sup><strong>'.round($exponent).'</strong></sup> ','millénaires');
                }
        }
        return $ret;
}
