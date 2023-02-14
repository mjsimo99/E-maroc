<?php

class User
{

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


	static public function loginadmin($data)
	{
		$email = $data['email'];
		$username = $data['username'];
		$role = $data['role'];

		try {
			$query = 'SELECT * FROM users WHERE email=:email OR username=:username AND role=:role';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":email" => $email, ":username" => $username, ":role" => $role));
			$user = $stmt->fetch(PDO::FETCH_OBJ);
			// die(print_r($user));
			return $user;
		} catch (PDOException $ex) {
			echo 'erreur' . $ex->getMessage();
		}
	}




	// static public function createUser($data){
	// 	$stmt = DB::connect()->prepare('INSERT INTO users (username,email,password,role)
	// 		VALUES (:username,:email,:password,"user")');
	// 	$stmt->bindParam(':username',$data['username']);
	// 	$stmt->bindParam(':email',$data['email']);
	// 	$stmt->bindParam(':password',$data['password']);

	// 	if($stmt->execute()){
	// 		return 'ok';
	// 	}else{
	// 		return 'error';
	// 	}
	// 	$stmt = null;
	// }
	static public function createUser($data)
	{
		$stmt1 = DB::connect()->prepare('INSERT INTO client (username,phone,adresse,ville,email,password)
		VALUES (:username,:phone,:adresse,:ville,:email,:password)');

		$stmt1->bindParam(':username', $data['username']);
		$stmt1->bindParam(':phone', $data['phone']);
		$stmt1->bindParam(':adresse', $data['adresse']);
		$stmt1->bindParam(':ville', $data['ville']);
		$stmt1->bindParam(':email', $data['email']);
		$stmt1->bindParam(':password', $data['password']);

		$stmt2 = DB::connect()->prepare('INSERT INTO users (username,email,password,role)
			VALUES (:username,:email,:password,"client")');
		$stmt2->bindParam(':username', $data['username']);
		$stmt2->bindParam(':email', $data['email']);
		$stmt2->bindParam(':password', $data['password']);

		if ($stmt1->execute() && $stmt2->execute()) {
			return 'ok';
		} else {
			$error = $stmt1->errorInfo();
			return "Error inserting into client table: " . $error[2];
		}
		
	
	}
}
