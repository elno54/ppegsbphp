<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Chargement des fichiers MVC
require("control/monControleur.php");
require("view/maVue.php");
require("model/maTable.php");
session_start();
// Routes
if(isset($_GET["action"])) {
	switch($_GET["action"]) {
		case "accueil":
			(new monControleur)->accueil();
			break;
		case "commandes":
			(new monControleur)->commandes();
			break;
		case "user":
			(new monControleur)->user();
			break;
		case "connexion":
			(new monControleur)->connexion();
			break;
		case "panier":
			(new monControleur)->voirPanier();
			break;
		case "consulterPanier":
			(new monControleur)->cookie();
			break;
		case "getprofil":
			(new monControleur)->profil();
			break;
		case "profil":
			(new monControleur)->getprofil();
			break;
		case "deconnecter":
			(new monControleur)->deconnecter();
			break;
		// Route par défaut : erreur 404
		default:
			(new maVue)->erreur404();
			break;
	}
}
else 
{
	// Pas d'action précisée = afficher l'accueil
	(new monControleur)->accueil();
}