<?php
    namespace app\controllers;

    class Comment extends \app\core\Controller {
        #[\app\filters\Login]
        public function showComments($publication_id) {
            $comments = new \app\models\Comment();
            $comments = $comments->getAll($publication_id);
            if(sizeof($comments)>0){
                foreach($comments AS $comment) {
                    $commentProfile = $comment->getProfile();
                    $this->view('Layout/Comment',['comment'=>$comment,'commentProfile'=>$commentProfile]);
                }
            }
        }

        #[\app\filters\Login]
        public function writeComment($publication_id) {
            $comment = new \app\models\Comment();
            $comment->publication_id = $publication_id;
            $comment->profile_id = $_SESSION['profile_id'];
            $comment->comment = $this->validate_input($_POST['comment']);
            date_default_timezone_set('Canada/Eastern');
            $comment->date_time = date("Y-m-d H:i:s");
            $comment->insert();
            $profile = new \app\models\Profile();
            $profile = $profile->getProfile($comment->profile_id);
        }

        #[\app\filters\Login]
        public function deleteComment($comment_id) {
            $comment = new \app\models\Comment();
            $comment = $comment->get($comment_id);
            if($comment->profile_id==$_SESSION['profile_id']) {
                $comment->remove();
            }
        }

        #[\app\filters\Login]
        public function editComment($comment_id) {
            $comment = new \app\models\Comment();
            $comment = $comment->get($comment_id);
            $comment->comment = $this->validate_input($_POST['comment']);
            $comment->update();
        }
    }