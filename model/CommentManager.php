<?php

require_once("model/Manager.php");

class CommentManager extends Manager
{
    public function getComments()
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM comments');
        $req->execute();
        return $req;
    }
}