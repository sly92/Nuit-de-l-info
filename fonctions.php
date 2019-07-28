<?php 
require('connexion.php'); 

function CompteExist($db,$id,$mdp)
{
	try
	{
		
		$req = $db->prepare('Select * from association, benevole where mail=:id and mdp=:mdp');
	    $req->bindValue(':id',$id);
	    $req->bindValue(':mdp',$mdp);
		$req->execute();
		return $req->fetch() != false;	
	}
	catch(PDOException $e)
	{
		die('<p> Erreur PDO[' .$e->getCode().'] : ' .$e->getMessage() . '</p>');
	}
}
function testParam($cle,$tableau)
{
	foreach($cle as $v)
		if(!isset($tableau[$v]) or trim($tableau[$v])== '')
			return false;
	return true;
}

function deconnexion() {
	if(isset($_GET['deconnexion'])) {
		unset($_SESSION['id']);
	}
}

?>