<?php
function connexion()
{
	$serveur="localhost";
	$utilisateur="root";
	$mdp="";
	$connect=mysql_connect($serveur,$utilisateur,$mdp);
	mysql_set_charset("utf8", $connect);
	mysql_select_db("e-project");

	return $connect;
}
?>