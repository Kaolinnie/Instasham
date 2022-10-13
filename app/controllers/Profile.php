<?php
    namespace app\controllers;

    class Profile extends \app\core\Controller {

        #[\app\filters\Login]
	    public function index(){
        $publication = new \app\models\Publication();
        $publication = $publication->getByProfileId($_SESSION['profile_id']);
        unlink("images/publications/$publication->picture");
        $publication->picture;
        $publication->remove();
        header('location:/Main/index');
	}

        #[\app\filters\Login]
        public function viewProfile($profile_id) {
            $profile = new \app\models\Profile();
            $profile = $profile->get($profile_id);
            $userProfile = $profile->get($_SESSION["profile_id"]);
            $comments = $profile->getAllComments();
            $posts = new \app\models\Publication();
            $posts = $posts->getAll($profile->profile_id);
            $followers = $profile->getFollowers();
            $following = $profile->getFollowing();

            $this->view('Main/profile',['userProfile'=>$userProfile,'posts'=>$posts,'profile'=>$profile,'followers'=>$followers,'following'=>$following,'comments'=>$comments]);
            
        }
        
        #[\app\filters\Login]
        public function follow($profile_id_following) {
            $profile_id = intval($_SESSION["profile_id"]);
            $following = new \app\models\Following();
            $followCount = $following->get($profile_id,$profile_id_following);

            if($followCount>0) {
                $following->remove($profile_id,intval($profile_id_following));
            } else {
                $following->insert($profile_id,intval($profile_id_following));
            }

            header('location:/Profile/viewProfile/'.$profile_id_following);
        }

        #[\app\filters\Login]
        public function editProfile() {

            if(isset($_POST['action'])) {
                $profile = new \app\models\Profile();
                $profile = $profile->getProfile($_SESSION["profile_id"]);

                if($_FILES["profile_pic"]['size']!==0) {
                    if($profile->profile_pic!=="anonymous.png"){
                        unlink("images/profiles/$profile->profile_pic");
                    }
                    $profile->profile_pic = $this->saveProfilePicture($_FILES['profile_pic']);
                }
        
                $profile->display_name = $this->validate_input($_POST["display_name"]);
                $profile->first_name = $this->validate_input($_POST["first_name"]);
                $profile->middle_name = $this->validate_input($_POST["middle_name"]);
                $profile->last_name = $this->validate_input($_POST["last_name"]);
                $profile->description = $this->validate_input($_POST["description"]);
                $profile->update();
                header('location:/Profile/viewProfile/'.$profile->profile_id);

            } elseif (isset($_POST['changed_password'])){
                $user = new \app\models\User();
                $user = $user->get($_SESSION['user_id']);
                $old_pass = $this->validate_input($_POST['old_password']);
                $new_pass = $this->validate_input($_POST['password']);
                $confirm_pass = $this->validate_input($_POST['passwordVerify']);
                if(password_verify( $old_pass,$user->password_hash)){
                 if( $new_pass ==  $confirm_pass){
                     $user->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                     $user->updatePassword();
                     header('location:/Profile/editProfile');
 
                 } 
                }else{
                    header('location:/Profile/editProfile?error="false"');
                }
             }
             else {
                $profile = new \app\models\Profile();
                $profile = $profile->get($_SESSION["profile_id"]);
                $this->view('/Main/editProfile',$profile);
            }
        }
    }