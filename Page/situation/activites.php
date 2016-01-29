<html>
<script>
function modif(){
	var indi=document.activite.select.selectedIndex;
	var choixa=document.activite.select.options[indi].value;
	document.activite.select.options[indi].disabled = true;
switch(choixa){
<?php
$bdd = db_connect();
	
$req="SELECT codeactivite from activite";
$reponse = $bdd->query($req);
while($donnees = $reponse->fetch())
{
	$req1=$bdd->prepare("select libelle, codecompetence from competence where codeactivite = :activite");
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
			//insert.options[i] = null;
			
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
<h1>Activites</h1>
	<form name="activite">
		<p>Vous sélectionnez une ou plusieurs activités du référentiel dans la liste ci-dessous afin  qu'elle(s)
			apparaisse(nt) dans la liste des 'Activités mises en œuvre'. Les compétences correspondantes sont alors indiquées dans la liste des 'Compétences'. </p>
			
		<p>Activités du référentiel:</p>
		<select name="select" size="10" STYLE="width:900" onchange="modif();">';
<?php
	$req="SELECT codeactivite, codeprocessus, libelle FROM activite order by codeactivite";
	$reponse = $bdd->query($req);
	$processus = "";
	while($donnees = $reponse->fetch())
	{
		if($processus != $donnees['codeprocessus'])
		{
			echo'<option disabled >------------------ </option>';
		}
		echo'<option value="'.$donnees['codeactivite'].'">'.$donnees['codeactivite']." ".$donnees['libelle'].'</option>';
		
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
		</select>
	</div>
			
	<input type = "button" value = "Supprimer" onClick="Supprimer();"> </input> 
	</form>
	</body>

</html>


