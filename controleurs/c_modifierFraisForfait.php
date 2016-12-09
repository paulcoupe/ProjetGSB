<?php
include("vues/v_sommaire.php");

$idVisiteur = $_SESSION['idVisiteur'];
$action = $_REQUEST['action'];


switch($action){  
           
        case 'creationFraisForfait':{
            $id = strtoupper($_REQUEST['idFrais']);
            $libelle = $_REQUEST['libelle'];
            $montant = $_REQUEST['montant'];
            
            valideInfosFraisForfait($id,$libelle,$montant);
                
		if (nbErreurs() != 0 ){
			include("vues/v_erreurs.php");
		}
                
		else{
                    $pdo->createFraisForfait($id,$libelle,$montant);
		}
            break;
	}
        
        case 'afficheModification':{
            
            $id = $_REQUEST['id'];
            
            $fraisAModif = $pdo->getUnFrais($id);
            include("vues/v_crudModifFraisForfait.php");
            
            break;
        }
        
        case 'modifierFraisForfait':{
                
            $oldId = $_REQUEST['oldId'];
            $id = $_REQUEST['idFrais'];
            $libelle = $_REQUEST['libelle'];
            $montant = $_REQUEST['montant'];
            
            valideInfosFraisForfait($id,$libelle,$montant);
            		if (nbErreurs() != 0 ){
			include("vues/v_erreurs.php");
		}
                else{
            
                $pdo->updateFraisForfait($oldId,$id,$libelle,$montant);}
            
            break;
        }
        
        case 'supprimerFraisForfait':{
            $idSupprimer = $_REQUEST['idSupprimer'];
            $pdo->deleteFraisForfait($idSupprimer);    
                        break;
	}
        
                case'default':{


        }
       
            $lesFraisForfait=$pdo->getFraisForfait();
            include("vues/v_crudFraisForfait.php");
            include("vues/v_crudCreerFraisForfait.php");


}
