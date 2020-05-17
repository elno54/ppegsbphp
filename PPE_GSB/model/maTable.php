<?php

class maTable {
	
	// Objet PDO servant à la connexion à la base
	private $pdo;

	// Connexion à la base de données
	public function __construct() {
		$config = parse_ini_file("config.ini");
		
		try {
			$this->pdo = new \PDO("mysql:host=".$config["host"].";dbname=".$config["database"], $config["user"], $config["password"]);
		} catch(Exception $e) {
			echo $e->getMessage();
		}
	}

	public function getAllCommandes() 
	{
		$requete = " SELECT * FROM commande";
		$request = $this->pdo->prepare($requete);
		$request->execute();
		
		return $request->fetchAll();
	}
	public function setUser() {
		if(isset($_POST["bouton"]))
		{
			$req = "SELECT count(*) as nb FROM consommateur WHERE pseudo_consommateur = '".$_POST['pseudo']."' ";
			$request = $this->pdo->query($req);
			$nombre = $request->fetch();
			if($nombre["nb"] == 0)
			{
				echo $req;
				if($_POST["mdp"] == $_POST["mdp1"]){
					$requete ="INSERT INTO consommateur(pseudo_consommateur,nom_consommateur, prenom_consommateur, tel_consommateur, mdp_consommateur, email_consommateur, ville_consommateur, cp_consommateur, adresse_consommateur) VALUES ('".$_POST['pseudo']."','".$_POST['nom']."','".$_POST['prenom']."','".$_POST['tel']."','".$_POST['mdp']."','".$_POST['mail']."'
					,'".$_POST['ville']."','".$_POST['cp']."','".$_POST['adresse']."')";
					$request = $this->pdo->prepare($requete);
					$request->execute();
					
				}
				else{
					echo "erreur mot de passe";
				}
			}
			else{
				echo "Pseudo deja utilisé";
			}
		}
	}

	public function seConnecter() {
		$requete = "select count(*) as nombre from consommateur where pseudo_consommateur='".$_POST['pseudo']."' and  mdp_consommateur='".$_POST['mdp']."' ";
		$request = $this->pdo->query($requete);
		$nombre = $request->fetch();
		if ($nombre['nombre'] == 1) 
		{		
			$_SESSION["pseudo"] = $_POST["pseudo"];
			return true;	
		}
		else
		{
			return false;
		}
	}
	
	public function panier()
	{
			$requete = "select * from produit ";
			$request = $this->pdo->query($requete);
			$request->execute();
			return $request->fetchAll();
	}
	
	public function lepanier()
	{
			$requete = "select * from produit ";
			$request = $this->pdo->query($requete);
			$request->execute();
			return $request->fetchAll();
	}
	
		public function getAllConsommateur()
	{
		
		$requete = " SELECT * FROM consommateur WHERE pseudo_consommateur = '".$_SESSION['pseudo']."'";
		$request = $this->pdo->prepare($requete);
		$request->execute();
		
		return $request->fetch();
	}
	
	public function modifierProfil()
	{
		
		$req = "UPDATE consommateur SET nom_consommateur = :nom, prenom_consommateur = :prenom, tel_consommateur = :tel, mdp_consommateur = :mdp, 
		email_consommateur = :mail, ville_consommateur = :ville, cp_consommateur = :cp, adresse_consommateur = :adresse WHERE pseudo_consommateur = '".$_SESSION['pseudo']."' ";
					$request = $this->pdo->prepare($req);
				
					$request->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
					$request->bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR);
					$request->bindParam(':tel', $_POST['tel'], PDO::PARAM_STR);
					$request->bindParam(':mdp', $_POST['mdp'], PDO::PARAM_STR);
					$request->bindParam(':mail', $_POST['mail'], PDO::PARAM_STR);
					$request->bindParam(':ville', $_POST['ville'], PDO::PARAM_STR);
					$request->bindParam(':cp', $_POST['cp'], PDO::PARAM_STR);
					$request->bindParam(':adresse', $_POST['adresse'], PDO::PARAM_STR);
					$request->execute();
					$request = $request->fetch();
					
		
	}
	
	public function getCookie($tab){
		
		$req="SELECT * FROM produit WHERE id_produit IN (".$tab.")";
		$request = $this->pdo->prepare($req);
		$request->execute();
		//echo  $req;
		//exit();
		return $request->fetchAll();
		
}

}