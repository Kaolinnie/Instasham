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
        
        public function getUserIdByUsername($username) {
            $SQL = "SELECT user_id FROM user WHERE username LIKE :username";
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute(['username'=>$username]);
            return $STMT->fetch()['user_id'];
        }
        
        public function getByUsername($username) {
            $SQL = "SELECT * FROM user WHERE username = :username";
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute(['username'=>$username]);
            $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\models\User');
            return $STMT->fetch();
        }
        public function getProfile($user_id) {
            $SQL = "SELECT * FROM profile WHERE user_id = :user_id";
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute(['user_id'=>$user_id]);
            $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\models\Profile');
            return $STMT->fetch();
        }
        public function getProfileId($user_id) {
            $SQL = "SELECT profile_id FROM profile WHERE user_id LIKE :user_id";
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute(['user_id'=>$user_id]);
            return $STMT->fetch()['profile_id'];
        }

        public function insert(){
            $SQL = "INSERT INTO user(username, password_hash) VALUES (:username, :password_hash )";
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute(['username'=>$this->username,
                            'password_hash'=>$this->password_hash]);
        }

        // Method to use when a user decided to changer her/his password
        public function updatePassword(){
            $SQL = "UPDATE user SET password_hash=:password_hash WHERE user_id=:user_id";
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute(['password_hash'=>$this->password_hash,
                            'user_id'=>$this->user_id]);
        }

     
    }