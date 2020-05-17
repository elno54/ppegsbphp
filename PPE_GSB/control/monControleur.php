<?php
class monControleur {	
	public function accueil() {
		(new maVue)->accueil();
	}
	
	public function commandes() {
		$obj = (new maTable)->getAllCommandes();
		(new maVue)->commandes($obj);
	}
	public function user() {
		$obj = (new maTable)->setUser();
		(new maVue)->user($obj);
	}
	public function connexion() {
		if(isset($_POST["bouton2"]))
		{
			$obj = (new maTable)->seConnecter();
			if($obj === false) {
				(new maVue)->connexion($obj);
			}
			else {
				(new maVue)->accueil();
			}
		}
		else {
			(new maVue)->connexion();
		}
	}	
	public function voirPanier() {
		$obj = (new maTable)->panier();
		(new maVue)->voirPanier($obj);
	}
	public function panier() {
		$obj = (new maTable)->lepanier();
		(new maVue)->panier($obj);
	}	
		public function profil() {
		$obj = (new maTable)->modifierProfil();
		(new maVue)->profil($obj);
	}
	public function getprofil() {
		$obj = (new maTable)->getAllConsommateur();
		(new maVue)->profil($obj);
	}
	public function deconnecter(){
		unset($_SESSION["pseudo"]);
		session_destroy();
		$this->accueil();
	}
	public function cookie() {
		$tab = substr($_COOKIE["panier"], 0, -1);
		$obj = (new maTable)->getCookie($tab);
		(new maVue)->panier($obj);
	}
}