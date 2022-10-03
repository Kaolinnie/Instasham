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
                $this->view('User/index', 'user does not exists!');
                return;
            }
			if(password_verify($passwordInput , $currentUser->password_hash)){
				//correct password provided
				$_SESSION['username'] = $currentUser->username;
				$_SESSION['user_id'] = $currentUser->user_id;
				$_SESSION['profile_id'] = $currentUser->getProfileId($currentUser->user_id);
				echo "login success";
				$this->view('/Main/index');
			}else{
				//incorrect password provided
                $this->view('/User/index', 'Incorrect password combination!');
			}
		}else{
			$this->view('/User/index');
		}
	}
    public function register(){
		if(isset($_POST['registerSubmit'])){
            if(empty($_POST['username'])  && empty($_POST['password'])){
                $errormsg = ['username'=>'username is required', 'password'=> 'password is required'];
                $this->view('User/register', $errormsg);
                return;
            }
            if(empty($_POST['username'])){
                $errormsg = ['username'=>'username is required'];
                $this->view('User/register',  $errormsg);
                return;
            }
            if(empty($_POST['password'])){
                $errormsg = ['password'=>'password is required'];
                $this->view('User/register',  $errormsg);
                return;
            }
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
                    // Populate the Profile table
                    // Need to create profile object
                    $user_id = $user->getUserIdByUsername($user->username)[0];
                    $display_name = $this->validate_input($_POST['display_name']);
                    $first_name = $this->validate_input($_POST['first_name']);
                    $middle_name = $this->validate_input($_POST['middle_name']);
                    $last_name = $this->validate_input($_POST['last_name']);
                    $description = $this->validate_input($_POST['description']);

                    //debugging 
                    echo $user_id;
                    echo $display_name;
                    echo $first_name;
                    echo $middle_name;
                    echo $last_name;
                    echo $description;
                    // Temporary disabling this function until We have a default image to set
                    // when user decided not to insert pic on account creation.
                    if($_FILES["profile_pic"]['size']==0) {
                        $filename = "anonymous.jpg";
                    } else {
                        $filename = $this->saveProfilePicture($_FILES['profile_pic']);
                    }
                    $profile = new \app\models\Profile();
                    $profile->user_id = $user_id;
                    $profile->display_name = $display_name;
                    $profile->first_name = $first_name;
                    $profile->middle_name = $middle_name;
                    $profile->last_name = $last_name;
                    $profile->profile_pic = $filename;
                    $profile->description = $description;
                    $profile->insert();

                    $profile = $profile->get($user_id);

                    $_SESSION["profile_id"] = $profile->profile_id;

                    // Redirect it back to the login
                    header('location:/User/index');
                }
            }else {
                $errormsg = ['passwordVerify'=>'password did not matched'];
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