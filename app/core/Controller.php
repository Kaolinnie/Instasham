<?php
namespace app\core;

class Controller{
//TODO: add a parameter for data later
	public function view($name, $data = []){
		include('app/views/' . $name . '.php');
	}

	public function saveProfilePicture($file){
		$check = getimagesize($file['tmp_name']);
		$allowed_types = ['image/png'=>'png', 'image/jpeg'=>'jpg'];
		if(in_array($check['mime'], array_keys($allowed_types))){
			$ext = $allowed_types[$check['mime']];
			$filename = uniqid() . "." . $ext;
			move_uploaded_file($file['tmp_name'], 'images/profiles/' . $filename);
		}
		return $filename;
	}
	public function savePublicationPicture($file){
		$check = getimagesize($file['tmp_name']);
		$allowed_types = ['image/png'=>'png', 'image/jpeg'=>'jpg'];
		if(in_array($check['mime'], array_keys($allowed_types))){
			$ext = $allowed_types[$check['mime']];
			$filename = uniqid() . "." . $ext;
			move_uploaded_file($file['tmp_name'], 'images/publications/' . $filename);
		}
		return $filename;
	}
}
