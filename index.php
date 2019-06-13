<?php
require_once('controller/FrontController.php');

//autoloader composer pour éviter les requires / ajouter les spacenames

try {
    $name = 'FrontController' ;
    $frontendController = new $name();
    if(isset( $_GET['action'] )) {
        switch( $_GET['action'] ) {
            //call_user_func_array([controller, nom methode (getAction())], null (car showrestaurant n'a pas de param)) pour faire appel 
            //permet de suppr switch
            case 'getRestaurants' :
                $resultats = $frontendController->showRestaurants();
            

            case 'getComment' : 
                // $resultats =$frontendController->showComment();
                // $retour["results"]["nb"] = count($resultats);
                // $retour["results"]["comments"] = $resultats;
                // echo json_encode($retour);
                // break;

            default : 
                console.log('Sorry,' . $_GET['action'] . 'is not recognized.');
        }
    }

    $retour["success"] = true; // a mettre dans le base controller
    $retour["message"] = "Connexion à la base de données réussie";
     
} catch (Exception $e) {
    $retour["success"] = false;
    $retour["message"] = "Connexion à la base de données impossible";
}

//router: identifie composant d'une route, vérifie url, génère objet requête
//dispatcher: identifie controller, instancie le controller, et lui passe les params
//conteneur de dépendance: permet de ne plus créer soi me^me les objets mais reçus directement

