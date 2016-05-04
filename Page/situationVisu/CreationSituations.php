<html>
	<body>
		<form method="POST" action="AjoutSituations.php">
		
			<script type="text/javascript">
			function radioclick (b) 
			{
				document.getElementById('div').style.display = (b!=1? 'none':'block');
				document.getElementById('div1').style.display = (b!=1? 'none':'block');
			}
			</script>
		
			<?php
			try 
				{
					$bdd = new PDO('mysql:host=localhost;dbname=gestcomp','root','');
				}
				catch(Exception $e)
				{
					die('Erreur :'.$e->getMessage());
				}
			?>
			
			<label>Libelle court *:</label>
			<input type="text" name="libelle"/><br><br>
			
			<label>Description *:</label>
			<input type="text" name="description"/><br><br>
			
			<label>Contexte :</label>
			<input type="text" name="contexte"/><br><br>
			
			<label>Localisation</label>
			<select name="codeloc">
			<?php
				$req = $bdd->prepare('SELECT codeloc, libelle FROM localisation'); 
				$req -> execute();	
				while ($donnees = $req->fetch())
				{
					echo '<option value="'.$donnees['codeloc'].'">'.$donnees['libelle'].'</option>';
				}
			?>
			</select>
			
			<label>Source</label>
			<select name="codesource">
			<?php
				$req = $bdd->prepare('SELECT codesource, libelle FROM source'); 
				$req -> execute();	
				while ($donnees = $req->fetch())
				{
					echo '<option value="'.$donnees['codesource'].'">'.$donnees['libelle'].'</option>';
				}
			?>
			</select>
			
			<label>Cadre</label>
			<select name="codecadre">
			<?php
				$req = $bdd->prepare('SELECT codecadre, libelle FROM situation_cadre'); 
				$req -> execute();	
				while ($donnees = $req->fetch())
				{
					echo '<option value="'.$donnees['codecadre'].'">'.$donnees['libelle'].'</option>';
				}
			?>
			</select>
			
			<label>Type</label>
			<select name="codetypesituation">
			<?php
				$req = $bdd->prepare('SELECT codetypesituation, libelle FROM type_situation'); 
				$req -> execute();	
				while ($donnees = $req->fetch())
				{
					echo '<option value="'.$donnees['codetypesituation'].'">'.$donnees['libelle'].'</option>';
				}
			?>
			</select><br><br>
			
			<label>Date Début :</label>
			<input type="date" name="datedebut"/><br><br>
			<label>Date Fin :</label>
			<input type="date" name="datefin"/><br><br>
			
			<label>Environnement technologique :</label>
			<input type="text" name="environnementtechnologique"/><br><br>
			
			<label>Moyens :</label>
			<input type="text" name="moyens"/><br><br>
			
			<label>Avis personnel :</label>
			<input type="text" name="avispersonnel"/><br><br>
			<div id="div">
			<input type="radio" name="bradio" onclick="radioclick(1);" /> Oui
			</div>
			<div id="div1">
			<input type="radio" name="bradio" checked="checked" onclick="radioclick(2);"/> Non <br><br>
			</div>
			
			*Champ(s) obligatoire(s)  </label><input type="submit" value="Envoyer">
			
		</form>
	</body>
</html>
