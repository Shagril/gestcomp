 <?php
session_start();


	
require('rotation.php');
	include_once('../Include/Function/db.php');
	
	$bdd = db_connect
	
	
	if(isset($_SESSION['mail']))
	{
		$email = $_SESSION['mail'];
		unset($_SESSION['mail']);
		$req='select nom, prenom from utilisateur where maillogin="'.$email.'"';
		//echo $req;
		$reponse = $bdd->query($req);
		$donnees = $reponse->fetch();
		$nom=$donnees['nom'];
		$prenom=$donnees['prenom'];

	}
	else
	{
		$email = $_SESSION['email'];
		$nom=$_SESSION['nom'];
		$prenom=$_SESSION['prenom'];
	}

		
	
		$req='select libelle, numeroINE from parcours p, promotion pro, etudiant etu where maillogin="'.$email.'" and etu.codepromotion=pro.codepromotion and pro.codeparcours=p.codeparcours';
		$reponse = $bdd->query($req);
		$donnees = $reponse->fetch();
		$parcours = $donnees['libelle'];
		$numeroINE = $donnees['numeroINE'];
		
		
		
		$req ='select a.CODEACTIVITE, a.LIBELLE as LibelleActivite, a.CODEPROCESSUS,p.LIBELLE as LibelleProcessus from activite a, processus p where a.CODEPROCESSUS=p.CODEPROCESSUS order by a.CODEACTIVITE';
		$reponse = $bdd->query($req);
		$ligne=0;
		while($donnees = $reponse->fetch())//je place les données de la requette dans un tableau pour pouvoir les manipuler
		{
			$rows[$ligne++] = $donnees;
		}
		
		$req ='select count(codeactivite) as nbRef , codeactivite from mettre_en_oeuvre m, situation s where codeutilisateur="'.$email.'" and s.codesituation=m.codesituation group by m.codeactivite';
		$reponse = $bdd->query($req);
		$ligne=0;
		while($donnees = $reponse->fetch())//je place les données de la requette dans un tableau pour pouvoir les manipuler
		{
			$rowsRef[$ligne++] = $donnees;
		}
		
		$req ='select libelle, CODEOBLIGATIONSITUATION from situation_obligatoire';
		$reponse = $bdd->query($req);
		$ligne=0;
		while($donnees = $reponse->fetch())//je place les données de la requette dans un tableau pour pouvoir les manipuler
		{
			$rowsObligatoire[$ligne++] = $donnees;
		}
		
		$req ='select count(si.codesituation) as nbRef, codeobligationsituation from situation s, situationobligatoire si where codeutilisateur="'.$email.'" and s.codesituation=si.codesituation group by si.codeobligationsituation';
		//print_r($req);
		$reponse = $bdd->query($req);
		$ligne=0;
		while($donnees = $reponse->fetch())//je place les données de la requette dans un tableau pour pouvoir les manipuler
		{
			$rowsObligatoireRef[$ligne++] = $donnees;
		}
		// echo "<pre>";
		// print_r($rows);
		// echo"</pre>";
class PDF extends PDF_Rotate
{
function RotatedText($x,$y,$txt,$angle)
{
	//Text rotated around its origin
	$this->Rotate($angle,$x,$y);
	$this->Text($x,$y,$txt);
	$this->Rotate(0);
}

function RotatedImage($file,$x,$y,$w,$h,$angle)
{
	//Image rotated around its upper-left corner
	$this->Rotate($angle,$x,$y);
	$this->Image($file,$x,$y,$w,$h);
	$this->Rotate(0);
}
}

