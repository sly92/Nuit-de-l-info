<?php require('connexion.php');
include('entete.php');
$auteur = $_GET['auteur'];

$req = $db->prepare("SELECT mail FROM association WHERE nom = :auteur");
$req->bindValue(":auteur",$auteur);
$req->execute();
$res= $req->fetch();

$destinataire=$res[0];

if(isset($_SESSION['id'])) {
  $id_expediteur = $_SESSION['id'];
  $req2 = $db->query("SELECT nom FROM association WHERE idassociation=".$id_expediteur);
  $res2 = $req2->fetch();
  $expediteur = $res2[0];
} else 
  $expediteur = 'Invité';

if(isset($_POST['envoyer'])) {
      // Le message
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $headers .= 'To: Mary <'.$expediteur.'>'. "\r\n";
  $headers .= 'From: <'.$expediteur.'>' . "\r\n";

  $message = $_POST['contenu_mail'];

  // Envoi du mail
  if(mail($destinataire, $_POST['titre_mail'], $message, $headers)) {
    $succes = 'Votre message a bien été envoyé ';
  } else { // Non envoyé
    $erreur = "Votre message n'a pas pu être envoyé";
  }
}

?>

<div class="row medium-8 large-7 columns">
<?php
  if(isset($erreur)) echo '<p style="color: red; border: 1px solid red; width: 100%; text-align: center; padding: 5px;">'.$erreur.'</p>';
  if(isset($succes)) {
    echo '<p style="color: green; border: 1px solid green; width: 100%; text-align: center; padding: 5px;">'.$succes.'</p>'; ?>
  <script>
    window.setTimeout("location=('index.php');",2000);
  </script>
<?php  
  }
?>
  <h3>Formulaire de contact - <?php echo $auteur; ?></h3>
  À :
  <input type="text" disabled="disabled" value="<?php echo $destinataire; ?>"/>
  <form action="" method="POST">
    <input type="text" name="titre_mail" placeholder="Titre du mail"/>
    <textarea name="contenu_mail" placeholder="Ecrivez ce que vous souhaitez dire à <?php echo $_GET['auteur']; ?> ici" rows=13></textarea>
    <center><input type="submit" value="Envoyer" name="envoyer" class="myButton"/></center>
  </form>
</div>


<?php
include('bas.php');
?>    