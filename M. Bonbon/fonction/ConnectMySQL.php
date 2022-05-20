<?php 
// connection au serveur MySQL
// -------------------------------
$connexion = mysqli_connect('localhost', 'root', '');

//if (mysqli_connect_errno()) { 
	
if (!$connexion) {
	echo 'Connexion impossible.  Information sur le serveur :<br>', mysqli_get_host_info($connexion);
	exit();
}


?> 
