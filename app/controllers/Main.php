<?php
namespace app\controllers;

class Main extends \app\core\Controller{
	public function index($user_id){
        $profile = new \app\models\Profile();
        $profile = $profile->get($user_id);
		$this->view('Main/index',$profile);
	}
	public function createPost() {
		$this->view('Layout/CreatePost');
	}
}