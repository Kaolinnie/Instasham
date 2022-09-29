<?php
    namespace app\models;

    class Like extends \app\core\Model {
        public function getPublication($publication_id){
            $SQL = "SELECT * FROM like WHERE publication_id = :publication_id";
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute(["publication_id"=>$publication_id]);
            $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\models\Like');
            $STMT->fetch();
        }
        public function getProfile($profile_id){
            $SQL = "SELECT * FROM like WHERE profile_id = :profile_id";
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute(["profile_id"=>$profile_id]);
            $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\models\Like');
            $STMT->fetch();
        }

    }