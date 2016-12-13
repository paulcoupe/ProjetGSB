<?php

//On teste si la variable $_REQUEST['action'] est initialisée 
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'demandeConnexion';
}

$action = $_REQUEST['action'];

//En fonction de la variable $action, on effectue l'un des cas suivants
switch($action){
        case 'oubliMdp':{
            include('vues/v_oubliMdp.php');
            
            break;
        }
        //Si la variable est égale à 'ajotuerVisiteur', on appelle la vue 'v_redirection.php', on récupère les informations demandeés, et on ajouter un visiteur à la base de données
	case 'ajouterVisiteur':{
            include('vues/v_redirection.php');
            $nom = $_REQUEST['nom'];
            $prenom = $_REQUEST['prenom'];
            $login = $_REQUEST['login'];
            $mdp =  $_REQUEST['mdp'];
            $type = $_REQUEST['type'];
            $pdo->ajouterVisiteur($nom, $prenom, $login, $mdp, $type);
            break;
	}

        //Si la variable est égale à 'creerCompte', on appelle la vue 'v_inscription.php'
	case 'creerCompte':{
		include ("vues/v_inscription.php");
		break;
	}
        
        //Si la variable est égale à 'demandeConnexion', on appelle la vue 'v_connexion.php'
	case 'demandeConnexion':{
		include("vues/v_connexion.php");
		break;
	}
        
        //Si la variable est égale à 'valideConnexion', on récupère les informations du visiteur
	case 'valideConnexion':{
		$login = $_REQUEST['login'];
		$mdp = $_REQUEST['mdp'];
                $mdp = sha1($mdp);
		$visiteur = $pdo->getInfosVisiteur($login,$mdp);
                //Si les informations du visiteurs n'ont pas réussies à être initialisées, on ajoute une erreur et on appelle les vues 'v_erreurs.php' et 'v_connexion.php'
		if(!is_array( $visiteur)){
                    ajouterErreur("Login ou mot de passe incorrect");
                    include("vues/v_erreurs.php");
                    include("vues/v_connexion.php");
		}
                //Sinon, on appelle la vue 'v_sommaire.php' et on connecte le visiteur
		else { 
			$id = $visiteur['id'];
			$nom =  $visiteur['nom'];
			$prenom = $visiteur['prenom'];
                        $libelle = $visiteur['libelle'];
			connecter($id,$nom,$prenom,$libelle);
                        include("vues/v_sommaire.php");
                }
		break;	
	}
        
        //Sinon, si aucun cas ne correspond, on appelle la vue 'v_connexion.php'
	default :{
		include("vues/v_connexion.php");
		break;
	}
}
?>