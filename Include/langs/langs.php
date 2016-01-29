<?php 
	if(!isset($_REQUEST['lang']))
		$_REQUEST['lang'] = 'fr';
	
	if($_REQUEST['lang'] == 'fr')
	{
		include('Include/langs/fr.php');
	}
	elseif($_REQUEST['lang'] == 'en')
	{
		include('Include/langs/en.php');
	}
	else
	{
		$l_BOOTSTRAP = '$l_BOOTSTRAP';
		$l_PORTFOLIO = '$l_PORTFOLIO';
		$l_HOME = '$l_HOME';
		$l_VEILLE_TECHNO = '$l_VEILLE_TECHNO';
		$l_CV = '$l_CV';
		$l_PROJET = '$l_PROJET';
		$l_SIGNUP = '$l_SIGNUP';
		$l_SIGNIN = '$l_SIGNIN';
		$l_PSEUDO = '$l_PSEUDO';
		$l_PASSWORD = '$l_PASSWORD';
		$l_RESET = '$l_RESET';
		$l_DASHBOARD = '$l_DASHBOARD';
		$l_PROFILE = '$l_PROFILE';
		$l_MESSAGE = '$l_MESSAGE';
		$l_PARAMETTRE = '$l_PARAMETTRE';
		$l_SE_DECONNECTER = '$l_SE_DECONNECTER';
	}
?>