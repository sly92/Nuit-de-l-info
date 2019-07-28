<?php 				
require('connexion.php');
include_once('header.html'); 
include('entete.php');
?>
<div class="row medium-8 large-7 columns">
<h1 style="text-align: center;">Formulaire d'inscription</h1>

<script type="text/javascript">
  
	$(document).ready(function(){
		var ok=true;


    var $nom = $('#nom'),
        $prenom = $('#prenom'),
        $ville = $('#ville'),
		$code = $('#code_postal'),
        $tel = $('#tel'),
        $mail = $('#mail'),
		$pass = $('#pass'),
		$envoi = $('#submit'),
        $erreur = $('#erreur'),
        $champ = $('.champ');


    $champ.keyup(function(){

        if($(this).is('#tel'))
            var s = /^[0-9]{10}$/;
        else if($(this).is('#code_postal'))
            var s = /^[0-9]{5}$/;
        else if($(this).is('#mail'))
            var s = /^([\w\.-]+)@([\w\.-]+)(\.[a-z]{2,4})$/;
        else 
            var s = /^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._-\s]{3,}$/;
        
        if(!$(this).val().match(s)) { // si la chaîne de caractères est inférieure à 5
            $(this).css({ // on rend le champ rouge 
                borderColor : 'red',
                color : 'red'
            });
        
        }
        
        else { 
            $(this).css({ // si tout est bon, on le rend vert
                borderColor : 'green',
                color : 'green'
            });
        }
    });

    $champ.change(function(){

        if($(this).is('#tel'))
            var s= /^[0-9]{10}$/;
        else if($(this).is('#code_postal'))
            var s= /^[0-9]{5}$/;
        else if($(this).is('#mail'))
            var s= /^([\w\.-]+)@([\w\.-]+)(\.[a-z]{2,4})$/;
        else 
            var s= /^[A-Za-z0-9\s]{3,}$/;
        
        if(!$(this).val().match(s)) { // si la chaîne de caractères est inférieure à 5
            $(this).css({ // on rend le champ rouge 
                borderColor : 'red',
                color : 'red'
            });
        
        } else {
            $(this).css({ // si tout est bon, on le rend vert
                borderColor : 'green',
                color : 'green'
            });
        }
    });


    $envoi.click(function(e){

		if(!ok)
            e.preventDefault(); // on annule la fonction par défaut du bouton d'envoi

        // puis on lance la fonction de vérification sur tous les champs :

		if(ok==true){
            console.info(ok);
            verifier($nom);
    		verifier($code);
            verifier($prenom);
            verifier($ville);
            verifier($tel);
            verifier($mail);
    		verifier($pass);
        }
    });



    $reset.click(function(){
        $champ.css({ // on remet le style des champs comme on l'avait défini dans le style CSS
            borderColor : '#ccc',
            color : '#555'
        });
        $erreur.css('display', 'none'); // on prend soin de cacher le message d'erreur
    });


   
    function verifier(champ){
        if(champ.val() == ""){ // si le champ est vide
            $erreur.css('display', 'block'); // on affiche le message d'erreur
            champ.css({ // on rend le champ rouge
                borderColor : 'red',
                color : 'red'
            });
            ok=false;
        }
		ok=true;
    }
});
  
</script>

