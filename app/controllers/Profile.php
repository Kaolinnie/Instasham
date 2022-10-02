<?php
    namespace app\controllers;

    class Profile extends \app\core\Controller {
        public function viewProfile($profile_id,$publicationFocus = 0) {
            $profile = new \app\models\Profile();
            $profile = $profile->get($profile_id);
            $userProfile = $profile->get($_SESSION["profile_id"]);
            $publications = new \app\models\Publication();
            $publications = $publications->getAll($profile->profile_id);
            $posts = [];
            $followers = $profile->getFollowers();
            $following = $profile->getFollowing();

            if(isset($_POST['action']) && $_POST['writeComment']!==""){
                $comment = new \app\models\Comment();
                $comment->publication_id = $_POST['publication_id'];
                $comment->profile_id = $_SESSION["profile_id"];
                $comment->comment = $_POST['writeComment'];
                date_default_timezone_set('Canada/Eastern');
                $comment->date_time = date("Y-m-d H:i:s");
                $comment->insert();
                header('location:/Profile/viewProfile/'.$profile_id.'/'.$comment->publication_id);
            } else {
                foreach($publications AS $post) {
                    $comments = new \app\models\Comment();
                    $comments = $comments->getAll($post->publication_id);
                    $like = new \app\models\Like();
                    $like = $like->get($_SESSION["profile_id"],$post->publication_id);
                    $like_photo = $like>0?"heart_full.png":"heart.png";
                    $posts[] = ["publication"=>$post,"profile"=>$profile,"comments"=>$comments,"like"=>$like_photo];
                }
                $this->view('Main/profile',['userProfile'=>$userProfile,'profile'=>$profile,"posts"=>$posts,'followers'=>$followers,'following'=>$following,"publicationFocus"=>$publicationFocus]);
            }
        }

        public function removeComment($comment_id) {
            $comment = new \app\models\Comment();
            $comment = $comment->get($comment_id);
            $publication = new \app\models\Publication();
            $publication = $publication->get($comment->publication_id);
            if($comment->profile_id==$_SESSION['profile_id']) {
                $comment->remove();
                header('location:/Profile/viewProfile/'.$publication->profile_id.'/'.$publication->publication_id);
            }
        }
        public function like($publication_id) {
            $profile_id = intval($_SESSION["profile_id"]);
            $like = new \app\models\Like();
            $likeCheck = $like->get($profile_id,$publication_id);
            $publication = new \app\models\Publication();
            $publication = $publication->get($publication_id);

            if($likeCheck>0) {
                $like->remove($profile_id,$publication_id);
            } else {
                $like->insert($profile_id,$publication_id);
            }

            header('location:/Profile/viewProfile/'.$publication->profile_id.'/'.$publication_id);
        }
        public function deletePublication($publication_id) {
            $publication = new \app\models\Publication();
            $publication = $publication->get($publication_id);
            $publication->remove();
            header('location:/Profile/viewProfile/'.$publication->profile_id.'/-1');
        }
        public function follow($profile_id_following) {
            $profile_id = intval($_SESSION["profile_id"]);
            $following = new \app\models\Following();
            $followCount = $following->get($profile_id,$profile_id_following);

            if($followCount>0) {
                $following->remove($profile_id,intval($profile_id_following));
            } else {
                $following->insert($profile_id,intval($profile_id_following));
            }

            header('location:/Profile/viewProfile/'.$profile_id_following.'/-1');
        }
        public function editProfile() {
            $profile = new \app\models\Profile();
            $profile = $profile->get($_SESSION["profile_id"]);
            $this->view('/Main/editProfile',$profile);
        }
    }