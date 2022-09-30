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
        public function getProfile($profile_id) {
            $SQL = "SELECT * FROM profile WHERE profile_id = :profile_id";
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute(['profile_id'=>$profile_id]);
            $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\models\Profile');
            return $STMT->fetch();
        }
        public function getProfileByPost($publication_id) {
            $SQL = "SELECT * FROM profile pr
            JOIN publication pu ON pr.profile_id=pu.profile_id
            WHERE pu.publication_id = :publication_id";
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute(['publication_id'=>$publication_id]);
            $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\models\Profile');
            return $STMT->fetch();
        }
        public function getFollowers() {
            $SQL = "SELECT * FROM following WHERE profile_id_following = :profile_id";
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute(['profile_id'=>$this->profile_id]);
            $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\models\Profile');
            return $STMT->fetchAll();
        }
        public function getFollowing() {
            $SQL = "SELECT * FROM following WHERE profile_id = :profile_id";
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute(['profile_id'=>$this->profile_id]);
            $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\models\Profile');
            return $STMT->fetchAll();
        }
    }