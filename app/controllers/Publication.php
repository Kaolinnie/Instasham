<?php 
    namespace app\controllers;

    class Publication extends \app\core\Controller {
        public function viewPublication($publication_id) {
            if(isset($_POST['action']) && $_POST['writeComment']!==""){
                $comment = new \app\models\Comment();
                $comment->publication_id = $publication_id;
                $comment->profile_id = $_SESSION["profile_id"];
                $comment->comment = $_POST['writeComment'];
                date_default_timezone_set('Canada/Eastern');
                $comment->date_time = date("Y-m-d H:i:s");
                $comment->insert();
                header('location:/Publication/viewPublication/'.$publication_id);
            } else {
                $publication = new \app\models\Publication();
                $publication = $publication->get($publication_id);
                $profile = new \app\models\Profile();
                $profile = $profile->getProfileByPost($publication_id);
                $comments = new \app\models\Comment();
                $comments = $comments->getAll($publication_id);

                $this->view('/Main/publication',["profile"=>$profile,"publication"=>$publication,"comments"=>$comments]);
            }
        }
        public function removeComment($comment_id) {
            $comment = new \app\models\Comment();
            $comment = $comment->get($comment_id);
            $publication = new \app\models\Publication();
            $publication = $publication->get($comment->publication_id);
            $profile_id = $publication->getProfileId();
            $comment->remove();
            header('location:/Publication/viewPublication/'.$publication->publication_id);
        }
        public function isLiked($profile_id) {
            
        }
    }