$pdf=new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',8);
$pdf->RotatedText(15,11,utf8_decode('Je soussigné-e                                    formatrice(formateur) au centre de formation                                    certificie que le candidat(la candidate) a bien effectué en formation les activités et missions présentées dans ce tableau'),-90);
$pdf->SetFont('Arial','',14);
$pdf->RotatedText(200,50,utf8_decode('BTS SERVICES INFORMATIQUES AUX ORGANISATIONS-TABLEAU DE SYNTHESE'),-90);
$pdf->SetFont('Arial','',12);
$pdf->RotatedText(180,35,utf8_decode('Nom et prénom du candidat: '.$nom.' '.$prenom.'                    Parcours: '.$parcours.'                     Numéro du candidat: '.$numeroINE),-90);
$pdf->SetFont('Arial','',5);
$pdf->SetX(30);
$pdf->Cell(15,4,'',1,0,'');
$pdf->SetDrawColor(235 , 235 , 235 );
$pdf->Cell(25,4,'',1,0,'');
$pdf->SetDrawColor(0, 0, 0);
$pdf->Cell(60,4,'',1,0,'');
$pdf->RotatedText(140,11,'Situation obligatoire',-90);
$pdf->Cell(20,16,'',1,0,'');
$i=0;
foreach($rowsObligatoire as $data)
{
	
		$i=$i+1;
		$pdf->SetX(30);
		$ref=false;
		foreach($rowsObligatoireRef as $data1)
		{
			if($data['CODEOBLIGATIONSITUATION']==$data1['codeobligationsituation'] and $data1['nbRef']>0)
			{	
				$ref=true;
			}
		}

		if($ref)
		{
			$pdf->Cell(15,4,'X',1,0,'');
		}
		else
		{
			$pdf->Cell(15,4,'',1,0,'');	
		}
		
		$pdf->SetDrawColor(235 , 235 , 235 );
		$pdf->Cell(25,4,'',1,0,'');
		$pdf->SetDrawColor(0, 0, 0);
		$pdf->Cell(60,4,$data['libelle'],1,1,'');
}






$pdf->SetY(40);
$i=0;
foreach($rows as $data)
{
	if($data['CODEPROCESSUS']=='P1')
	{
		$processus=$data['LibelleProcessus'];
		$i=$i+1;
		$pdf->SetX(30);
		$ref=false;
		foreach($rowsRef as $data1)
		{
			if($data['CODEACTIVITE']==$data1['codeactivite'] and $data1['nbRef']>0)
			{	
				$ref=true;
			}
		}
		if($ref)
		{
			$pdf->Cell(15,4,'X',1,0,'');
		}
		else
		{
			$pdf->Cell(15,4,'',1,0,'');
		}
		
		$pdf->SetDrawColor(235 , 235 , 235 );
		$pdf->Cell(25,4,'',1,0,'');
		$pdf->SetDrawColor(0, 0, 0);
		$pdf->Cell(60,4,$data['CODEACTIVITE'].' '.$data['LibelleActivite'],1,1,'');
	}
	
}
$pdf->SetY($pdf->GetY()-$i*4);
$pdf->SetX(130);
$Y=$pdf->GetY();
$pdf->Cell(20,4*$i,'',1,0,'');
$pdf->RotatedText(140,$Y+2,$processus,-90);



$pdf->SetY($pdf->getY()+$i*4);
$i=0;
foreach($rows as $data)
{
	if($data['CODEPROCESSUS']=='P2')
	{
		$processus=$data['LibelleProcessus'];
		$i=$i+1;
		$pdf->SetX(30);
		$ref=false;
		foreach($rowsRef as $data1)
		{
			if($data['CODEACTIVITE']==$data1['codeactivite'] and $data1['nbRef']>0)
			{	
				$ref=true;
			}
		}
		if($ref)
		{
			$pdf->Cell(15,4,'X',1,0,'');
		}
		else
		{
			$pdf->Cell(15,4,'',1,0,'');
		}
		
		$pdf->SetDrawColor(235 , 235 , 235 );
		$pdf->Cell(25,4,'',1,0,'');
		$pdf->SetDrawColor(0, 0, 0);
		$pdf->Cell(60,4,$data['CODEACTIVITE'].' '.$data['LibelleActivite'],1,1,'');
	}
	
}
$pdf->SetY($pdf->GetY()-$i*4);
$pdf->SetX(130);
$Y=$pdf->GetY();
$pdf->Cell(20,4*$i,'',1,0,'');
$pdf->RotatedText(140,$Y+2,$processus,-90);



