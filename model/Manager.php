<?php
class Manager
{
    // DB Params
    private $host = 'db5000087924.hosting-data.io';
    private $db_name = 'dbs82621';
    private $username = 'dbu284192';
    private $password = '+83HT[m2xk';

    protected function dbConnect()
    {
        $db_options = array(
            // gestion des caractères accentués
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            // choix de récupération des données (assoc / numérique)
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            // pour afficher toutes les erreurs, à commenter en production
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        );

        $db = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name . ';charset=utf8', $this->username , $this->password, $db_options);
            
        return $db;
    }
}
