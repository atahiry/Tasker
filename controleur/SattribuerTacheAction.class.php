<?php
require_once('./controleur/Action.interface.php');
require_once('./modele/TacheDAO.class.php');
require_once('./modele/classes/Taches.class.php');
require_once('/controleur/RequirePRGAction.interface.php');

class SattribuerTacheAction implements Action, RequirePRGAction {
	

	public function execute(){
		
		$courrielConnected = $_REQUEST["courrielConnected"];
		$numeroProjet = $_REQUEST["numeroProjet"];
		
		
		
		
		if (!ISSET($_SESSION)) session_start();
		if (!ISSET($_SESSION["connected"]))
			return "login";

		$_SESSION['numeroProjet']= $numeroProjet;


		if (ISSET($_REQUEST["numeroTache"]))
		{
			$dao = new TacheDAO();
			$x = new Taches();
			$x->setNumTaches($_REQUEST["numeroTache"]);
			$dao->sattribuer($x,$courrielConnected);
		}
		return "projet";
	}
}
?>

