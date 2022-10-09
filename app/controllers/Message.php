<?php
    namespace app\controllers;

    class Message extends \app\core\Controller {
        public function messages() {
            $this->view('Main/messages');
        }


    }