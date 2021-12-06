<?php 

/**
 * Clase HomeController para cargar el home del proyecto
 */
class HomeController
{
	public function __construct(){
		if (!isset($_SESSION['user'])) //que sesion va a destruir si no existe
			header('Location: ?controller=login');
	}
	
	public function index()
	{
		if ($_SESSION['user']->roles_id==1) {
			require 'views/layout.php';
			require 'views/home.php';
		}elseif($_SESSION['user']->roles_id==2){
			require 'views/partial/employee/employee.php';
			require 'views/home.php';
		}elseif ($_SESSION['user']->roles_id==3) {
			require 'views/partial/client/client.php';
			require 'views/home.php';
		}
	}
}



 ?>