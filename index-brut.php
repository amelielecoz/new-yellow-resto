<?php
header('Content-Type: application/json');

try {
    $pdo = new PDO('mysql:host=db5000087924.hosting-data.io;dbname=dbs82621;charset=utf8', 'dbu284192', '+83HT[m2xk');
    //$pdo = new PDO('mysql:host=localhost;dbname=yellowresto;charset=utf8', 'root', '');
    $retour["success"] = true;
    $retour["message"] = "Connexion à la base de données réussie";
} catch(Exception $e) {
    $retour["success"] = false;
    $retour["message"] = "Connexion à la base de données impossible";
}

if( !empty($_GET["restaurant"]) ) {
    $requete = $pdo -> prepare("SELECT * FROM restaurants WHERE restaurant_name LIKE :r");
    $requete->bindParam(':r', $_GET["restaurant"]);
    $requete->execute();
} else {
    $requete = $pdo -> prepare("SELECT * FROM restaurants");
    $requete->execute();
}
$resultats = $requete->fetchAll();

$retour["results"]["nb"] = count($resultats);
$retour["results"]["restaurants"] = $resultats;

echo json_encode($retour);