<?php
/*******************************************************************************
Copyright 2011 CASES Luxembourg (www.cases.lu)
Copyright 2011 SMILE GIE

   Licensed under the Apache License, Version 2.0 (the "License");
   you may not use this file except in compliance with the License.
   You may obtain a copy of the License at

       http://www.apache.org/licenses/LICENSE-2.0

   Unless required by applicable law or agreed to in writing, software
   distributed under the License is distributed on an "AS IS" BASIS,
   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
   See the License for the specific language governing permissions and
   limitations under the License.

CASES and BEE SECURE are registered trademarks of SMILE GIE, all rights reserved
********************************************************************************/
?>
<br><br><br>
__________
<br>
<a href = '#plus_informations_content' id="plus_informations_link"><?=$translate("Plus d'informations")?></a>
<div style="display:none;">
	<div class="popup" id="plus_informations_content">
		<h1><?=$translate("Plus d'informations")?></h1>
		<p>
			<?=$translate("1. On suppose que l'attaquant effectue des attaques de type brute-force, c'est à dire que l'attaquant teste exhaustivement et les unes après les autres toutes les combinaisons de caractères qui pourraient avoir été utilisés pour écrire le mot de passe.")?>
		</p>
			<?=$translate("L'attaquant ne considère l'attaque par dictionnaire à aucun moment. Il faut toutefois garder en mémoire que si la victime choisissait son mot de passe comme un mot du dictionnaire, le temps nécessaire pour casser son mot de passe serait grandement réduit.")?>
		<p>
			<?=$translate("2. On suppose qu'il n'existe pas de vulnérabilités dans l'algorithme permettant de chiffrer le mot de passe. Si tel était le cas, le temps nécessaire pour trouver le mot de passe serait fortemment réduit.")?>
		</p>
		<p>
			<?=$translate("3. Lorsque l'on effectue plusieurs attaques de type brute-force, en moyenne on estime que l'attaquant devine le mot de passe après avoir testé la moitié des combinaisons de mots de passe possibles.")?>
		</p>
		<p>
			<?=$translate("4. On estime que l'attaquant ne possède pas les informations liées à la longeur du mot de passe avant de lancer toute attaque.")?>
		</p>
			<?=$translate("À titre d'illustration, pour brute-forcer un mot de passe de 8 caractères, l'attaquant doit faire des brute-force successifs pour des mots de passe de 1, 2, 3, 4, 5, 6, 7 et finalement 8 caractères.")?>
		<p>
			<?=$translate("5. Nous avons considéré qu'il fallait")?>
			<?=$flopsParMD5?>
			<?=$translate("opérations à virgule flottante pour évaluer un mot de passe.")?>
		</p>
		<p>
			<?=$translate("Pour plus d'informations, se reporter aux articles CASES Luxembourg suivants :")?>
		</p>
		<p>
			<img src = 'images/flchebleue.gif'>
			<a href="<?=$transUrl['Fiche thématique mots de passe']?>" target="_blank" ><?=$translate("Fiche thématique <i>mots de passe</i>")?></a>
		</p>
		<p>
			<img src = 'images/flchebleue.gif'>
			<a href="<?=$transUrl["Règles de comportement mots de passe"]?>" target="_blank" ><?=$translate("Règles de comportement <i>mots de passe</i>")?></a>
		</p>
		<p>
			<img src = 'images/flchebleue.gif'>
			<a href="<?=$transUrl["Fiche thématique gestion des accès - menaces sur le déchiffrage"]?>" target="_blank" >
				<?=$translate("Fiche thématique <i>gestion des accès - menaces sur le déchiffrage</i>")?>
			</a>
		</p>
		<p>
			<?=$translate("Liens externes : www.top500.org et boincstats.com")?>
		</p>
	</div>
	<div class="popup" id="attaque_standard_content">
		<h1><?=$translate("Attaque standard")?></h1>
		<p>
			<?=$translate("Attaque de type brute-force exécutée sur un PC familial récent utilisant des outils de cassage de mot de passe disponibles gratuitement sur internet.")?>
		</p>
		<p>
			<?=$translate("Puissance estimée :")?> <?=separer_les_milliers($puissance_standard/$flopsParMD5)?> <?=$translate("combinaisons testées par seconde.")?>
		</p>
	</div>
	<div class="popup" id="attaque_distribuee_content">
		<h1><?=$translate("Attaque distribuée")?></h1>
		<p>
			<?=$translate("Mise en parallèle d'un réseau de")?> <?=$nombre_machines_dans_botnet?> <?=$translate("ordinateurs zombies au sein d'un même botnet (estimation) pour se répartir la tâche de casser un mot de passe.")?>
		</p>
		<p>
			<?=$translate("Puissance estimée :")?> <?=separer_les_milliers($puissance_distribuee/$flopsParMD5);?> <?=$translate("combinaisons testées par seconde.")?>
		</p>
	</div>
	<div class="popup" id="attaque_top500_number_one_content">
		<h1><?=$translate("Attaque avec l'ordinateur le plus puissant de la planète")?></h1>
		<p>
			<?=$translate("Puissance de calcul de l'ordinateur le plus puissant de la planète.")?>
		</p>
		<p>
			<?=$translate("Puissance estimée :")?> <?php $tmp = $puissance_top500_number_one/1000000000 ; echo separer_les_milliers("$tmp");?> <?=$translate("GFlops soit")?> <?=separer_les_milliers($puissance_top500_number_one/$flopsParMD5)?> <?=$translate("combinaisons testées par seconde.")?>
		</p>
		<p style="font-size:smaller;">
			<?=$translate("source : http://www.top500.org/")?>
		</p>
	</div>
	<div class="popup" id="attaque_totalcomputing_content">
		<h1><?=$translate("Attaque utilisant les 500 plus puissants ordinateurs de la planète")?></h1>
		<p>
			<?=$translate("Puissance de calcul obtenue en combinant le travail des 500 plus puissants ordinateurs de la planète (scénario peu concevable dans les faits).")?>
		</p>
		<p>
			<?=$translate("Puissance estimée :")?> <?php $tmp = $puissance_totalecomputing/1000000000 ; echo separer_les_milliers("$tmp");?> <?=$translate("GFlops soit")?> <?=separer_les_milliers($puissance_totalecomputing/$flopsParMD5)?> <?=$translate("combinaisons testées par seconde.")?>
		</p>
		<p style="font-size:smaller;">
			<?=$translate("source : http://www.top500.org/")?>
		</p>
	</div>
</div>
</body>
</html>
