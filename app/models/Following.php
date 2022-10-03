<?php

namespace app\models;

class Following extends \app\core\Model
{
    public function get($profile_id,$profile_id_following)
    {
        $SQL = "SELECT * FROM `following` WHERE profile_id = :profile_id AND profile_id_following = :profile_id_following";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(["profile_id" => $profile_id,"profile_id_following"=>$profile_id_following]);
        $STMT->setFetchMode(\PDO::FETCH_NUM);
        return $STMT->fetch();
    }
    public function insert($profile_id, $profile_id_following)
    {
        $SQL = "INSERT INTO `following` VALUES (:profile_id,:profile_id_following)";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(["profile_id" => $profile_id, "profile_id_following" => $profile_id_following]);
    }
    public function remove($profile_id, $profile_id_following)
    {
        $SQL = "DELETE FROM `following` WHERE profile_id = :profile_id AND profile_id_following = :profile_id_following";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(["profile_id" => $profile_id, "profile_id_following" => $profile_id_following]);
    }
}