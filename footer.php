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
<br><br><br>
__________
<br>
<a href = '#plus_informations_content' id="plus_informations_link"><?=$trans["Plus d'informations"]?></a>
<div style="display:none;">
	<div class="popup" id="plus_informations_content">
		<h1><?=$trans["Plus d'informations"]?></h1>
		<p>
			<?=$trans["1. On suppose que l'attaquant effectue des attaques de type brute-force, c'est à dire que l'attaquant teste exhaustivement et les unes après les autres toutes les combinaisons de caractères qui pourraient avoir été utilisés pour écrire le mot de passe."]?>
		</p>
			<?=$trans["L'attaquant ne considère l'attaque par dictionnaire à aucun moment. Il faut toutefois garder en mémoire que si la victime choisissait son mot de passe comme un mot du dictionnaire, le temps nécessaire pour casser son mot de passe serait grandement réduit."]?>
		<p>
			<?=$trans["2. On suppose qu'il n'existe pas de vulnérabilités dans l'algorithme permettant de chiffrer le mot de passe. Si tel était le cas, le temps nécessaire pour trouver le mot de passe serait fortemment réduit."]?>
		</p>
		<p>
			<?=$trans["3. Lorsque l'on effectue plusieurs attaques de type brute-force, en moyenne on estime que l'attaquant devine le mot de passe après avoir testé la moitié des combinaisons de mots de passe possibles."]?>
		</p>
		<p>
			<?=$trans["4. On estime que l'attaquant ne possède pas les informations liées à la longeur du mot de passe avant de lancer toute attaque."]?>
		</p>
			<?=$trans["À titre d'illustration, pour brute-forcer un mot de passe de 8 caractères, l'attaquant doit faire des brute-force successifs pour des mots de passe de 1, 2, 3, 4, 5, 6, 7 et finalement 8 caractères."]?>
		<p>
			<?=$trans["5. Nous avons considéré qu'il fallait"]?>
			<?=$flopsParMD5?>
			<?=$trans["opérations à virgule flottante pour évaluer un mot de passe."]?>
		</p>
		<p>
			<?=$trans["Pour plus d'informations, se reporter aux articles CASES Luxembourg suivants :"]?>
		</p>
		<p>
			<img src = 'images/flchebleue.gif'>
			<a href="<?=$transUrl['Fiche thématique mots de passe']?>" target="_blank" ><?=$trans["Fiche thématique <i>mots de passe</i>"]?></a>
		</p>
		<p>
			<img src = 'images/flchebleue.gif'>
			<a href="<?=$transUrl["Règles de comportement mots de passe"]?>" target="_blank" ><?=$trans["Règles de comportement <i>mots de passe</i>"]?></a>
		</p>
		<p>
			<img src = 'images/flchebleue.gif'>
			<a href="<?=$transUrl["Fiche thématique gestion des accès - menaces sur le déchiffrage"]?>" target="_blank" >
				<?=$trans["Fiche thématique <i>gestion des accès - menaces sur le déchiffrage</i>"]?>
			</a>
		</p>
		<p>
			<?=$trans["Liens externes : www.top500.org et boincstats.com"]?>
		</p>
	</div>
	<div class="popup" id="attaque_standard_content">
		<h1><?=$trans["Attaque standard"]?></h1>
		<p>
			<?=$trans["Attaque de type brute-force exécutée sur un PC familial récent utilisant des outils de cassage de mot de passe disponibles gratuitement sur internet."]?>
		</p>
		<p>
			<?=$trans["Puissance estimée :"]?> <?=separer_les_milliers($puissance_standard/$flopsParMD5)?> <?=$trans["combinaisons testées par seconde."]?>
		</p>
	</div>
	<div class="popup" id="attaque_distribuee_content">
		<h1><?=$trans["Attaque distribuée"]?></h1>
		<p>
			<?=$trans["Mise en parallèle d'un réseau de"]?> <?=$nombre_machines_dans_botnet?> <?=$trans["ordinateurs zombies au sein d'un même botnet (estimation) pour se répartir la tâche de casser un mot de passe."]?>
		</p>
		<p>
			<?=$trans["Puissance estimée :"]?> <?=separer_les_milliers($puissance_distribuee/$flopsParMD5);?> <?=$trans["combinaisons testées par seconde."]?>
		</p>
	</div>
	<div class="popup" id="attaque_top500_number_one_content">
		<h1><?=$trans["Attaque avec l'ordinateur le plus puissant de la planète"]?></h1>
		<p>
			<?=$trans["Puissance de calcul de l'ordinateur le plus puissant de la planète."]?>
		</p>
		<p>
			<?=$trans["Puissance estimée :"]?> <?php $tmp = $puissance_top500_number_one/1000000000 ; echo separer_les_milliers("$tmp");?> <?=$trans["GFlops soit"]?> <?=separer_les_milliers($puissance_top500_number_one/$flopsParMD5)?> <?=$trans["combinaisons testées par seconde."]?>
		</p>
		<p style="font-size:smaller;">
			<?=$trans["source : http://www.top500.org/"]?>
		</p>
	</div>
	<div class="popup" id="attaque_totalcomputing_content">
		<h1><?=$trans["Attaque utilisant les 500 plus puissants ordinateurs de la planète"]?></h1>
		<p>
			<?=$trans["Puissance de calcul obtenue en combinant le travail des 500 plus puissants ordinateurs de la planète (scénario peu concevable dans les faits)."]?>
		</p>
		<p>
			<?=$trans["Puissance estimée :"]?> <?php $tmp = $puissance_totalecomputing/1000000000 ; echo separer_les_milliers("$tmp");?> <?=$trans["GFlops soit"]?> <?=separer_les_milliers($puissance_totalecomputing/$flopsParMD5)?> <?=$trans["combinaisons testées par seconde."]?>
		</p>
		<p style="font-size:smaller;">
			<?=$trans["source : http://www.top500.org/"]?>
		</p>
	</div>
</div>
</body>
</html>
