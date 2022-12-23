<?php 

class UsersController {

	public function auth(){
		if(isset($_POST['submit'])){
			$data['email'] = $_POST['email'];
			$data['username'] = $_POST['username'];
			$result = User::login($data);
			if($result->email === $_POST['email']  && password_verify($_POST['password'],$result->password)){

				$_SESSION['logged'] = true;
				$_SESSION['email'] = $result->email;
				$_SESSION['username'] = $result->username;

				Redirect::to('index');

			}else{
				Session::set('error','Pseudo ou mot de passe est incorrect');
				Redirect::to('login');
			}
		}
	}


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
