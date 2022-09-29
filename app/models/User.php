<?php
    namespace app\models;

    class User extends \app\core\Model {
        public function getUserByUsername($username) {
            $SQL = "SELECT * FROM user WHERE username = :username";
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute(['username'=>$username]);
            $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\models\User');
            return $STMT->fetch();
        }

        public function getUserPasswordByPassword($password){
            $SQL = "SELECT * FROM user WHERE password_hash = :password";
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute(['password'=>$password]);
            $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\models\User');
            return $STMT->fetch();
        }
        public function getUserPasswordByID($id){
      
            $SQL = "SELECT * FROM user WHERE user_id = :id";
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute(['id'=>$id]);
            $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\models\User');
            return $STMT->fetch();
        }

        public function getAllUsers(){
            $SQL = "SELECT * FROM user";
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute();
            $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\User');
            return $STMT->fetchAll();
        }

        public function insert(){
            $SQL = "INSERT INTO user(username, password_hash) VALUES (:user_id, :username, :password_hash )";
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute(['username'=>$this->username,
                            'password_hash'=>$this->password_hash]);
        }

     
    }