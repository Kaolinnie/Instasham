<?php
namespace app\controllers;

class Main extends \app\core\Controller{

	#[\app\filters\Login]
	public function index(){
        $profile = new \app\models\Profile();
        $profile = $profile->get($_SESSION['user_id']);
		$publications = new \app\models\Publication();
		$publications = $publications->getAllPosts();
		$posts = [];
		foreach($publications AS $post) {
			$comments = new \app\models\Comment();
			$comments = $comments->getAll($post->publication_id);
			$postProfile = $profile->getProfileByPost($post->publication_id);
			$like = new \app\models\Like();
			$like = $like->get($_SESSION["profile_id"],$post->publication_id);
			$like_photo = is_null($like)?"heart_full.png":"heart.png";
			$posts[] = ["publication"=>$post,"profile"=>$postProfile,"comments"=>$comments,"like"=>$like_photo];
		}
		$this->view('Main/index',["id"=>$_SESSION['user_id'],"profile"=>$profile,"publications"=>$posts]);
	}
	#[\app\filters\Login]
	public function createPost() {
		$this->view('Layout/CreatePost');
	}
}