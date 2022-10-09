<?php
namespace app\controllers;

class Main extends \app\core\Controller{

	#[\app\filters\Login]
	public function index(){
        $profile = new \app\models\Profile();
        $profile = $profile->get($_SESSION['user_id']);
		$profiles = new \app\models\Profile();
		$profiles = $profiles->getAll($profile->profile_id);
		$publications = new \app\models\Publication();
		$publications = $publications->getAllFollowingPosts();
		$posts = [];
		foreach($publications AS $post) {
			$postProfile = $profile->getProfileByPost($post->publication_id);
			$posts[] = ["publication"=>$post,"profile"=>$postProfile];
		}
		$this->view('Main/index',["id"=>$_SESSION['user_id'],"profile"=>$profile,"publications"=>$posts,"profiles"=>$profiles]);
	}

	#[\app\filters\Login]
	public function createPost() {
		$this->view('Layout/CreatePost');
	}

	#[\app\filters\Login]
	public function explore() {
		$publications = new \app\models\Publication();
		$publications = $publications->getAllPosts();
		$this->view('Main/explore',$publications);
	}
}