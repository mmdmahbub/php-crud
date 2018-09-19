<?php
	class validation {
		public function validPassword($pass){
			if(strlen($pass) < 8){
				return true;
			}
			return false;
		}
		public function emptyField($filed){
			if(empty($field)){
				return false;
			}
			return true;
		}

		public function Name($name) {
			if (preg_match('/^[a-z\ \.\-]+$/i', $name)) {
				return true;
			}
			return false;
		}

		public function Email($email) {
			if (preg_match('/^[a-z0-9\_\.\]+@[a-z0-9]+.[a-z]{2,10}$/i', $email)) {
				return true;
			}
			return false;
		}
	}
?>
