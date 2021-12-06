<?php 

// Clase LoginController para cargar el Login o inicio de sesión 
 //3.
 
require 'models/Login.php';

class LoginController
{
	private $model;

	public function __construct()
	{
		$this->model = new Login;
		if (isset($_SESSION['user']))
			header('Location: ?controller=home');
		
	}
	
	public function index()
	{
		if (isset($_SESSION['user'])){  //si hay algun usuario activo esto se hace mas adelante, la variable user que guarde todo del usuario
			header('Location: ?controller=home');
		}else{
			require 'views/login.php';
		}
	}

	public function login()
	{
		$validateUser = $this->model->validateUser($_POST); //le pasamos por parametro los datos del login post
		if ($validateUser === true) {
			header('Location: ?controller=home');
		}else{
			$error = [
				'errorMessage' => $validateUser,
				'email'        => $_POST['email']
			];
			require 'views/login.php';
		}
	}

	public function logout()
	{
		// if (isset($_SESSION['user'])) {
		// var_dump($_SESSION);
		// }
		if (isset($_SESSION['user'])) //if acortado
			session_destroy();
	    header('Location: ?controller=login');
	}


}
 ?>