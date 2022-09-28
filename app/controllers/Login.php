<?php
namespace app\controllers;

class Login extends \app\core\Controller{
	public function login(){
		$this->view('Login/login');
	}

	public function register(){
		$this->view('Login/register');
	}

	public function verifyUser(){
		// looks for POST 'loginSubmit' request
		if (isset($_POST['loginSubmit'])){
			// create a User object
			$currentUser = new \app\models\User();
			$username = $_POST['username'];
			// TODO: hash the password to match the one store in the DB
			$password = $_POST['password'];
			// This will return false if no row is found
			if($currentUser->getUserByUsername($username)){
				if($currentUser->getUserPasswordByPassword($password)){
					// redirect to the profile page
				} else {
					// TODO: Display invalid password
					
				}
			}
			else{
				// TODO: Display User does not exists
			}
		}
	}

}