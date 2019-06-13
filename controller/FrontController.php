<?php

require_once('model/RestaurantManager.php');
require_once('model/CommentManager.php');

class FrontController extends BaseController {
    public function showRestaurants()
    {   
        $restaurantManager = new RestaurantManager();
        $requete = $restaurantManager->getRestaurantInfos();
        $restaurants = $requete->fetchAll();
        return $this->json($restaurants);
    }

    public function showComments()
    {   
        $commentManager = new CommentManager();
        $requete = $commentManager->getComments();
        $comments = $requete->fetchAll();
        return $comments;
    }
}