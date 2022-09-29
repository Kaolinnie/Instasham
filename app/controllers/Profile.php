<?php
    namespace app\controllers;

    class Profile extends \app\core\Controller {
        public function index($user_id) {
            $user = new \app\models\User();
            $user = $user->get($user_id);
            $profile = new \app\models\Profile();
            $profile = $profile->get($user_id);
            $publications = new \app\models\Publication();
            $publications = $publications->getAll($profile->profile_id);
            $followers = $user->getFollowers();
            $following = $user->getFollowing();
            $this->view('Main/profile',['user'=>$user,'profile'=>$profile,'publications'=>$publications,'followers'=>$followers,'following'=>$following]);
        }
    }