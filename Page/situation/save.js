/* Déclaration d'un tableau qui contiendra les différentes valeurs a enregistrer. */

function save(){
	var data = {},
	    fields = document.getElementsByClassName('fields');

	for(var i=0;i<fields.length;i++)
	{
		var field = fields[i];
		if(data[field.id] == undefined)
			data[field.id] = field.value;
		else if(typeof(data[field.id])!='object')
			data[field.id] = new Array(field.value);
		else
			data[field.id].push(field.value);
	}
	
	fields = document.getElementsByClassName('reformuler');
	
	var activite = new Array();
	
	for(var i=0;i<fields.length;i++)
	{
		var field = fields[i];
		var x = {}
		x[field.name] = field.value;
		
		activite.push(x);
	}
	data['activite'] = activite;

	var req = new XMLHttpRequest();
	
	req.onreadystatechange = function() {
		if (req.readyState == 4 && req.status == 200) {
			//console.log(req.responseText);
		}
	};

	req.open("POST", "./Page/situation/saveSituation.php", true);
	req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	req.send('json='+JSON.stringify(data));
	
}
