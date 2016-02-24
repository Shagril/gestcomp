
<html>
<!-- code situation non gerer -->
<script>
function Enregistrer(){
	var activite = new Array();
	var ListeOption = document.getElementById(insert);
	var l= document.getElementById("insert").length;
		for(var i = 0; i< l;i++ )
		{
					if(activite.indexOf(document.activite.insert.options[i].value) == -1)
					{
						activite.push(document.activite.insert.options[i].value);
					}	
		}
		
		var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange=function()
{
	
	if (xmlhttp.readyState==4 && xmlhttp.status==200)
	{
		console.log(xmlhttp.responseText);
		
	}
}
xmlhttp.open("POST", "enregistrerActivite", true);
xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
xmlhttp.send("activite=" + activite);



}
function modif(){
	var indi=document.activite.select.selectedIndex;
	var choixa=document.activite.select.options[indi].value;
	document.activite.select.options[indi].disabled = true;
switch(choixa){
<?php
	
$req="SELECT codeactivite from activite";
$reponse = $db->query($req);
while($donnees = $reponse->fetch())
{
	$req1=$db->prepare("select libelle, codecompetence from competence where codeactivite = :activite");
	$req1->execute(array (
	'activite' => $donnees['codeactivite']
	));
	
echo'case "' .$donnees['codeactivite'].'":';
echo'var option = document.createElement("option");';
echo'option.text = "'.$donnees['codeactivite'].'";
	option.value = "'.$donnees['codeactivite'].'";
	document.getElementById(\'insert\').add(option);
	option = document.createElement("option");;';
while($donnees1 = $req1->fetch())
{
	echo'option.text = "'.$donnees1['codecompetence']." ".$donnees1['libelle'].'";
	option.disabled = true;
	option.value = "'.$donnees['codeactivite'].'";
	document.getElementById(\'insert\').add(option);
	option = document.createElement("option");;';
}
echo'option.text = "------------------";
option.value="'.$donnees['codeactivite'].'";
option.disabled = true;
document.getElementById(\'insert\').add(option);
option = document.createElement("option");;';
echo'break;';
}
?>}}

function Supprimer()
{
	insert = document.activite.insert;
	value = "";
	var i=0;
	var j=0;
	var trouver=false;
	
	while (i<=insert.length-1 )
	{
		if (insert.options[i].selected)
		{
			value = insert.options[i].value;

			while (j<=document.activite.select.length-1)
			{
				if (document.activite.select.options[j].value == value)
				{
					document.activite.select.options[j].disabled = false;
				}
				j++;
			}
		}
		
		if (insert.options[i].value == value )
		{
			insert.options[i] = null;
			i--;
		}	
		i++;
	}
}
</script>
<head></head>
<body>
	<form name="activite">
		<p>Vous sélectionnez une ou plusieurs activités du référentiel dans la liste ci-dessous afin  qu'elle(s)
			apparaisse(nt) dans la liste des "Activités mises en œuvre". Les compétences correspondantes sont alors indiquées dans la liste des "Compétences". </p>
			
		<p>Activités du référentiel:</p>
		
		<select name="select" size="10" STYLE="width:900" onchange="modif();">
		
<?php
	$req="SELECT codeactivite, codeprocessus, libelle FROM activite order by codeactivite";
	$reponse = $db->query($req);
	$processus = "";
	
	$req1="select codeactivite from mettre_en_oeuvre";
	$reponse1=$db->query($req1);
	$donnees1=$reponse1->fetchall();
	while($donnees = $reponse->fetch())
	{
		if($processus != $donnees['codeprocessus'])
		{
			echo'<option disabled >------------------ </option>';
		}
		
		
		$insert = false;
		$cpt=0;
		while($cpt < count($donnees1) && !$insert)
		{
			if($donnees1[$cpt]['codeactivite'] == $donnees['codeactivite'] && !$insert)
			{
				echo'<option disabled value="'.$donnees['codeactivite'].'">'.$donnees['codeactivite']." ".$donnees['libelle'].'</option>';
				$insert = true;
			}
			$cpt++;
		}
		
		if(!$insert)
		{
			echo'<option value="'.$donnees['codeactivite'].'">'.$donnees['codeactivite']." ".$donnees['libelle'].'</option>';
		}
		$processus =  $donnees['codeprocessus'];
	}
?>

</select>
	<div>
		<p>En sélectionnant une ou plusieurs des activités ci-dessous, vous mettez en évidence les compétences 
			correspondantes. Le bouton "Supprimer" permet éventuellement de retirer la(les) activité(s) de cette liste.<p>
	</div>
			
	<div >
		<p>Activités et compétences mises en œuvre:<p>
	</div>
	
	<div  >
		<select name="insert" id="insert" size="10" STYLE="width:900">
		<?php
	$req="SELECT codeactivite FROM mettre_en_oeuvre order by codeactivite";
	$reponse = $db->query($req);
	$processus = "";
	while($donnees = $reponse->fetch())
	{
		echo'<option value="'.$donnees['codeactivite'].'">'.$donnees['codeactivite'].'</option>';
		$req1=$db->prepare("SELECT codecompetence, libelle FROM competence where codeactivite= :activite");
		$req1->execute(array (
		'activite' => $donnees['codeactivite']));
		while ($donnees1 = $req1->fetch())
		{
			echo'<option disabled value="'.$donnees['codeactivite'].'">'.$donnees1['codecompetence']." ".$donnees1['libelle'].'</option>';
		}
	echo'<option disabled value="'.$donnees['codeactivite'].'" >------------------ </option>';
		
	}
?>
		</select>
	</div>
			
	<input type = "button" value = "Supprimer" onClick="Supprimer();"> </input> 
	<input type = "button" value = "Enregistrer" onClick="Enregistrer();"> </input> 
	</form>
	</body>

</html>

