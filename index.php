<?php
		include('connexion.php');
?>
    <!-- Start Top Bar -->
   	 <?php
		include("entete.php");
		?>
    <!-- End Top Bar -->
		<div class="row medium-8 large-7 columns">
					
  <?php
		include("recherche.php");
	?>
		</div>
		<div class="row medium-8 large-7 columns">
	<?php
		include("redirection.php");
		while($donnees = $req->fetch()) {
		$req2 = $db->query("SELECT nom FROM association WHERE idassociation=".$donnees['auteur']);
		$res2 = $req2->fetch();
	?>
		
			<div class="blog-post">
				<h3><?php echo $donnees['titre']; ?> <small><?php echo $donnees['heure']; ?></small></h3>
				<p><?php echo $donnees['contenu']; ?></p>
				<div class="callout">
					<ul class="menu simple">
						<span>Auteur : <?php echo $res2[0]; ?></span><span style="float: right;"><a href="contact_asso.php?auteur=<?php echo $res2[0]; ?>">Contacter</a></span>
					</ul>
				</div>
			</div><hr>
			<?php
		}
	?>
		</div>
		<input type="hidden" id="sess_var" value="<?php if(isset($_SESSION['id'])) echo $_SESSION['id']; ?>"/>
		
	<?php
		include('bas.php');
	?>    