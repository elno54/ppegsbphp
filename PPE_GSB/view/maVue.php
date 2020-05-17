
<?php
class maVue {
	
	public function header() {
		echo '<head>';
		echo '<link href="page.css" rel="stylesheet" type="text/css"/>';
		echo '<meta name="viewport" content="width=device-width, user-scalable=no">';

		echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">';
		echo '<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>';
		echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>';
		echo '<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>';
		echo '</head><body>';
		echo '<header id="promo">
				<div>
					<img src="Images/FR-WEB-voucher-v5.png">
				</div>
			</header>';
		echo'<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<a class="navbar-brand" href="#">Menu</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="http://172.19.0.10/PPE_GSB/index.php">Home </a>
						</li>';
						if(isset($_SESSION['pseudo'])){
							echo '
								<li class="nav-item">
									<a class="nav-link" href="http://172.19.0.10/PPE_GSB/index.php?action=commandes">Mes commandes</a>
								</li>';
						}
						echo'
						<li class="nav-item">
							<a class="nav-link " href="http://172.19.0.10/PPE_GSB/index.php?action=panier">Produits</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="http://172.19.0.10/PPE_GSB/index.php?action=consulterPanier">Panier</a>
						</li>';
						if(!isset($_SESSION['pseudo'])){
							echo '
							<li class="nav-item">
								<a class="nav-link " href="http://172.19.0.10/PPE_GSB/index.php?action=user">Inscription</a>
							</li>
							';
						}
						if(!isset($_SESSION['pseudo'])){
							echo '
							<li class="nav-item">
								<a class="nav-link " href="http://172.19.0.10/PPE_GSB/index.php?action=connexion">Connexion</a>
							</li>
							';
						}
						if(isset($_SESSION['pseudo'])){
							echo '
							<li class="nav-item">
								<a class="nav-link " href="http://172.19.0.10/PPE_GSB/index.php?action=profil">Profil</a>
							</li>
							';
						}
						if(isset($_SESSION['pseudo'])){
							echo '
							<li class="nav-item">
								<a class="nav-link " href="http://172.19.0.10/PPE_GSB/index.php?action=deconnecter">Deconnexion</a>
							</li>
							';
						}
						echo '
					</ul>
				</div>
			</nav>';
	}


	public function footer() {
		echo "<script type='text/javascript' src='page.js'></script>";
		echo "</body>";
	}

	public function accueil() {
		$this->header();

		echo "<p class='acceuil'><b><center>Galaxy Swiss Bourdin</center></b></p>";
		echo "<p><center> Galaxy swiss bourdin vous permet d'ajouter des médicaments prescrits sans ordonnances, vous les livrer dans une pharmacie près de chez vous !</center></p>";
		echo '<center><iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d673724.4046667239!2d4.900406091209635!3d48.729636803362574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1spharmacies!5e0!3m2!1sfr!2sfr!4v1574171763759!5m2!1sfr!2sfr" width="800" height="600" frameborder="0" style="border:0;" allowfullscreen=""></iframe></center>';
		
		$this->footer();
	}

	public function commandes($data) {
		$this->header();

		echo '<form method="post">';
		echo '<input name ="voircommande" type="submit" value="Voir ses commandes">';
		echo '<table class="table">';
		echo '<thead class="thead-dark">';
		echo '<tr>';
		echo '<th scope="col">Date</th>';
		//echo '<th scope="col">Consommateur concerné</th>';
		echo '<th scope="col">Pharmacie concernée</th>';
		echo '</tr>';
		echo '</thead>';

		if(isset($_POST["voircommande"])){
			foreach($data as $uneData) {
				echo '<tbody>';
				echo '<tr>';
				echo "<th>".$uneData["date_commande"]."</th>";
				//echo "<th>".$uneData["id_consommateur"]."</th>";
				echo "<th>".$uneData["id_pharmacie"]."</th>";
				echo '</tr>';
				echo '</tbody>';
			}
		echo '</form>';
		}
		$this->footer();
    }
	public function user($data)
	{
		$this->header();
		echo '<center>';
		echo '<form method="POST" action="">';
		echo '<div class="jumbotron">';
		echo '<h1>Créer un compte</h1>';
		echo 	'<div class="pseudo">';
		echo 		'<p class="txt">Pseudo</p>';
		echo 		'<input type="text" name="pseudo" value="" class="inscription-text">';
		echo 	'</div>';
		echo 	'<div class="nom">';
		echo 		'<p class="txt">Nom</p>';
		echo 		'<input type="text" name="nom" value="" class="inscription-text">';
		echo 	'</div>';
		echo 	'<div class="prenom">';
		echo 		'<p class="txt">Prénom</p>';
		echo 		'<input type="text" name="prenom" value="" class="inscription-text">';
		echo 	'</div>';
		echo 	'<div class="tel">';
		echo 		'<p class="txt">Téléphone</p>';
		echo 		'<input type="text" name="tel" value="" class="inscription-text">';
		echo 	'</div>';
		echo 	'<div class="password">';
		echo 		'<p class="txt">Mot de passe</p>';
		echo 		'<input type="password" name="mdp" value="" class="inscription-text">';
		echo 	'</div>';
		echo 	'<div class="password">';
		echo 		'<p class="txt">Retaper votre mot de passe</p>';
		echo 		'<input type="password" name="mdp1" value="" class="inscription-text">';
		echo 	'</div>';
		echo 	'<div class="mail">';
		echo 		'<p class="txt">Email</p>';
		echo 		'<input type="text" name="mail" value="" class="inscription-text">';
		echo 	'</div>';
		echo 	'<div class="ville">';
		echo 		'<p class="txt">Ville</p>';
		echo 		'<input type="text" name="ville" value="" class="inscription-text">';
		echo 	'</div>';
		echo 	'<div class="cp">';
		echo 		'<p class="txt">Code postal</p>';
		echo 		'<input type="text" name="cp" value="" class="inscription-text">';
		echo 	'</div>';
		echo 	'<div class="adresse">';
		echo 		'<p class="txt">Adresse</p>';
		echo 		'<input type="text" name="adresse" value="" class="inscription-text">';
		echo 	'</div>';
		echo	'<br>';
		echo 	'<div class="bouton-inscription">';	
		echo 	'<input type="submit" class="btn btn-success" name="bouton" value="Validez l`inscrption" >';
		echo 	'</div>';
		echo '</div>';
		echo '</form>';
		echo '</center>';
		$this->footer();
	}
	
