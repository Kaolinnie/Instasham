<?php
namespace app\controllers;

class Login extends \app\core\Controller{
	public function index(){
		$this->view('Login/login');
	}
    public function validate() {
        
    }
}