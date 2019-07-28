<?php
require('entete.php');
require('header.html');
if(!isset($_SESSION['id'])) {
	if(isset($_POST['submit'])) {
		if (isset($_POST['login']) && isset($_POST['pass'])){
					$login = $_POST['login'];
					$mdp = $_POST['pass'];

					$req = $db->query('SELECT * FROM association WHERE mail="'.$login.'"');
					$res = $req->fetch();

					if(!empty($res)) {
						$req = $db->query('SELECT mdp FROM association WHERE nom="'.$res['nom'].'"');
						$res2 = $req->fetch();
						if($mdp == $res2['mdp']) {
							$_SESSION['id'] = $res['idassociation'];
					?>
						<script language="JavaScript">
							document.location.href="index.php";
						</script>
					<?php
						} else {
							$erreur = "Mot de passe incorrect";
						} 
					} else {
						$erreur = "Adresse incorrecte";
					}

			} else {
				$erreur = "Identifiants incorrects";						
			} 
	}
				
        ?>

<form id="authentification" action="authentification.php" method='post'>
<div class="row medium-8 large-7 columns">
	<?php
		if(isset($erreur)) {
			echo '<p style="color: red; border: 1px solid red; width: 100%; text-align: center; padding: 5px;">'.$erreur.'</p>';
		}
	?>
	<center><h3>Connexion</h3></center>
        <label for="nom">Adresse mail :</label>
        <input type="text" name="login" maxlength="60" >
      <label for="courriel">Mot de passe :</label>
        <input type="password" name="pass" maxlength="20"><br>
				<center><input type="submit" name="submit" value="Connectez-vous" class="myButton"></center>
</div>
</form>

<?php
} else {
	echo 'Vous êtes déjà connecté';
?>
<script language="JavaScript">
	document.location.href="index.php";
</script>
<?php
}
include('bas.php');
?>