	public function connexion($obj = null) {
		$this->header();

		if($obj === false){
			echo "<h4>Erreur d'authentification</h4>";
		}


		echo 	'<center>';
		echo 	'<form method="POST" action=""';
		echo 	'<div class="user">';
		echo 		'<p>Nom utilisateur</p>';
		echo 		'<input type="text" name="pseudo" value="">';
		echo 	'</div>';
		echo 	'<div class="password">';
		echo 		'<p>Entrez votre mot de passe</p>';
		echo 		'<input type="password" name="mdp" value="">';
		echo 	'</div>';
		echo 	'<br />';
		echo 	'<div class="bouton-connexion">';
		echo 		'<input type="submit" name="bouton2" value="Se connecter">';
		$this->footer();
	}
	public function voirPanier($data) 
	{
		$this->header();
		echo '<form method="POST" action=""';
		echo "<br>";
		echo '<div class="containeur-fluid">';
		echo '<div class="containeur">';
		echo '<div class="row">';
		foreach ($data as $unProduit)
		{
			echo '<article class="col-xs-12 col-sm-12 col-md-4 col-lg-4" class="lesArticles">';
			echo '<center>';
			echo '<img src="./Images/'.$unProduit["photo_produit"].'" height="250"/>';
			echo "prix : ".$unProduit['prix_produit']."€";
			echo "<br>";
			echo $unProduit['desc_produit'];
			echo "<br>";
			echo "<input type='number' id='".$unProduit["id_produit"]."' min='0'/>";
			echo "<span>";
			echo "<input type='button' name='valider' class='ajout' idArticle='".$unProduit["id_produit"]."' value='Acheter'/>";
			echo "<br><br>";
			echo '</center>';
			echo "</article>";
		}
		echo '</div></div></div>';
		
		$this->footer();
	}
	
	public function panier($data)
	{
		$this->header();
		
		
		foreach($data as $uneDonnee) {
				echo '<tbody>';
				echo '<tr>';
				echo "<th><img src='./Images/".$uneDonnee["photo_produit"]."' height='250'/></th>";
				echo "  ";
				echo "<th>".$uneDonnee["prix_produit"]."</th>";
				echo "  ";
				echo '</tr>';
				echo '</tbody>';
		
	}
	echo "<input type='submit' value='Acheter' name='ach'/>";
	}
	
	public function profil($data){
		$this->header();
		echo '<center>';
		echo '<form method="POST" action="index.php?action=getprofil">';
		echo '<div class="jumbotron">';
		echo '<h1>Modifier ses informations</h1>';
		echo 	'<div class="nom">';
		echo 		'<p class="txt">Nom</p>';
		echo 		'<input type="text" name="nom" value="'.$data['nom_consommateur'].'" class="inscription-text">';
		echo 	'</div>';
		echo 	'<div class="prenom">';
		echo 		'<p class="txt">Prénom</p>';
		echo 		'<input type="text" name="prenom" value="'.$data['prenom_consommateur'].'" class="inscription-text">';
		echo 	'</div>';
		echo 	'<div class="tel">';
		echo 		'<p class="txt">Téléphone</p>';
		echo 		'<input type="text" name="tel" value="'.$data['tel_consommateur'].'" class="inscription-text">';
		echo 	'</div>';
		echo 	'<div class="password">';
		echo 		'<p class="txt">Mot de passe</p>';
		echo 		'<input type="password" name="mdp" value="'.$data['mdp_consommateur'].'" class="inscription-text">';
		echo 	'</div>';

		echo 	'<div class="mail">';
		echo 		'<p class="txt">Email</p>';
		echo 		'<input type="text" name="mail" value="'.$data['email_consommateur'].'" class="inscription-text">';
		echo 	'</div>';
		echo 	'<div class="ville">';
		echo 		'<p class="txt">Ville</p>';
		echo 		'<input type="text" name="ville" value="'.$data['ville_consommateur'].'" class="inscription-text">';
		echo 	'</div>';
		echo 	'<div class="cp">';
		echo 		'<p class="txt">Code postal</p>';
		echo 		'<input type="text" name="cp" value="'.$data['cp_consommateur'].'" class="inscription-text">';
		echo 	'</div>';
		echo 	'<div class="adresse">';
		echo 		'<p class="txt">Adresse</p>';
		echo 		'<input type="text" name="adresse" value="'.$data['adresse_consommateur'].'" class="inscription-text">';
		echo 	'</div>';
		echo	'<br>';
		echo 	'<div class="bouton-inscription">';	
		echo 	'<input type="submit" class="btn btn-success" name="bouton" value="Validez les modifications" >';
		echo 	'</div>';
		echo '</div>';
		echo '</form>';
		echo '</center>';
		$this->footer();
	}
	public function erreur404() {
		$this->header();
		echo "<p>404 : Not Found</p>";
		$this->footer();
	}
	public function deconnecter(){
		$this->header();
		$this->footer();
		
	}
	
}


