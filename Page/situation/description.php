	<script type="text/javascript">
	function radioclick (b) 
	{
		document.getElementById('div').style.display = (b!=1? 'none':'block');
		document.getElementById('div1').style.display = (b!=1? 'none':'block');
	}
	</script>
	
	<label for="libelle">Libelle court *:</label>
	<input type="text" name="libelle" id="libelle"/><br><br>
	
	<label for="description">Description *:</label>
	<input type="text" name="description" id="description"/><br><br>
	
	<label for="contexte">Contexte :</label>
	<input type="text" name="contexte" id="contexte"/><br><br>
	
	<label for="codeloc">Localisation</label>
	<select name="codeloc" id="codeloc">
	<?php
		$req = $db->prepare('SELECT codeloc, libelle FROM localisation'); 
		$req->execute();	
		while ($donnees = $req->fetch())
		{
			echo '<option value="'.$donnees['codeloc'].'">'.$donnees['libelle'].'</option>';
		}
	?>
	</select>
	
	<label for="codesource">Source</label>
	<select name="codesource" id="codesource">
	<?php
		$req = $db->prepare('SELECT codesource, libelle FROM source'); 
		$req -> execute();	
		while ($donnees = $req->fetch())
		{
			echo '<option value="'.$donnees['codesource'].'">'.$donnees['libelle'].'</option>';
		}
	?>
	</select>
	
	<label for="codecadre">Cadre</label>
	<select name="codecadre" id="codecadre">
	<?php
		$req = $db->prepare('SELECT codecadre, libelle FROM situation_cadre'); 
		$req -> execute();	
		while ($donnees = $req->fetch())
		{
			echo '<option value="'.$donnees['codecadre'].'">'.$donnees['libelle'].'</option>';
		}
	?>
	</select>
	
	<label for="codetypesituation">Type</label>
	<select name="codetypesituation" id="codetypesituation">
	<?php
		$req = $db->prepare('SELECT codetypesituation, libelle FROM type_situation'); 
		$req -> execute();	
		while ($donnees = $req->fetch())
		{
			echo '<option value="'.$donnees['codetypesituation'].'">'.$donnees['libelle'].'</option>';
		}
	?>
	</select><br><br>
	
	<label for="datedebut">Date Début :</label>
	<input type="date" name="datedebut" id="datedebut"/><br><br>
	<label for="datefin">Date Fin :</label>
	<input type="date" name="datefin" id="datefin"/><br><br>
	
	<label for="environnementtechnologique">Environnement technologique :</label>
	<input type="text" name="environnementtechnologique" id="environnementtechnologique"/><br><br>
	
	<label for="moyens">Moyens :</label>
	<input type="text" name="moyens" id="moyens"/><br><br>
	
	<label for="avispersonnel">Avis personnel :</label>
	<input type="text" name="avispersonnel" id="avispersonnel"/><br><br>
	<div id="div">
	<input type="radio" name="bradio" onclick="radioclick(1);" /> Oui
	</div>
	<div id="div1">
	<input type="radio" name="bradio" checked="checked" onclick="radioclick(2);"/> Non <br><br>
	</div>
	
	<label>*Champ(s) obligatoire(s)  </label><input type="submit" value="Envoyer">
