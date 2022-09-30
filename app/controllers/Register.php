<?php
namespace app\controllers;

class Register extends \app\core\Controller{

    public function register(){
		if(isset($_POST['registerSubmit'])){
            if ($_POST['username'] != '' ||$_POST['password'] != '' ){
                if($_POST['password'] == $_POST['passwordVerify']){
                    $user = new \app\models\User();
                    if($user->getUserByUsername($_POST['username'])){
                        header('location:/Register/register?error=The username "'.$_POST['username'].'" already exists. Please try another one');
                    }else{
                        $user->username = $_POST['username'];
                        $user->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                        $user->insert();
                        header('location:/Login/login');
                    }
                }else {
                    header('location:/Register/register?error=Password mismatched');
                }
            }
            else {
                header('location:/Register/register?error=Please fill in all the field');
            }
        } else{
            //show the registration form
            $this->view('Login/register');
        }
		
    }

}