<?php

class BaseController { // à faire étendre sur les autres controllers
    function json($resultats) {
        header('Content-Type: application/json');
        $retour = [];
        $retour["results"]["nb"] = count($resultats);
        $retour["results"]["restaurants"] = $resultats;
        echo json_encode($retour);
    
    }
}