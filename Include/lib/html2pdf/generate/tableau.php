<?php
	
	session_start();
	
	include('../../../Function/db.php');
	
	ob_start();
 	$num = 'PDF00-'.date('ymd');
 	$nom = 'BTS SIO LVV';
 	$date = Date('ymd');
	
	echo('<style type="text/css">
			table
			{
				padding: 0;
				margin:	0;
				font-size:	12pt;
				background: #FFFFFF;
				vertical-align: top;
				cellpadding: 0;
			}

			td
			{
				padding: 0;
				margin: 0;
			}

			td.div
			{
				width: 10px;
				height: 10px;
				text-align:	left;
				padding: 0;
				margin: 0;
			}

			td.div div
			{
				margin: 0;
				padding: 10;
				border: solid 1px;
				color: red;
				width: 10px;
				height: 10px;
				text-align: center; 
			}
		</style>');
	
	echo('<table border=1>');
				/***
					La requête SQL renvoi tous les Procéssus avec ces activitées liée
				*/
				$db = db_connect();
				
				
				$query = $db->prepare('	SELECT s.codeSituation, m.codeActivite
										FROM mettre_en_oeuvre m
											INNER JOIN situation s
												ON s.codeSituation = m.codeSituation
										WHERE s.codeSituation = :situation
				');
				
				$query->execute(Array(
									'situation'=>1
								)
				);
				
				$active = $query->fetchAll();
				
				
				
				
				$query = $db->prepare('	SELECT	p.codeProcessus, 
												p.libelle AS "nomProcessus",
												a.codeActivite, a.libelle AS "nomActivite"
										FROM processus p
											INNER JOIN activite a 
												ON a.codeProcessus = p.codeProcessus
										ORDER BY codeProcessus, codeActivite'
				);
				
				$query->execute();
				
				$processusRow = '';
				$lastProcessus = null;
				$nbLastProcessus = 0;
				$activiteRow = '';
				$otherRows = Array();
				
				while($data = $query->fetch())
				{
					$nbLastProcessus++;
					if($data['codeProcessus'] != $lastProcessus['code'])
					{
						if($lastProcessus != null)
							$processusRow .= '<td colspan='.$nbLastProcessus.'><div>'.$lastProcessus['code'].'- '.$lastProcessus['libelle'].'</div></td>';
						$lastProcessus = Array('code'=>$data['codeProcessus'], 'libelle'=>$data['nomProcessus']);
						$nbLastProcessus = 0;
					}
					$activiteRow .= '<td><div style="rotate:-90;">'.$data['codeActivite'].'- '.$data['nomActivite'].'</div></td>';
					
				}
				
				$nbLastProcessus++;
				$processusRow .= '<td  colspan='.$nbLastProcessus.'><div>'.$lastProcessus['code'].'- '.$lastProcessus['libelle'].'</div></td>';
				echo('
					<tr>'.$processusRow.'</tr>
					<tr>'.$activiteRow.'</tr>
				');
				
				foreach($otherRows AS $row)
					echo('
						<tr>'.$row.'</tr>
					');
		
	echo('</table>');
	
	$content = ob_get_clean();
	
	// conversion HTML => PDF
	require_once('../html2pdf.class.php');
	try
	{
		$html2pdf = new HTML2PDF('L','A3','fr');
		$html2pdf->pdf->SetDisplayMode('fullpage');
		$html2pdf->pdf->SetTitle('Tableau');
		$html2pdf->writeHTML($content, false);
		$html2pdf->Output();
	}
	catch(HTML2PDF_exception $e) { echo($e); }
?>