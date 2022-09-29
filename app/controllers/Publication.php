<?php 
    namespace app\controllers;

    class Publication extends \app\core\Controller {
        public function viewPublication($user_id,$publication_id) {
            if(isset($_POST['postComment'])){
                
            } else {
                $profile = new \app\models\Profile();
                $profile = $profile->get($user_id);
                $publication = new \app\models\Publication();
                $publication = $publication->get($publication_id);
                $comments = new \app\models\Comment();
                $comments = $comments->getAll($publication_id);
                $this->view('Main/publication',['profile'=>$profile,'publication'=>$publication,'comments'=>$comments]);
            }
        }
    }