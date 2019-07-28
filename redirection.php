<?php
   if(isset($_GET["cat"]) and $_GET["cat"]=="nourriture")
   {
     $req=$db->query("SELECT idannonce FROM annonce_besoin WHERE idtype_besoin = 1");
     $res=$req->fetch();
     $req=$db->query("SELECT * FROM annonce WHERE idannonce=".$res[0]);
      
   }
   elseif(isset($_GET["cat"]) and $_GET["cat"]=="logement")
   {
     $req=$db->query("SELECT idannonce FROM annonce_besoin WHERE idtype_besoin = 2");
     $res=$req->fetch();
     $req=$db->query("SELECT * FROM annonce WHERE idannonce=".$res[0]);
      
   }
   elseif(isset($_GET["cat"]) and $_GET["cat"]=="sante")
   {
     $req=$db->query("SELECT idannonce FROM annonce_besoin WHERE idtype_besoin = 3");
     $res=$req->fetch(); 
     $req=$db->query("SELECT * FROM annonce WHERE idannonce=".$res[0]);
      
   }
   elseif(isset($_GET["cat"]) and $_GET["cat"]=="apprentissage")
   {
     $req=$db->query("SELECT idannonce FROM annonce_besoin WHERE idtype_besoin = 4");
     $res=$req->fetch(); 
     $req=$db->query("SELECT * FROM annonce WHERE idannonce=".$res[0]);
      
   }
   else{
     $req = $db->query('SELECT * FROM annonce');
   }
/*if(isset($_SESSION['id']))
{
	$log=$_SESSION['id'];
	$req1=$db->query('SELECT idbenevole FROM benevole WHERE mail="'.$log.'"');
	$benev=$req1->fetch();
	$req2=$db->query('SELECT idbesoin FROM benevole_besoin WHERE idbenevole="'.$benev.'"');
	$idann=$req2->fetch();
	$req3=$db->query('SELECT * FROM annonce_besoin WHERE idtype_besoin="'.$idann.'"');
	while($data=$req3->fetch())
	{
		echo ''.$data.'';
	}
}*/
?>