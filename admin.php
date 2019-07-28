<?php ob_start(); require_once('connexion.php'); 


// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['login'])) 
{
  // Si inexistante ou nulle, on redirige vers le formulaire de login
  header('Location: authentification.php');
  exit();
}
?>
  <body>	
 <?php
    // Si on est bien loggué, on affiche un message
	$_SESSION['connecte'] = true;
	//echo '<h1> Bienvenue '.$_SESSION['login'].'</h1>';
    require('index.php');	
?>

			