<?php

	if(isset($_GET['user']))
		$user = $_GET['user'];
	else
		$user = $_SESSION['email'];
	
	// $sql = 'SELECT s.codeSituation, s.libelle, count(c.codeSituation) AS \'nbCommentaires\'
			// FROM situation s
				// LEFT JOIN commenter c
					// ON c.codeSituation = s.codeSituation';
					
						$sql = 'SELECT s.codeSituation, s.libelle, count(m.codeSituation) AS \'nbActivite\'
			FROM situation s
				LEFT JOIN mettre_en_oeuvre m
					ON m.codeSituation = s.codeSituation';
	
	if(isset($user))
	{
		$sql .= ' WHERE s.codeUtilisateur = :user';
	}
	
	$sql .= ' GROUP BY 1, 2';
	
	$db = db_connect();
	
	$query = $db->prepare($sql);
	$query->execute(Array(
		'user'=>$user
	));

	if($query->rowCount() != 0)
	{
		echo('<table border=1 style="margin:auto;">');
		while($data = $query->fetch())
		{
			echo('<tr><td>'.$data['codeSituation'].'</td><td>'.$data['libelle'].'</td><td>activité('.$data['nbActivite'].')<td>
					<form action= "./situationTest" method="POST">
						<input type="hidden" name="ModifSituation" value="'.$data['codeSituation'].'">
						<input type="submit" text="test" name="modifier" value="Modifier"/>
						<input type="submit" text="test" name="supprimer" value="Supprimer"/>
					</form>
				</td><tr>');
		}
		echo('</table>');
	}
	else
	{
		echo('
			<div class="alert alert-dismissible alert-warning">
				<button type="button" class="close" data-dismiss="alert">&close;</button>
				<h4>Warning!</h4>
				<p>Aucune situation n\'existe pour ce compte, <a href="./addSituation" class="alert-link">cliquez ici pour en créer une</a>.</p>
			</div>
		');
	}
?>