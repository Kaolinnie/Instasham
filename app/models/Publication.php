<?php
    namespace app\models;

    class Publication extends \app\core\Model {
        public function get($publication_id) {
            $SQL = "SELECT * FROM publication WHERE publication_id = :publication_id";
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute(['publication_id'=>$publication_id]);
            $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\models\Publication');
            return $STMT->fetch();
        }
        public function getProfileId() {
            $SQL = "SELECT profile_id FROM publication WHERE publication_id = :publication_id";
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute(['publication_id'=>$this->publication_id]);
            return $STMT->fetch();
        }
        public function getAll($profile_id) {
            $SQL = "SELECT * FROM publication WHERE profile_id = :profile_id";
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute(['profile_id'=>$profile_id]);
            $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\models\Publication');
            return $STMT->fetchAll();
        }
        public function getAllPosts() {
            $SQL = "SELECT * FROM publication
                    ORDER BY date_time DESC
                    LIMIT 15";
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute();
            $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\models\Publication');
            return $STMT->fetchAll();
        }
        public function remove()
        {
            $SQL = "DELETE FROM `publication` WHERE publication_id = :publication_id";
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute(["publication_id" => $this->publication_id]);
        }
        public function insert(){
            $SQL = "INSERT INTO `publication` (profile_id,picture,caption,date_time) VALUES (:profile_id,:picture,:caption,:date_time)";
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute(["profile_id"=>$this->profile_id, "picture"=>$this->picture,"caption"=>$this->caption,"date_time"=>$this->date_time]);
        }
    }