$pdf->SetY($pdf->getY()+$i*4);
$i=0;
foreach($rows as $data)
{
	if($data['CODEPROCESSUS']=='P3')
	{
		$processus=$data['LibelleProcessus'];
		$i=$i+1;
		$pdf->SetX(30);
		$ref=false;
		foreach($rowsRef as $data1)
		{
			if($data['CODEACTIVITE']==$data1['codeactivite'] and $data1['nbRef']>0)
			{	
				$ref=true;
			}
		}
		if($ref)
		{
			$pdf->Cell(15,4,'X',1,0,'');
		}
		else
		{
			$pdf->Cell(15,4,'',1,0,'');
		}
		
		$pdf->SetDrawColor(235 , 235 , 235 );
		$pdf->Cell(25,4,'',1,0,'');
		$pdf->SetDrawColor(0, 0, 0);
		$pdf->Cell(60,4,$data['CODEACTIVITE'].' '.$data['LibelleActivite'],1,1,'');
	}
	
}
$pdf->SetY($pdf->GetY()-$i*4);
$pdf->SetX(130);
$Y=$pdf->GetY();
$pdf->Cell(20,4*$i,'',1,0,'');
$pdf->RotatedText(140,$Y+2,$processus,-90);



$pdf->SetY($pdf->getY()+$i*4);
$i=0;
foreach($rows as $data)
{
	if($data['CODEPROCESSUS']=='P4')
	{
		$processus=$data['LibelleProcessus'];
		$i=$i+1;
		$pdf->SetX(30);
		$ref=false;
		foreach($rowsRef as $data1)
		{
			if($data['CODEACTIVITE']==$data1['codeactivite'] and $data1['nbRef']>0)
			{	
				$ref=true;
			}
		}
		if($ref)
		{
			$pdf->Cell(15,4,'X',1,0,'');
		}
		else
		{
			$pdf->Cell(15,4,'',1,0,'');
		}
		
		$pdf->SetDrawColor(235 , 235 , 235 );
		$pdf->Cell(25,4,'',1,0,'');
		$pdf->SetDrawColor(0, 0, 0);
		$pdf->Cell(60,4,$data['CODEACTIVITE'].' '.$data['LibelleActivite'],1,1,'');
	}
	
}
$pdf->SetY($pdf->GetY()-$i*4);
$pdf->SetX(130);
$Y=$pdf->GetY();
$pdf->Cell(20,4*$i,'',1,0,'');
$pdf->RotatedText(140,$Y+2,$processus,-90);




$pdf->SetY($pdf->getY()+$i*4);
$i=0;
foreach($rows as $data)
{
	if($data['CODEPROCESSUS']=='P5')
	{
		$processus=$data['LibelleProcessus'];
		$i=$i+1;
		$pdf->SetX(30);
		$ref=false;
		foreach($rowsRef as $data1)
		{
			if($data['CODEACTIVITE']==$data1['codeactivite'] and $data1['nbRef']>0)
			{	
				$ref=true;
			}
		}
		if($ref)
		{
			$pdf->Cell(15,4,'X',1,0,'');
		}
		else
		{
			$pdf->Cell(15,4,'',1,0,'');
		}
		
		$pdf->SetDrawColor(235 , 235 , 235 );
		$pdf->Cell(25,4,'',1,0,'');
		$pdf->SetDrawColor(0, 0, 0);
		$pdf->Cell(60,4,$data['CODEACTIVITE'].' '.$data['LibelleActivite'],1,1,'');
	}
	
}
$pdf->SetY($pdf->GetY()-$i*4);
$pdf->SetX(130);
$Y=$pdf->GetY();
$pdf->Cell(20,4*$i,'',1,0,'');
$pdf->RotatedText(140,$Y+2,$processus,-90);














$pdf->Output();






?>