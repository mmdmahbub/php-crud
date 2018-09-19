<?php
	//Add template parts

	//Database connection and other queries

	class database{

		//Declare some variable
		private $connection, $_query, $_data, $_count;
		public  $success, $failed;

		// Connect to database
		private function connect(){
			return $this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		}

		// Disconnect the database
		private function disconnect(){
			if($this->connect()){
				mysqli_close($this->connection);
				return true;
			}
			return false;
		}

		// Run A Query
		public function query($qri_string){
			if($this->connect()){
				$this->_query = mysqli_query($this->connection,$qri_string);
				$this->disconnect();
				if(!$this->_query){
					return false;
				}else{
					return $this->_query;
				}
			}
			return false;
		}

		// Fetch data from database
		public function fetch(){
			if($this-> _query){
				return mysqli_fetch_array($this->_query);
			}
			return false;
		}

		public function loggedUser(){
	 		   if(isset($_SESSION['focus_user'])){
				$user_data_qri   = $this->query("SELECT * FROM focus_users WHERE focus_user_id='".$_SESSION['focus_user']."'");
				$res = $this->fetch($user_data_qri);
				echo $user_id =  $res['focus_user_id'];
			}
		}




	}


	class Validation {

		public function specialChar($sString){
			htmlentities($sString,ENT_QUOTES);
		}

		public function validEmail($email){
			if(!preg_match('/^[a-z0-9\_\.\]+@[a-z0-9]+.[a-z]{2,10}$/i',$email)){
				return true;
			}else{
				return false;
			}
			
		}
		public function validMobile($mobile){
			if(!preg_match('/^[0-9-+]+$/i',$mobile)){
				return true;
			}else{
				return false;
			}
			
		}
		public function trimString($trim){
			trim($trim);
		}

		public function validString($string){
			if(!preg_match("/^[a-zA-Z0-9- ]+$/",$string)){
					return true;
			}else{
				return false;
			}
			
		}
	
		public function emptyString($eString){
			if(empty($eString)){
				return true;
			}else{
				return false;
			}
			
		}
		public function validPassword($pass){
			if(strlen($pass) < 8){
				return true;
			}else{
				return false;
			}
			
		}


   }






?>
