<?php

require_once("model/Manager.php");

class RestaurantManager extends Manager
{
    public function getRestaurantInfos()
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM restaurants');
        $req->execute();
        return $req;
    }
}
