<?php
namespace app\controllers;

class Main extends \app\core\Controller{

	public function index(){
		header('location:/User/index');
		//$this->view('User/index');
	}
	public function createPost() {
		$this->view('Layout/CreatePost');
	}
	public function register(){
		$this->view('User/register');
	}
}