<?php

class User
{



	static public function getAllclient()
    {
        $stmt = DB::connect()->prepare("SELECT * FROM client");
        $stmt->execute();
        return $stmt->fetchAll();
    }     


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




	
	static public function createUser($data)
	{
		$pdo = DB::connect();
	
		$stmt1 = $pdo->prepare('INSERT INTO users (username,email,password,role)
								VALUES (:username,:email,:password,"client")');
		$stmt1->bindParam(':username', $data['username']);
		$stmt1->bindParam(':email', $data['email']);
		$stmt1->bindParam(':password', $data['password']);
		$stmt1->execute();
	
		$id = $pdo->lastInsertId();
	
		$stmt2 = $pdo->prepare('INSERT INTO client (IdCl,username,phone,adresse,ville,email,password)
								VALUES (:IdCl,:username,:phone,:adresse,:ville,:email,:password)');
		$stmt2->bindParam(':IdCl', $id);
		$stmt2->bindParam(':username', $data['username']);
		$stmt2->bindParam(':phone', $data['phone']);
		$stmt2->bindParam(':adresse', $data['adresse']);
		$stmt2->bindParam(':ville', $data['ville']);
		$stmt2->bindParam(':email', $data['email']);
		$stmt2->bindParam(':password', $data['password']);
	
		if ($stmt2->execute()) {
			return 'ok';
		} else {
			$error = $stmt2->errorInfo();
			return "Error inserting into client table: " . $error[2];
		}
	}
	
}
