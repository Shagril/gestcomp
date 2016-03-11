<?php
	
	$bdd = db_connect();
	
	$req = $bdd->prepare('SELECT distinct U.MDP, U.nom, U.prenom, U.estSupprimer, P.codepromotion, E.codepromotion, annee, E.maillogin FROM etudiant E, promotion P, utilisateur U where annee = :annee and E.codepromotion =P.CODEPROMOTION and U.maillogin = E.maillogin and U.estSupprimer = false');
	$req->execute(array (
	'annee' => $_POST['annee']
	));
	echo '<table  border=2 >';
	echo'<tr>';
	echo '<td>etudiant</td>';
	echo '<td>mdp</td>';
	echo '<td>promotion</td>';
	echo '</tr>';
	
	
	while ($donnees = $req->fetch())
	{
		$req1 = $bdd->prepare('SELECT nom, codepromotion FROM promotion where codepromotion='.$donnees['codepromotion'].'');
		$req1->execute();
		$donnee1 = $req1->fetch();
		
		$req2 = $bdd->prepare('SELECT nom, codepromotion FROM promotion');
		$req2->execute();

		echo'<form name="formulaire" method="POST" action="./modifierEtudiant">
			<tr>
			<input type="hidden" name="mail" size="20" value="'.$donnees['maillogin'].'" />
			<td><input type="test" name="promotion" size="20" value="'.$donnees['nom'].' '.$donnees['prenom'].'" disabled/></td>
			<td><input type="text" name="mdp" size="20" value="'.$donnees['MDP'].'" /></td>
			<td><select name="promotion">';
					while ($donnee2 = $req2->fetch())
					{

						
						if ($donnee2['codepromotion'] == $donnee1['codepromotion'])
						{
							echo'<option selected value="'.$donnee2['codepromotion'].'">' . $donnee2['nom'] . '</option>';
						}
						else
						{
							echo'<option value="'.$donnee2['codepromotion'].'">' . $donnee2['nom'] . '</option>';
						}
					}
		echo'</select></td>
			<td><input name="action" type="submit" value="modifier" /></td>
			<td><input name="action" type="submit" value="supprimer" /></td>
			</form>';
	    echo '</tr>';
	}
	echo'</table>';

?>