<?php 

/**
 * Modelo de la tabla Users
 * CRUD.php
 */
class User
{
	
	private $id;	
	private $name;
	private $email;
	private $status_id;
	private $roles_id;
	private $pdo;


	public function __construct()
	{
    	try {
    		$this->pdo = new Database;
    	} catch (PDOException $e) {
    		die($e->getMessage());
    	}
	}

	public function getAll()
	{
		try {
			$strSql = "SELECT u.*,s.status as status,r.name as role FROM users u INNER JOIN statuses s ON s.id = u.status_id
						INNER JOIN roles r ON r.id = u.roles_id ORDER BY u.id ASC";
			// llamado al metodo general que ejecuta un select a la bd
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
    
	public function getActiveUsers()
	{
		try {
			$strSql = "SELECT u.*,s.status as status,r.name as role FROM users u 
			INNER JOIN statuses s ON s.id = u.status_id
			INNER JOIN roles r ON r.id = u.roles_id WHERE u.status_id = 1 ORDER BY u.id ASC";
			// llamado al metodo general que ejecuta un select a la bd
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
    // peticion request
	public function newUser($data)
	{
		try {
			$data['status_id'] = 1;
			$data['password'] = hash('sha256', $data['password']); //patron de encriptación
			$this->pdo->insert('users', $data);
		} catch (PDOException $e){
			die($e->getMessage());
		}
	}

	public function getUserById($id)
	{
		try {			
			$strSql = "SELECT * FROM users WHERE id=:id";
			$arrayData = ['id'=>$id];
			$query = $this->pdo->select($strSql, $arrayData);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}


	public function editUser($data)
	{
		try {			
			$strWhere = 'id = '.$data['id'];
			$this->pdo->update('users',$data,$strWhere);

		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function editUserStatus($data){
		try {
			$strWhere = 'id =' . $data['id'];
			$this->pdo->update('users',$data,$strWhere);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

}

 ?>