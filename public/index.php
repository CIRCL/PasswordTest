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
	require_once "../include/conf.php";
	require_once "../translations/translations.php";
	require_once "../include/functions.php";
	//start display
	require_once "../header.php";
?>
<?php if ($translate->getLanguage()!='fr'): ?>
	<a href="index.php?lang=fr" ><img src="images/flag_fr_64.png" alt="Français"  border="0"/></a>
<?php endif; ?>
<?php if ($translate->getLanguage()!='de'): ?>
	<a href="index.php?lang=de"><img src="images/flag_de_64.png" alt="Allemand" border="0"/></a>
<?php endif; ?>
<?php if ($translate->getLanguage()!='en'): ?>
	<a href="index.php?lang=en"><img src="images/flag_en_64.png" alt="Anglais" border="0"/></a>
<?php endif; ?>
<form action = '#' method = 'post' name = 'form'>

	<input type="hidden" name="lang" value="<?=$translate->getLanguage()?>" />
	<input type="hidden" name="longueur_MdP" id="longueur_MdP" value="<?=LONG_DEFAUT?>" />

	<div id="container">
		<div id="longueur">
			<h4><?=$translate("Combien de caractères composent le mot de passe?")?></h4>
			<br/>
			<?=$translate("Le mot de passe est composé de")?>
			<span id="longueur_MdP_ecrit"><?=LONG_DEFAUT?></span>
			<?=$translate("caractères.")?>
			<br/>
			<p>
				<div id="slider"></div>
			</p>
			<br/><br/>
			<input type="button" value="<?=$translate('Suivant')?>" id="longueur_next"/>
		</div>

		<div id="type">
			<h4><?=$translate("Quels sont les caractères utilisés dans le mot de passe ?")?></h4>
			<table width = '45%' align="center">
				<tr>
					<td width="20%">
						<input type='checkbox' name='set_chars_minuscules' value='1'>
						<img src="images/delete.png" id="set_chars_minuscules" class="chkimg" alt="checkbox"/>
					</td>
					<td width="80%"><?=$translate("Minuscules - a..z")?></td>
				</tr>
				<tr>
					<td>
						<input type='checkbox' name='set_chars_majuscules' value='1'>
						<img src="images/delete.png" id="set_chars_majuscules" class="chkimg" alt="checkbox"/>
					</td>
					<td><?=$translate("Majuscules - A..Z")?></td>
				</tr>
				<tr>
					<td>
						<input type='checkbox' name='set_chars_chiffres' value='1'>
						<img src="images/delete.png" id="set_chars_chiffres" class="chkimg" alt="checkbox"/>
					</td>
					<td><?=$translate("Chiffres - 0..9")?></td>
				</tr>
				<tr>
					<td>
						<input type='checkbox' name='set_chars_speciaux' value='1'>
						<img src="images/delete.png" id="set_chars_speciaux" class="chkimg" alt="checkbox"/>
					</td>
					<td><?=$translate("Caractères spéciaux et signes de ponctuation - [](){}@#*.;-_!?, etc.")?></td>
				</tr>
			</table>
			<br/><br/>
			<input type = 'button' name='submit' id="submit" class="center" value = '<?=$translate("Evaluer la résistance du mot de passe")?>'/>
			<img src="images/loading.gif" id="submit_wait" class="center" alt="please wait" />
			<div class="error"><?=$translate("Vous devez choisir au moins un jeu de caractères!")?></div>
		</div>

		<div id="resultats"></div>
	</div>
</form>

<?php require_once "../footer.php";
