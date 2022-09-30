<?php
    namespace app\controllers;

    class Profile extends \app\core\Controller {
        public function index() {
            $profile = new \app\models\Profile();
            $profile = $profile->get($_SESSION["user_id"]);
            $publications = new \app\models\Publication();
            $publications = $publications->getAll($profile->profile_id);
            $followers = $profile->getFollowers();
            $following = $profile->getFollowing();
            $this->view('Main/profile',['profile'=>$profile,'publications'=>$publications,'followers'=>$followers,'following'=>$following]);
        }
    }