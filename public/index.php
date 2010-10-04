<?php
	require_once "../include/conf.php";
	$indexFile=true;
	require_once "../header.php";
?>
<?php if ($currentLang!='fr'): ?>
	<a href="index.php?lang=fr" ><img src="images/flag_fr_64.png" alt="Français"  border="0"/></a>
<?php endif; ?>
<?php if ($currentLang!='de'): ?>
	<a href="index.php?lang=de"><img src="images/flag_de_64.png" alt="Allemand" border="0"/></a>
<?php endif; ?>
<?php if ($currentLang!='en'): ?>
	<a href="index.php?lang=en"><img src="images/flag_en_64.png" alt="Anglais" border="0"/></a>
<?php endif; ?>
<form action = 'eval.php' method = 'post' name = 'form'>

	<input type="hidden" name="lang" value="<?=$currentLang?>" />
	<input type="hidden" name="longueur_MdP" id="longueur_MdP" value="<?=$longueur_MdP_?>" />

	<div id="container">
		<div id="longueur">
			<h4><?=$trans["1. Combien de caractères composent le mot de passe ?"]?></h4>
			<br/>
			<?=$trans["Le mot de passe est composé de"]?>
			<span id="longueur_MdP_ecrit"><?=$longueur_MdP_?></span>
			<?=$trans["caractères."]?>
			<br/>
			<p>
				<div id="slider"></div>
			</p>
			<br/><br/>
			<input type="button" value="Suivant" id="longueur_next"/>
		</div>

		<div id="type">
			<h4><?=$trans["2. Quels sont les caractères utilisés dans le mot de passe ?"]?></h4>
			<table width = '45%' border = '0' align="center">
				<tr>
					<td>
						<input type='checkbox' name='set_chars_minuscules' value='1'>
					</td>
					<td><?=$trans["Minuscules - a..z"]?></td>
				</tr>
				<tr>
					<td>
						<input type='checkbox' name='set_chars_majuscules' value='1'>
					</td>
					<td><?=$trans["Majuscules - A..Z"]?></td>
				</tr>
				<tr>
					<td>
						<input type='checkbox' name='set_chars_chiffres' value='1'>
					</td>
					<td><?=$trans["Chiffres - 0..9"]?></td>
				</tr>
				<tr>
					<td>
						<input type='checkbox' name='set_chars_speciaux' value='1'>
					</td>
					<td><?=$trans["Caractères spéciaux et signes de ponctuation - [](){}@#*.;-_!?, etc."]?></td>
				</tr>
			</table>
			<br/><br/>
			<input type = 'submit' name='submit' id="submit" value = '<?=$trans["Evaluer la résistance du mot de passe"]?>'/>
			<div class="error"><?=$trans["Vous devez choisir au moins un jeu de caractères!"]?></div>
		</div>
	</div>
</form>

<?php require_once "../footer.php";