<?php
if(!(isset($_POST['statut']))){
	?>
<form id="inscription" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" onsubmit="">

			<label>Vous êtes  ? </label>
        <select id="statut" name="statut" class="champ">
					<option value="association">Une association</option>
					<option value="benevole">Un bénévole</option>
      	</select>
		<center><input type="submit" value="Suivant" name="suivant" class="myButton"/></center>
	</div>
	
</form>
<?php } else {?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
	<div>
		<input type="hidden" id="statut" name="statut" value="<?php echo $_POST['statut']; ?>"/>
     	<label for="nom"> Nom  :</label>
			<input type="text" class="champ" name="nom" id="nom" placeholder="Ex : Ali / Association" />
			<div id="nom_verif"></div>
		<?php 	if((isset($_POST['statut'])) && $_POST['statut']=="benevole"){ ?>
      <label for="prenom"> Prénom  :</label>
			<input type="text" class="champ" name="prenom" id="prenom" placeholder="Ex : Boubakar" />
			<div id="prenom_verif"></div>
      <label>Quel type d'aide pouvez-vous fournir ?
        <select id="besoin" name="besoin" class="champ">
					<option value="logement">Logement</option>
					<option value="Nourriture">Nourriture</option>
					<option value="Regularisation">Regularisation</option>
					<option value="Autre">Autre</option>  
      	</select>
      </label>
		<?php } ?>
      <label for="ville"> Ville  :</label>
			<input type="text" class="champ" name="ville" id="ville" placeholder="Ex : Alep " />
			<div id="ville_verif"></div>
      <label for="ville"> Rue  :</label>
			<input type="text" class="champ" name="rue" id="rue"  />
			<div id="ville_verif"></div>
      <label for="ville"> Code postal  :</label>
			<input type="text" class="champ" name="code_postal" id="code_postal"/>
			<div id="ville_verif"></div>
		
        <label for="tel"> N° de Téléphone  :</label>
			<input type="tel" class="champ" name="tel" id="tel" placeholder="Ex : 0642483664" />
			<div id="tel_verif"></div>
			</div>
   		<label for="mail"> Mail  :</label>
			<input type="email" class="champ" name="mail" id="mail" placeholder="Ex : ali.boubakar@hotmail.fr" />
			<div id="mail_verif"></div>	
			<label for="pass">Mot de passe</label>
			<input type="password" class="champ" name="pass" id="pass" />
			<input style="float:right;" type="submit" id="submit" name="submit" value="S'inscrire" class="myButton"/>
			<input style="float:left;" type="reset" id="rafraichir" value="Rafraîchir" class="myButton"/>

	</div>

</form>
	
	<div id="erreur" style="display:none" >
    <p style="color:red;font-size:20px;">Vous n'avez pas rempli correctement les champs du formulaire !</p>
</div>
	
<?php } ?>

<?php 
// var_dump($_POST);

if((isset($_POST['statut'])) && (isset($_POST['nom'])) && (isset($_POST['tel'])) && (isset($_POST['ville'])) && (isset($_POST['rue'])) && (isset($_POST['code_postal'])) && (isset($_POST['mail']) && isset($_POST['pass']))){

      try{		
							$req = $db->prepare("INSERT INTO adresse VALUES ('', :code , :ville, :rue)");
							$req->bindValue(':code', $_POST['code_postal']);
							$req->bindValue(':ville', $_POST['ville']);
							$req->bindValue(':rue', $_POST['rue']);
							$req->execute();
			
							$req=$db->query("SELECT idadresse FROM adresse ORDER BY idadresse DESC LIMIT 1");
							$res= $req->fetch();
							$test = $res[0];
							var_dump($test);
				
				if($_POST['statut']=="association") {
							$req = $db->prepare("INSERT INTO association VALUES ('', :nom, :pass, :tel, :email, :idadresse)");
				} else {
							$req = $db->prepare("INSERT INTO benevole (nom, prenom, mdp, telephone, mail, adresse_idadresse) VALUES (:nom, :prenom, :pass, :tel, :email, :idadresse)");
				}			
				
				if($_POST['statut']=="benevole") {
							$req->bindValue(':prenom', $_POST['prenom']);
				}
				$req->bindValue(':nom', $_POST['nom']);
				$req->bindValue(':pass', $_POST['pass']);
				$req->bindValue(':tel', $_POST['tel']);
				$req->bindValue(':email', $_POST['mail']);
				$req->bindValue(':idadresse', $test);
					
				$req->execute();
				?>
							<script language="JavaScript">
								document.location.href="index.php";
							</script>
				<?php
				}catch(PDOException $e){
							die('Erreur : ' . $e->getMessage() . '</div></body></html>');
				}
	}

include('bas.php');
?>

