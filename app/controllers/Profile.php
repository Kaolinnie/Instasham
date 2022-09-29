<?php
    namespace app\controllers;

    class Profile extends \app\core\Controller {
        public function index($profile_id) {
            $profile = new \app\models\Profile();
            $profile = $profile->getProfile($profile_id);
            $publications = new \app\models\Publication();
            $publications = $publications->getAll($profile->profile_id);
            $followers = $profile->getFollowers();
            $following = $profile->getFollowing();
            $this->view('Main/profile',['profile'=>$profile,'publications'=>$publications,'followers'=>$followers,'following'=>$following]);
        }
    }