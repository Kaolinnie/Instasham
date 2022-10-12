<?php
namespace app\controllers;

class User extends \app\core\Controller {

    public function index(){
		if (isset($_POST['loginSubmit'])){
			//create a User object
			$currentUser = new \app\models\User();
			$currentUsernameInput = $this->validate_input($_POST['username']);
            $passwordInput = $this->validate_input($_POST['password']);
			$currentUser = $currentUser->getByUsername($currentUsernameInput);
            if (!$currentUser){
                $this->view('User/index', 'User does not exist!');
                return;
            }
			if(password_verify($passwordInput , $currentUser->password_hash)){
				//correct password provided
				$_SESSION['username'] = $currentUser->username;
				$_SESSION['user_id'] = $currentUser->user_id;
				$_SESSION['profile_id'] = $currentUser->getProfileId($currentUser->user_id);
				header("location:/Main/index");
			}else{
				//incorrect password provided
                $this->view('User/index', 'Incorrect password combination!');
			}
		}else{
			$this->view('User/index');
		}
	}

    public function logout(){
		session_destroy();
		header('location:/User/index');
	}

    public function register(){
		if(isset($_POST['registerSubmit'])){
            if( !empty($_POST['password']) && $_POST['password'] === $_POST['passwordVerify']){
                $user = new \app\models\User();
                if($user->getByUsername($_POST['username'])){
                    $errormsg = ['userExist'=>'The username "'.$_POST['username'].'" already exists. Please try another one'];
                    $this->view('User/register', $errormsg);
                }else{
                    $user->username = $this->validate_input($_POST['username']);
                    $pass = $this->validate_input($_POST['password']);
                    $user->password_hash = password_hash($pass, PASSWORD_DEFAULT);
                    $user->insert();
                    $user_id = $user->getUserIdByUsername($user->username);

                    //create the profile of the user
                    $display_name = $user->username;
                    $first_name = "";
                    $middle_name = "";
                    $last_name = "";
                    $description = "";
                    $filename = "anonymous.png";

                    $profile = new \app\models\Profile();
                    $profile->user_id = $user_id;
                    $profile->display_name = $display_name;
                    $profile->first_name = $first_name;
                    $profile->middle_name = $middle_name;
                    $profile->last_name = $last_name;
                    $profile->profile_pic = $filename;
                    $profile->description = $description;
                    $profile->insert();

                    // Redirect it back to the login
                    header('location:/User/index');
                }
            }else {
                $errormsg = ['passwordVerify'=>'Password does not match!'];
                $this->view('User/register',  $errormsg);
                return;
            }
            
        // if no post is submitted
        } else{
            //show the registration form
            $this->view('User/register');
        }
		
    }

}