<?php
namespace app\controllers;

class Login extends \app\core\Controller{

	public function login(){
		// looks for POST 'loginSubmit' request
		if (isset($_POST['loginSubmit'])){
			//create a User object
			$currentUser = new \app\models\User();
			$currentUsername = $_POST['username'];
			$currentUser = $currentUser->getUserByUsername($currentUsername);
			if(password_verify($_POST['password'], $currentUser->password_hash)){
				//correct password provided
				$_SESSION['username'] = $currentUser->username;
				$_SESSION['user_id'] = $currentUser->user_id;
				echo "login success";
				//header('location:/Profile/profile'); // TODO ADD THE CORRECT PROFILE VIEW URL
			}else{
				//incorrect password provided
				header('location:/Login/login?error=Incorrect username/password combination!');
			}
		}else{
			$this->view('Login/login');
		}

	}
}