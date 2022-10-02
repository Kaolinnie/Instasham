<?php
namespace app\controllers;

class User extends \app\core\Controller {

    
    public function index(){
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
				header('location:/User/login?error=Incorrect username/password combination!');
			}
		}else{
			$this->view('User/index');
		}
	}
    public function register(){
		if(isset($_POST['registerSubmit'])){
            if ($_POST['username'] != '' ||$_POST['password'] != '' ){
                if($_POST['password'] == $_POST['passwordVerify']){
                    $user = new \app\models\User();
                    if($user->getUserByUsername($_POST['username'])){
                        header('location:/User/register?error=The username "'.$_POST['username'].'" already exists. Please try another one');
                    }else{
                        $user->username = $_POST['username'];
                        $user->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                        $user->insert();
                        // Populate the Profile table
                        // create a profile object
                        $user_id = $user->getUserIdByUsername($user->username);
                        $display_name = $_POST['display_name'];
                        $first_name = $_POST['first_name'];
                        $middle_name = $_POST['middle_name'];
                        $last_name = $_POST['last_name'];
                        $profile_pic = $_FILES['profile_pic'];
                        // store the photo in app/images
                        $filename = $this->saveFile($profile_pic);
                        // debugging
                        //$array = [  $user_id, $display_name,  $first_name, $middle_name, $last_name, $profile_pic];
                        //var_dump($array );

                        // then call the profile insert method

                        // Redirect it back to the login
                        header('location:/User/index');
                    }
                }else {
                    header('location:/User/register?error=Password mismatched');
                }
            }
            else {
                header('location:/User/register?error=Please fill in all the field');
            }
        } else{
            //show the registration form
            $this->view('User/register');
        }
		
    }

}