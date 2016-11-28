<?php
include("vues/v_sommaire.php");

$action = $_REQUEST['action'];
$idVisiteur = $_SESSION['idVisiteur'];

//En fonction de la variable $action, on effectue l'un des cas suivants
switch($action){
        
        //Si la variable est égale à 'selectionnerMois', on appelle la vue 'v_listeMois.php'
	case 'selectionnerMois':{

		$lesMois=$pdo->getLesMoisDisponibles($idVisiteur);
		// Afin de sélectionner par défaut le dernier mois dans la zone de liste
		// on demande toutes les clés, et on prend la première,
		// les mois étant triés décroissants
		$lesCles = array_keys( $lesMois );
		$moisASelectionner = $lesCles[0];
                include("vues/v_listeMois.php");
		break;
	}
        
        //Si la variable est égale à 'voirEtatFrais', on appelle les vues 'v_listeMois.php' et 'v_etatFrais.php'
	case 'voirEtatFrais':{
            	include("vues/v_listeMois.php");
                include("vues/v_etatFrais.php");
		$leMois = $_REQUEST['lstMois']; 
		$lesMois=$pdo->getLesMoisDisponibles($idVisiteur);
		$moisASelectionner = $leMois;
		$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur,$leMois);
		$lesFraisForfait= $pdo->getLesFraisForfait($idVisiteur,$leMois);
		$lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur,$leMois);
		$numAnnee =substr( $leMois,0,4);
		$numMois =substr( $leMois,4,2);
		$libEtat = $lesInfosFicheFrais['libEtat'];
		$montantValide = $lesInfosFicheFrais['montantValide'];
		$nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
		$dateModif =  $lesInfosFicheFrais['dateModif'];
		$dateModif =  dateAnglaisVersFrancais($dateModif);
	}
}
?>