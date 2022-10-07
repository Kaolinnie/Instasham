<?php

namespace app\models;

class Like extends \app\core\Model
{
    public function get($profile_id,$publication_id)
    {
        $SQL = "SELECT * FROM `like` WHERE profile_id = :profile_id AND publication_id = :publication_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(["profile_id" => $profile_id,"publication_id"=>$publication_id]);
        return $STMT->fetch();
    }
    public function insert($profile_id, $publication_id)
    {
        $SQL = "INSERT INTO `like` VALUES (:publication_id,:profile_id)";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(["profile_id" => $profile_id, "publication_id" => $publication_id]);
    }
    public function remove($profile_id, $publication_id)
    {
        $SQL = "DELETE FROM `like` WHERE profile_id = :profile_id AND publication_id = :publication_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(["profile_id" => $profile_id, "publication_id" => $publication_id]);
    }
    
    public function getPublication($publication_id)
    {
        $SQL = "SELECT * FROM `like` WHERE publication_id = :publication_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(["publication_id" => $publication_id]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Like');
        return $STMT->fetchAll();
    }
    public function getProfile($profile_id)
    {
        $SQL = "SELECT * FROM `like` WHERE profile_id = :profile_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(["profile_id" => $profile_id]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Like');
        return $STMT->fetchAll();
    }


}
