<?php
    namespace app\models;

    class User extends \app\core\Model {
        public function get($user_id) {
            $SQL = "SELECT * FROM user WHERE user_id = :user_id";
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute(['user_id'=>$user_id]);
            $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\models\User');
            return $STMT->fetch();
        }
        public function getByUsername($username) {
            $SQL = "SELECT * FROM user WHERE username = :username";
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute(['username'=>$username]);
            $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\models\User');
            return $STMT->fetch();
        }
        public function getFollowers() {
            $SQL = "SELECT * FROM following WHERE user_id_following = :user_id";
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute(['user_id'=>$this->user_id]);
            $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\models\User');
            return $STMT->fetchAll();
        }
        public function getFollowing() {
            $SQL = "SELECT * FROM following WHERE user_id = :user_id";
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute(['user_id'=>$this->user_id]);
            $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\models\User');
            return $STMT->fetchAll();
        }
    }