<?php
    namespace app\controllers;

    class Publication extends \app\core\Controller {
	    
        #[\app\filters\Login]
        public function viewPost($publication_id) {
            $profile_id = $_SESSION["profile_id"];
            $publication = new \app\models\Publication();
            $publication = $publication->get($publication_id);
            $profile = new \app\models\Profile();
            $profile = $profile->getProfileByPost($publication_id);
            $comments = new \app\models\Comment();
            $comments = $comments->getAll($publication_id);
            $like = new \app\models\Like();
            $like = $like->get($profile_id,$publication_id);
            $like_photo = $like>0?"heart_full.png":"heart.png";
            
            $this->view('Layout/Publication',["post"=>$publication,"profile"=>$profile,"comments"=>$comments,"like"=>$like_photo]);
        }
        
	    #[\app\filters\Login]
        public function likePost($publication_id) {
            $profile_id = $_SESSION["profile_id"];
            $like = new \app\models\Like();
            $count = $like->get($profile_id,$publication_id);
            if($count) {
                $like->remove($profile_id,$publication_id);
                echo "<img src='/app/resources/images/heart.png' alt='' />";
            } else {
                $like->insert($profile_id,$publication_id);
                echo "<img src='/app/resources/images/heart_full.png' alt='' />";
            }
        }
	    
        #[\app\filters\Login]
        public function isLiked($publication_id) {
            $profile_id = $_SESSION["profile_id"];
            $like = new \app\models\Like();
            $count = $like->get($profile_id,$publication_id);
            if($count) {
                echo "<img src='/app/resources/images/heart_full.png' alt='' />";
            } else {
                echo "<img src='/app/resources/images/heart.png' alt='' />";
            }
        }

        #[\app\filters\Login]
        public function createPost(){
            $this->view('Layout/CreatePost');
        }

        #[\app\filters\Login]
        public function publishPost(){
            $caption = $this->validate_input($_POST['caption']);
            date_default_timezone_set('Canada/Eastern');
            $date_time = date("Y-m-d H:i:s");
            $profileId = $_SESSION['profile_id'];
            $file = $_FILES['file'];
            $filename = $this->savePublicationPicture($file);

            $publication = new \app\models\Publication();
            $publication->caption = $caption;
            $publication->date_time = $date_time;
            $publication->profile_id = $profileId;
            $publication->picture = $filename;

            $publication->insert();
        }

        #[\app\filters\Login]
        public function updateCaption($publication_id) {
            $post = new \app\models\Publication();
            $post = $post->get($publication_id);
            $post->caption = $this->validate_input($_POST['caption']);
            $post->updateCaption();
            echo $publication_id;
        }
    }