<?php
    namespace app\models;

    class Comment extends \app\core\Model {
        public function getAll($publication_id){
            $SQL = "SELECT * FROM comment WHERE publication_id = :publication_id";
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute(['publication_id'=>$publication_id]);
            $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\models\Comment');
            return $STMT->fetchAll();
        }
        public function get($comment_id){
            $SQL = "SELECT * FROM comment WHERE comment_id = :comment_id";
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute(['comment_id'=>$comment_id]);
            $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\models\Comment');
            return $STMT->fetch();
        }
        
        public function getProfile() {
            $SQL = "SELECT u.username,p.profile_pic,p.profile_id FROM user u
                    JOIN profile p ON u.user_id=p.user_id
                    WHERE p.profile_id = :profile_id";
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute(['profile_id'=>$this->profile_id]);
            $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\models\Profile');
            return $STMT->fetch();
        }
        public function insert() {
            $SQL = "INSERT INTO comment(publication_id, profile_id, comment, date_time) VALUES (:publication_id, :profile_id, :comment, :date_time)";
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute(['publication_id'=>$this->publication_id,'profile_id'=>$this->profile_id,'comment'=>$this->comment,"date_time"=>$this->date_time]);
        }
        public function remove() {
            $SQL = "DELETE FROM comment WHERE comment_id = :comment_id";
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute(['comment_id'=>$this->comment_id]);
        }
        public function update() {
            $SQL = "UPDATE comment SET comment = :comment WHERE comment_id = :comment_id";
            $STMT = self::$_connection->prepare($SQL);
            $STMT->execute(['comment'=>$this->comment,'comment_id'=>$this->comment_id]);
        }
    }