<?php
    namespace app\models;

    class User extends \app\core\Model {
        public function get($username) {
            $SQL = "SELECT * FROM user WHERE username = :username";
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute(['username'=>$username]);
            $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\models\User');
            return $STMT->fetch();
        }
    }