<?php
include('connexion.php');
include("entete.php");
?>
</br>
<div class="row medium-8 large-7 columns">
  <form style="margin-left:5%" method="post" action="#"/>
    <input type="hidden" value="<?php echo $_SESSION['id']; ?>" name="auteur"/>
    Entrez le titre de l'annonce : <input type="text" name="titre"/> </br>
    Entrez le besoin :<br/> 
    <input type="radio" name="besoins" value='1'/> Logement </br>
    <input type="radio" name="besoins" value='2'/> Nourriture </br>
    <input type="radio" name="besoins" value='3'/> Soin </br>
    <input type="radio" name="besoins" value='4'/> Apprentissage </br> 
    </br>
    Entrez l'adresse :</br>
    Rue<input type="text" name="rue" /> <br>
    Ville<input type="text" name="ville" /></br>
    CP <input type="text" name="cp" /></br> 
    Entrez l'annonce :<br/>
    <textarea name="contenu" rows=5 cols=45></textarea></br>
  <center><input type="submit" name="valider" value="ENVOYER" class="myButton"/></center></br>
  </form>
</div>
  <?php

  if(isset($_POST['valider']) && $_SESSION['id'])
  {
    $auteur=$_POST['auteur'];
    $titre=$_POST['titre'];
    $contenu=$_POST['contenu'];

    $rue=$_POST['rue'];
    $ville=$_POST['ville'];
    $cp=$_POST['cp'];

    $db->query('INSERT INTO adresse VALUES("", "'.$cp.'","'.$ville.'","'.$rue.'")');
    $resultat = $db->query('SELECT idadresse FROM adresse ORDER BY idadresse DESC LIMIT 1');
    $idadresse = $resultat->fetch();

    $db->query('INSERT INTO annonce VALUES("","'.$titre.'","'.$contenu.'","'.$auteur.'", "", "'.$idadresse[0].'")');
    $idtmp = $db->query('SELECT idannonce FROM annonce ORDER BY idannonce DESC LIMIT 1');
    $idannonce = $idtmp->fetch();
    $db->query('INSERT INTO annonce_besoin VALUES("'.$idannonce[0].'","'.$_POST['besoins'].' ")');
?>
<script language="JavaScript">
	document.location.href="index.php";
</script>
<?php
  }
include('bas.php');
?>