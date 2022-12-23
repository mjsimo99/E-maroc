<?php 

class User{

	// static public function login($data){
	// 	$email = $data['email'];
	// 	$username = $data['username'];

	// 	try{
	// 		$query = 'SELECT * FROM users WHERE email=:email, username=:username';
	// 		$stmt = DB::connect()->prepare($query);
	// 		$stmt->execute(array(":email" => $email , ":username" => $username));
	// 		$user = $stmt->fetch(PDO::FETCH_OBJ);
	// 		die(print_r($user));
	// 		return $user;
	// 	}catch(PDOException $ex){
	// 		echo 'erreur' . $ex->getMessage();
	// 	}
	// }


	static public function login($data){
		$email = $data['email'];
		$username = $data['username'];
	
		try{
			$query = 'SELECT * FROM users WHERE email=:email OR username=:username';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":email" => $email , ":username" => $username));
			$user = $stmt->fetch(PDO::FETCH_OBJ);
			// die(print_r($user));
			return $user;
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}
	



	static public function createUser($data){
		$stmt = DB::connect()->prepare('INSERT INTO users (username,email,password,role)
			VALUES (:username,:email,:password,"user")');
		$stmt->bindParam(':username',$data['username']);
		$stmt->bindParam(':email',$data['email']);
		$stmt->bindParam(':password',$data['password']);

		if($stmt->execute()){
			return 'ok';
		}else{
			return 'error';
		}
		$stmt->close();
		$stmt = null;
	}

}

 ?>