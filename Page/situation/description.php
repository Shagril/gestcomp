	<script type="text/javascript">
	function radioclick (b) 
	{
		document.getElementById('obligatoire').style.display = (b!=1? 'none':'block');
		document.getElementById('obligatoire').style.display = (b!=1? 'none':'block');
	}
	</script>
	<form action="addSituation" method="post" id="description">
		<label for="libelle">Libelle court *:</label>
		<input type="text" name="libelle" id="libelle" class="fields" value="<?php echo $libelle ?>" required/><br><br>
		
		<label for="description">Description *:</label>
		<input type="text" name="description" id="description" class="fields" value="<?php echo $description ?>" required/><br><br>
		
		<label for="contexte">Contexte :</label>
		<input type="text" name="contexte" id="contexte" class="fields" value="<?php echo $contexte ?>"/><br><br>
		
		<label for="codeloc">Localisation</label>
		<select name="codeloc" id="codeloc" class="fields">
		<?php
			$req = $db->prepare('SELECT codeloc, libelle FROM localisation'); 
			$req->execute();	
			while ($donnees = $req->fetch())
			{
				if($donnees['codeloc']==$codeLoc)
				{
					echo '<option value="'.$donnees['codeloc'].'" selected>'.$donnees['libelle'].'</option>';
				}
				else
				{
					echo '<option value="'.$donnees['codeloc'].'" >'.$donnees['libelle'].'</option>';
				}
				
			}
		?>
		</select>
		
		<label for="codesource">Source</label>
		<select name="codesource" id="codesource" class="fields">
		<?php
			$req = $db->prepare('SELECT codesource, libelle FROM source'); 
			$req -> execute();	
			while ($donnees = $req->fetch())
			{
				if($donnees['codesource']==$codeSource)
				{
					echo '<option value="'.$donnees['codesource'].'" selected>'.$donnees['libelle'].'</option>';
				}
				else
				{
					echo '<option value="'.$donnees['codesource'].'">'.$donnees['libelle'].'</option>';
				}
				
			}
		?>
		</select>
		
		<label for="codecadre">Cadre</label>
		<select name="codecadre" id="codecadre" class="fields">
		<?php
			$req = $db->prepare('SELECT codecadre, libelle FROM situation_cadre'); 
			$req -> execute();	
			while ($donnees = $req->fetch())
			{
				if($donnees['codecadre']==$codeCadre)
				{
					echo '<option value="'.$donnees['codecadre'].'" selected>'.$donnees['libelle'].'</option>';
				}
				else
				{
					echo '<option value="'.$donnees['codecadre'].'">'.$donnees['libelle'].'</option>';
				}
				
			}
		?>
		</select>
		
		<label for="codetypesituation">Type</label>
		<select name="codetypesituation" id="codetypesituation" class="fields">
		<?php
			$req = $db->prepare('SELECT codetypesituation, libelle FROM type_situation'); 
			$req -> execute();	
			while ($donnees = $req->fetch())
			{
				if($donnees['codetypesituation']==$codeTypeSituation)
				{
					echo '<option value="'.$donnees['codetypesituation'].'"selected>'.$donnees['libelle'].'</option>';
				}
				else
				{
					echo '<option value="'.$donnees['codetypesituation'].'">'.$donnees['libelle'].'</option>';
				}
				
			}
		?>
		</select><br><br>
		
		<label for="datedebut">Date Début :</label>
		<input type="date" name="datedebut" id="datedebut" class="fields" value="<?php echo $dateDebut ?>"/><br><br>
		<label for="datefin">Date Fin :</label>
		<input type="date" name="datefin" id="datefin" class="fields" value="<?php echo $dateFin ?>"/><br><br>
		
		<label for="environnementtechnologique">Environnement technologique :</label>
		<input type="text" name="environnementtechnologique" id="environnementtechnologique" class="fields" value="<?php echo $environnementTechnologique ?>"/><br><br>
		
		<label for="moyens">Moyens :</label>
		<input type="text" name="moyens" id="moyens" class="fields" value="<?php echo $moyens ?>"/><br><br>
		
		<label for="avispersonnel">Avis personnel :</label>
		<input type="text" name="avispersonnel" id="avispersonnel" class="fields" value="<?php echo $avisPersonnel ?>"/><br><br>
		<div id="div">
		<label>Est-ce une situation obligatoire ?</label>
		<input type="radio" name="bradio" onclick="radioclick(1);"/> Oui
		<input type="radio" name="bradio" checked="checked" onclick="radioclick(2);"/> Non <br><br>
		</div>
		
		<div id="obligatoire" style="display:none">
		<?php
			$req = $db->prepare('SELECT CODEOBLIGATIONSITUATION, libelle FROM situation_obligatoire'); 
			$req -> execute();	
			while ($donnees = $req->fetch())
			{
				echo '<input type="checkbox" name="typologie[]" value="'.$donnees['CODEOBLIGATIONSITUATION'].'">'.$donnees['libelle'].'<br>';
			}
		?>
		
		
		
		</div>
		
		<label>*Champ(s) obligatoire(s)  </label>
		</br>
		<button type="submit" form="description" value="Submit">Enregistrer</button>
	</form>
