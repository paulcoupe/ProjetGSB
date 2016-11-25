<?php
include("vues/v_sommaire.php");

$idVisiteur = $_SESSION['idVisiteur'];
$mois = getMois(date("d/m/Y"));
$numAnnee =substr( $mois,0,4);
$numMois =substr( $mois,4,2);
$action = $_REQUEST['action'];

//En fonction de la variable $action, on effectue l'un des cas suivants
switch($action){
    
        //Si la variable est égale à 'saisiFrais', on vérifie si c'est le premier frais du mois, et si oui, on crée une nouvelle ligne de frais
	case 'saisirFrais':{
            if($pdo->estPremierFraisMois($idVisiteur,$mois)){
                $pdo->creeNouvellesLignesFrais($idVisiteur,$mois);
            }
            break;
	}
        
        //Si la variable est égale à 'validerMajFraisForfait', on exécute ce cas
	case 'validerMajFraisForfait':{
		$lesFrais = $_REQUEST['lesFrais'];
                //Si les frais sont valides, on met à jour les frais
		if(lesQteFraisValides($lesFrais)){
	  	 	$pdo->majFraisForfait($idVisiteur,$mois,$lesFrais);
		}
                //Sinon, on ajoute une erreur et on appelle la vue 'v_erreurs.php'
		else{
			ajouterErreur("Les valeurs des frais doivent �tre num�riques");
			include("vues/v_erreurs.php");
		}
	  break;
	}
        
        //Si la variable est égale à 'validerCreationFrais', on recueille les informations du frais
	case 'validerCreationFrais':{
		$dateFrais = $_REQUEST['dateFrais'];
		$libelle = $_REQUEST['libelle'];
		$montant = $_REQUEST['montant'];
		valideInfosFrais($dateFrais,$libelle,$montant);
                //Si le nombre d'erreur est différent de zéro, on appelle la vue 'v_erreurs.php'
		if (nbErreurs() != 0 ){
			include("vues/v_erreurs.php");
		}
                //Sinon, on crée un nouveau frais hors forfait
		else{
			$pdo->creeNouveauFraisHorsForfait($idVisiteur,$mois,$libelle,$dateFrais,$montant);
		}
		break;
	}
        
        //Si la variable est égale à 'supprimerFrais', on supprime le frais
	case 'supprimerFrais':{
		$idFrais = $_REQUEST['idFrais'];
                $pdo->supprimerFraisHorsForfait($idFrais);
		break;
	}
}

$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur,$mois);
$lesFraisForfait= $pdo->getLesFraisForfait($idVisiteur,$mois);
$lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur,$mois);

include("vues/v_listeFraisForfait.php");
include("vues/v_listeFraisHorsForfait.php");
?>