<?php
	require('fonctions.php');
	require('header.html');
	deconnexion();
	?>
		<body>
			<div class="top-bar">
						<div class="top-bar-left" style="width: 100%; text-align: center;">
							<ul class="menu">
								<!-- Class menu-text texte en gras-->
								<!-- POUR RAJOUTER DAUTRE ICONE ALLEZ SUR LE SITE http://glyphicons.com/ -->
								<li><a href="index.php?cat=nourriture"><span class="glyphicon glyphicon-cutlery"></span></a></li>
								<li><a href="index.php?cat=logement"><span class="glyphicon glyphicon-bed"></span></a></li>
								<li><a href="index.php?cat=sante"><span class="glyphicon glyphicon-plus"></span></a></li>
								<li><a href="index.php?cat=apprentissage"><span class="glyphicon glyphicon-education"></span></a></li>
								<?php
									if(!empty($_SESSION['id']))
										 echo '<li><a href="?deconnexion">Déconnexion</a></li>';

									else 
									{
										 echo '<li><a href="inscription.php" style="padding:2.4;">Inscription</a></li>';
										 echo '<li><a href="authentification.php" style="padding:2.4;">Connexion</a></li>';
									}	
								?>
							</ul>
						</div>
			</div>
	<?php 
		if(isset($_SESSION["id"])) {
	?>
			<div class="row medium-8 large-7 columns">
				<a href="deposer_annonce.php" style="float:left;">Poster une annonce</a><a href="index.php" class="glyphicon glyphicon-home" style="float: right;"></a>
			</div>
	<?php
		} else {
	?>
			<div class="row medium-8 large-7 columns">
				<span>Invité</span><a href="index.php" class="glyphicon glyphicon-home" style="float: right;"></a>
			</div>	
<?php
		}
	?>