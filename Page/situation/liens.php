<h1>Liens</h1>
<form name="frmSitu" method="post" action="index.php" onsubmit="return verif();">

<div class="titre">
	Vous saisissez un libellé explicite pour chaque production réalisée dans cette situation et vous indiquez l'URI permettant d'y accéder.
</div>

<input type="hidden" name="codeP[]" value="">
	<div class="libellebas">
		Désignation : 
	</div>
	<div class="champtexte">
		<input type="text" name="designation[]" size="100" maxlength="255" onchange="change=true;">
	</div>
	<div class="libellebas">
		Adresse (URL) : 
	</div>
	<div class="champtexte">
		<input type="text" name="adresse[]" size="100" maxlength="255" onchange="change=true;" "="">
	</div>
</div>