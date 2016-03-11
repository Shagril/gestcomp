<?php

	$db = db_connect();
	
	if(isset($_REQUEST['email']))
		$email = $_REQUEST['email'];
	else
		$email = $_SESSION['email'];

	$query = $db->prepare("	SELECT a.CODEACTIVITE, a.LIBELLE, COUNT(m.CODEACTIVITE) AS 'nbActivite'
							FROM situation s
							LEFT JOIN mettre_en_oeuvre m
							ON s.CODESITUATION = m.CODESITUATION AND s.CODEUTILISATEUR = :utilisateur
							RIGHT JOIN activite a
							ON m.CODEACTIVITE = a.CODEACTIVITE
							GROUP BY 1");
	$query->execute(array(
			'utilisateur' => $email
	));

	echo('<table border=1><tr><th>Activité</th><th>Citée</th><th>Compétence</th></tr>');
	
	while ($data = $query->fetch())
	{
		if($data['nbActivite'] == 0)
			echo('<tr style="color:red;">');
		else
			echo('<tr style="color:green;">');
		
		echo('
				<td>'.$data['CODEACTIVITE'].'-'.$data['LIBELLE'].'</td><td>'.$data['nbActivite'].'</td><td>
			');
			
		
			
		$query2 = $db->prepare("SELECT CODECOMPETENCE, LIBELLE
								FROM competence
								WHERE CODEACTIVITE = :activite");
		$query2->execute(array(
				'activite' => $data['CODEACTIVITE']
		));
		
		while ($data2 = $query2->fetch())
		{
			echo($data2['CODECOMPETENCE'].'-'.$data2['LIBELLE'].'<br/>');
		}
		
		echo('</td></tr>');
		
	}
	
	echo('</table>');
	
	$query->closeCursor();

?>