<?php
namespace app\controllers;

class Main extends \app\core\Controller{
	public function index(){
        $profile = new \app\models\Profile();
        $profile = $profile->get($_SESSION["user_id"]);
		$publications = new \app\models\Publication();
		$publications = $publications->getAllPosts();

		$this->view('Main/index',["profile"=>$profile,"publications"=>$publications]);
	}
	public function createPost() {
		$this->view('Layout/CreatePost');
	}
}