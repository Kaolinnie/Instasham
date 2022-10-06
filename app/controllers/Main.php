<?php
namespace app\controllers;

class Main extends \app\core\Controller{
	public function index(){
		$this->view('Layout/CreatePost');
	}
	public function createPost() {
		$this->view('Layout/CreatePost');
	}
}