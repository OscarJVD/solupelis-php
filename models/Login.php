<?php

/**
 * Modelo de la tabla Categorys
 * CRUD.php
 */
class Login
{

	private $pdo;

	public function __construct()
	{
    	try {
    		$this->pdo = new Database;
    	} catch (PDOException $e) {
    		die($e->getMessage());
    	}
	}

	public function validateUser($data)
	{
		try {

			// $data['password'] = hash('sha256', $data['password']);
			// var_dump($data['password']);

			//crear una vista para consultar y un procedure vulnerabilidad por no ser consulta preparada
			$strSql = "SELECT u.*,s.status as status, r.name as role FROM users u
			INNER JOIN statuses s ON s.id = u.status_id
			INNER JOIN roles r ON r.id = u.roles_id
			WHERE u.email = '{$data['email']}' AND u.password = '{$data['password']}'";

			$query = $this->pdo->select($strSql); //esto se vuelve un array

			// var_dump($query);
			// exit();

			if (isset($query[0]->id)) {
				if ($query[0]->status_id==1) {
					$_SESSION['user'] = $query[0];
					return true;
				}else{
					return "Error al iniciar sesión. Su usuario esta inactivo"; //mejor que retorn false y se muestra el mensaje con el controlador
				}
			}else{
				return "Error al iniciar sesión. Verifique sus credenciales";
			}

		} catch (PDOException $e) {
			return $e->getMessage();
		}
	}

}

 ?>