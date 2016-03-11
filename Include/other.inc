<?php
	error_reporting(E_ALL);
	ini_set( 'display_errors','1');
	
	function urllink($content='') {
		$content = preg_replace('#(((https?://)|(w{3}\.))+[a-zA-Z0-9&;\#\.\?=_/-]+\.([a-z]{2,4})([a-zA-Z0-9&;\#\.\?=_/-]+))#i', '<a href="$0" target="_blank">$0</a>', $content);
		// Si on capte un lien tel que www.test.com, il faut rajouter le http://
		if(preg_match('#<a href="www\.(.+)" target="_blank">(.+)<\/a>#i', $content)) {
			$content = preg_replace('#<a href="www\.(.+)" target="_blank">(.+)<\/a>#i', '<a href="http://www.$1" target="_blank">www.$1</a>', $content);
			//preg_replace('#<a href="www\.(.+)">#i', '<a href="http://$0">$0</a>', $content);
		}
	
		$content = stripslashes($content);
		return $content;
	}
	
	function redirect($link) {
		echo('<center>
			<div class="alert alert-dismissible alert-info" id="info">
				<meta http-equiv="Refresh" content=";url=./'.$link.'">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<div> <strong>Redirection en cours...</strong><br/>
				<a href="./'.$link.'" class="alert-link">Cliquez ici si vous ne voulez pas attendre...</a></div>
			</div>
		</center>');
	}

?>