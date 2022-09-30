<?php
namespace app\controllers;

class Main extends \app\core\Controller{
	public function index(){
        $profile = new \app\models\Profile();
        $profile = $profile->get($_SESSION["user_id"]);
		$this->view('Main/index',$profile);
	}
	public function createPost() {
		$this->view('Layout/CreatePost');
	}
}