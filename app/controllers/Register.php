<?php
namespace app\Controller;

class Register extends \app\core\Controller{

    public function registerNewUser(){
        if(isset($_POST['registerSubmit'])){
            echo "register";
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
                // Redirect back to login
                header('location/Login/login');
            }else{
                // TODO: Display an error message, user already exists!
            }

        }
    }

}