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
        public function getAll($profile_id) {
            $SQL = "SELECT *, (SELECT COUNT(*) FROM `following` WHERE (profile_id=:profile_id AND profile_id_following=p.profile_id)) AS `isFollowing` FROM profile p
                    ORDER BY `isFollowing` DESC;";
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute(['profile_id'=>$profile_id]);
            $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\models\Profile');
            return $STMT->fetchALL();
        }
        public function getAllComments() {
            $SQL = "SELECT * FROM comment WHERE profile_id=:profile_id ORDER BY date_time DESC";
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute(['profile_id'=>$this->profile_id]);
            $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\models\Comment');
            return $STMT->fetchALL();
        }
        public function insert() {
            $SQL = "INSERT INTO profile (profile_id,user_id,display_name,first_name,middle_name,last_name,profile_pic,description) VALUES (:profile_id,:user_id, :display_name,:first_name,:middle_name,:last_name,:profile_pic,:description)";
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute(['profile_id'=>$this->user_id,'user_id'=>$this->user_id, 'display_name'=>$this->display_name,'first_name'=>$this->first_name,'middle_name'=>$this->middle_name,'last_name'=>$this->last_name,'profile_pic'=>$this->profile_pic,'description'=>$this->description]);
        }
        public function update() {
            $SQL = "UPDATE profile
                    SET display_name = :display_name, first_name = :first_name, middle_name = :middle_name, last_name = :last_name, profile_pic = :profile_pic, description = :description
                    WHERE profile_id = :profile_id";
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute(['display_name'=>$this->display_name, 'first_name'=>$this->first_name, 'middle_name'=>$this->middle_name, 'last_name'=>$this->last_name, 'profile_pic'=>$this->profile_pic, 'description'=>$this->description, 'profile_id'=>$this->profile_id]);
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