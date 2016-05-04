<?php

if(isset($_POST['bilans']))
{
	include_once('bilan.php');
}

if(isset($_POST['synthèse']))
{
	$_SESSION['mail']=$_POST['email'];
	header('location:pdf/pdf.php');
}








?>