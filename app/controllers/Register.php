<?php
namespace app\Controller;

class Register extends \app\core\Controller{

    public function registerNewUser(){
        if(isset($_POST['registerSubmit'])){
            $newUser = new \app\models\User();
            $username = $_POST['username'];
            $password = $_POST['password'];
            $passwordVerify = $_POST['passwordVerify'];
            $isExist = $newUser->getUserByUsername($username);

            if( $password ===  $passwordVerify && !$isExist) {
                // TODO: HASH THE PASSWORD BEFORE STORING INTO THE DB
                $newUser->username = $username;
                $hashPass = $this->hashPassword($passwordVerify);
                $newUser->password = $hashPass;
                $newUser->insert();
                // Redirect to the create profile
                //header('location/Profile/profile');
            }else{
                // TODO: Display an error message, user already exists!
            }

        }
    }

}