<?php
    namespace app\models;

    class Profile extends \app\core\Model {
        public function get($user_id) {
            $SQL = "SELECT * FROM profile WHERE user_id = :user_id";
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute(['user_id'=>$user_id]);
            $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\models\Profile');
            return $STMT->fetch();
        }
    }