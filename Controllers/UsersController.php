<?php 

class UsersController {



	public function getAllclients()
	{
		$client = User::getAllclient();

		return $client;
	}



	public function auth(){
		if(isset($_POST['submit'])){
			$data['email'] = $_POST['email'];
			$data['username'] = $_POST['username'];
			$result = User::loginadmin($data);
			if($result->email === $_POST['email']  && password_verify($_POST['password'],$result->password)){

				$_SESSION['logged'] = true;
				$_SESSION['email'] = $result->email;
				$_SESSION['username'] = $result->username;
				$_SESSION['id']=$result->id;
				$_SESSION['role'] = $result->role;
				// die(print_r($_SESSION));

				Redirect::to('index');

			}else{
				Session::set('error','Pseudo ou mot de passe est incorrect');
				Redirect::to('login');
			}
		}
	}


	// public function register(){
	// 	if(isset($_POST['submit'])){
	// 		$options = [
	// 			'cost' => 12
	// 		];
	// 		$password = password_hash($_POST['password'],PASSWORD_BCRYPT,$options);
	// 		$data = array(
	// 			'username' => $_POST['username'],
	// 			'email' => $_POST['email'],
	// 			'password' => $password,
	// 		);
	// 		$result = User::createUser($data);
	// 		if($result === 'ok'){
	// 			Session::set('success','Compte crée');
	// 			Redirect::to('login');
	// 		}else{
	// 			echo $result;
	// 		}
	// 	}
	// }
	public function register(){
		if(isset($_POST['submit'])){
			$options = [
				'cost' => 12
			];
			$password = password_hash($_POST['password'],PASSWORD_BCRYPT,$options);
			$data = array(
				'username' => $_POST['username'],
				'email' => $_POST['email'],
				'password' => $password,
			);
			$data = array(
				'username' => $_POST['username'],
				'phone' => $_POST['phone'],
				'adresse' => $_POST['adresse'],
				'ville' => $_POST['ville'],
				'email' => $_POST['email'],
				'password' => $password,
			  );
			  
			$result = User::createUser($data);
			if($result === 'ok'){
				Session::set('success','Compte crée');
				Redirect::to('login');
			}else{
				echo $result;
			}
		}
	}
	
	static public function logout(){
		session_destroy();
	}


}
