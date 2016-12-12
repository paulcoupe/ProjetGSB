<?php

require_once("include/fct.inc.php");
require_once ("include/class.pdogsb.inc.php");

//On démarre la session
session_start();

$pdo = PdoGsb::getPdoGsb();
$estConnecte = estConnecte();

//On teste si la variable $_REQUEST['uc'] est initialisé ou si l'utilisateur est déjà connecté
if(!isset($_REQUEST['uc']) || !$estConnecte){
     $_REQUEST['uc'] = 'connexion';
}

$uc = $_REQUEST['uc'];

//En fonction de la variable $uc, on exécute l'un des cas suivants
if($pdo->get_maintenance() === FALSE){
        switch($uc){  
        
        //Si la variable est égale à 'connexion', on appelle le contrôleur 'c_connexion.php'
	case 'connexion':{
		include("controleurs/c_connexion.php");break;
            }           
        //Si la variable est égale à 'gererFrais', on appelle le contrôleur 'c_gererFrais.php'
	case 'gererFrais' :{
		include("controleurs/c_gererFrais.php");break;
            }   
        //Si la variable est égale à 'etatFrais', on appelle le contrôleur 'c_etatFrais.php'
	case 'etatFrais' :{
		include("controleurs/c_etatFrais.php");break; 
            }
        case 'modifierFraisForfait' : {
                include("controleurs/c_modifierFraisForfait.php");break;
            }
	}
}

else {
    echo "<h1> Ce site est en cours de maintenance. </h1>
        
Ce site a été désactivé car il est en cours de maintenance, il sera rétabli dans les meilleurs délais. 
Nous nous excusons pour le désagrément encouru et vous prions de bien vouloir revenir nous voir un peu plus tard.
Merci de votre compréhension. »  
";
}
?>







